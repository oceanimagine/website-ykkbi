<?php

class digital_tree_structure_model extends CI_Model
{
  public static $TBL_DIGITAL_TREE_STRUCTURE = "digital_tree_structure";
  public static $TBL_MASTER_DOMAIN = "master_domain";
  public static $TBL_MASTER_PORTFOLIO = "master_portfolio";
  public static $TBL_MASTER_PRODUCT = "master_product";
  public static $TBL_MASTER_DOMAIN_REF = "master_domain_ref";
  public static $TBL_MASTER_PORTFOLIO_REF = "master_portfolio_ref";
  public static $TBL_MASTER_PRODUCT_REF = "master_product_ref";

  public function __construct()
  {
    parent::__construct();
  }

  public function lists($periode = null)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    if ($periode == null) {
      $query = "select 
        dts.id_structure as id,
        dts.periode,
        dts.structure_name as name,
        (select count(*) from " . self::$TBL_MASTER_DOMAIN . " where id_structure = dts.id_structure) as domain,
        (select count(*) from " . self::$TBL_MASTER_PORTFOLIO . " where id_domain = md.id_domain) as portfolio,
        (select count(*) from " . self::$TBL_MASTER_PRODUCT . " where id_portfolio = mp.id_portfolio) as product,
        dts.status,
        dts.created_date,
        dts.log_user,
        dts.is_default,
        case dts.id_structure when 1 then 2
        				  when 2 then 1
        				  else dts.id_structure  end as urutan
      from 
        " . self::$TBL_DIGITAL_TREE_STRUCTURE . " as dts
        inner join " . self::$TBL_MASTER_DOMAIN . " as md on md.id_structure = dts.id_structure
        inner join " . self::$TBL_MASTER_PORTFOLIO . " as mp on mp.id_domain = md.id_domain
        left join " . self::$TBL_MASTER_PRODUCT . " as mpr on mpr.id_portfolio = mp.id_portfolio
      group by
        dts.id_structure
        order by urutan;";
    } else {
      $year = substr($periode, 0, 4);
      $query = "select 
        dts.id_structure as id,
        dts.periode,
        dts.structure_name as name,
        (select count(*) from " . self::$TBL_MASTER_DOMAIN . " where id_structure = dts.id_structure) as domain,
        (select count(*) from " . self::$TBL_MASTER_PORTFOLIO . " where id_domain = md.id_domain) as portfolio,
        (select count(*) from " . self::$TBL_MASTER_PRODUCT . " where id_portfolio = mp.id_portfolio) as product,
        dts.status,
        dts.created_date,
        dts.log_user,
        dts.is_default,
        case dts.id_structure when 1 then 2
        				  when 2 then 1
        				  else dts.id_structure  end as urutan
      from 
        " . self::$TBL_DIGITAL_TREE_STRUCTURE . " as dts
        inner join " . self::$TBL_MASTER_DOMAIN . " as md on md.id_structure = dts.id_structure
        inner join " . self::$TBL_MASTER_PORTFOLIO . " as mp on mp.id_domain = md.id_domain
        left join " . self::$TBL_MASTER_PRODUCT . " as mpr on mpr.id_portfolio = mp.id_portfolio
      where
        left(dts.periode, 4) = '" . $year . "'
      group by
        dts.id_structure
        order by urutan;";
    }

    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function lists_domain($id_structure)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "select
      md.id_domain as id,
      md.periode,
      md.domain_name as name,
      (select count(*) from " . self::$TBL_MASTER_PORTFOLIO . " where id_domain = md.id_domain) as portfolio,
      (select count(*) from " . self::$TBL_MASTER_PRODUCT . " where id_portfolio = mp.id_portfolio) as product,
      md.status,
      md.created_date,
      md.log_user
    from 
      " . self::$TBL_MASTER_DOMAIN . " as md
      inner join " . self::$TBL_MASTER_PORTFOLIO . " as mp on mp.id_domain = md.id_domain
      left join " . self::$TBL_MASTER_PRODUCT . " as mpr on mpr.id_portfolio = mp.id_portfolio
    where
      md.id_structure = $id_structure
    group by
      md.id_domain;";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function lists_portfolio($id_domain)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "select
      mp.id_portfolio as id,
      mp.periode,
      mp.portfolio_name as name,
      (select count(*) from " . self::$TBL_MASTER_PRODUCT . " where id_portfolio = mp.id_portfolio) as product,
      mp.status,
      mp.created_date,
      mp.log_user
    from 
      " . self::$TBL_MASTER_PORTFOLIO . " as mp
      left join " . self::$TBL_MASTER_PRODUCT . " as mpr on mpr.id_portfolio = mp.id_portfolio
    where
      mp.id_domain = '$id_domain'
    group by
      mp.id_portfolio;";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function lists_product($id_portfolio)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "select
      mpr.id_product as id,
      mpr.periode,
      mpr.product_name as name,
      mpr.status,
      mpr.created_date,
      mpr.log_user
    from 
      " . self::$TBL_MASTER_PRODUCT . " as mpr
    where
      mpr.id_portfolio = '$id_portfolio'
    -- group by
    -- mpr.id_portfolio;
    ";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get($id)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "select *, '' as domains from " . self::$TBL_DIGITAL_TREE_STRUCTURE . " as dts where dts.id_structure = '$id';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get_domain($id)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "select md.*, '' as portfolios 
      from " . self::$TBL_MASTER_DOMAIN . " as md
        left join " . self::$TBL_MASTER_DOMAIN_REF . " as mdr on mdr.id_domain = md.id_master_ref
      where md.id_domain = '$id';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get_portfolio($id)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "select mp.*, '' as products 
      from " . self::$TBL_MASTER_PORTFOLIO . " as mp
        inner join " . self::$TBL_MASTER_PORTFOLIO_REF . " as mpr on mpr.id_portfolio = mp.id_master_ref
      where mp.id_portfolio = '$id';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get_product($id)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "select mp.* 
      from " . self::$TBL_MASTER_PRODUCT . " as mp
        left join " . self::$TBL_MASTER_PRODUCT_REF . " as mpr mpr.id_product = mp.id_master_ref
      where mp.id_product = '$id';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get_domain_by_header($id_structure)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "select md.*, '' as portfolios 
      from " . self::$TBL_MASTER_DOMAIN . " as md
        left join " . self::$TBL_MASTER_DOMAIN_REF . " as mdr on mdr.id_domain = md.id_master_ref
      where md.id_structure = '$id_structure';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get_portfolio_by_header($id_domain)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "select mp.*, '' as products 
      from " . self::$TBL_MASTER_PORTFOLIO . " as mp
        left join " . self::$TBL_MASTER_PORTFOLIO_REF . " as mpr on mpr.id_portfolio = mp.id_master_ref
      where mp.id_domain = '$id_domain';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get_product_by_header($id_portfolio)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "select mp.* 
      from " . self::$TBL_MASTER_PRODUCT . " as mp
        left join " . self::$TBL_MASTER_PRODUCT_REF . " as mpr on mpr.id_product = mp.id_master_ref
      where mp.id_portfolio = '$id_portfolio';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function action($level, $datas)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    try {
      $obj_data = json_decode(str_replace('\"', '"', $datas), true);
      $query_final = "";
      if ($level == "STRUCTURE") {
        foreach ($obj_data as $row) {
          $query_final = "UPDATE " . self::$TBL_DIGITAL_TREE_STRUCTURE . "
          SET 
            status = '" . $row["action"] . "',
            log_user = '" . $row["log_user"] . "'
          WHERE 
            id_structure = '" . $row["id_structure"] . "';";
          $this->db->query($query_final);
        }
      } else if ($level == "DOMAIN") {
        foreach ($obj_data as $row) {
          $query_final = "UPDATE " . self::$TBL_MASTER_DOMAIN . "
          SET 
            status = '" . $row["action"] . "',
            log_user = '" . $row["log_user"] . "'
          WHERE 
            id_domain = '" . $row["id_domain"] . "';";
          $this->db->query($query_final);
        }
      } else if ($level == "PORTFOLIO") {
        foreach ($obj_data as $row) {
          $query_final = "UPDATE " . self::$TBL_MASTER_PORTFOLIO . "
          SET 
            status = '" . $row["action"] . "'
          WHERE 
            id_portfolio = '" . $row["id_portfolio"] . "';";
          $this->db->query($query_final);
        }
      } else if ($level == "PRODUCT") {
        foreach ($obj_data as $row) {
          $query_final = "UPDATE " . self::$TBL_MASTER_PRODUCT . "
          SET 
            status = '" . $row["action"] . "'
          WHERE 
            id_product = '" . $row["id_product"] . "';";
          $this->db->query($query_final);
        }
      } else {
        return false;
      }
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }

  public function set_default($id)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    try {
      $query = "UPDATE " . self::$TBL_DIGITAL_TREE_STRUCTURE . "
        SET 
          is_default = 1
        WHERE 
          id_structure = '$id';";
      $stmt_ = $this->db->query($query);
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }

  public function move($level, $datas)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    try {
      $obj_data = json_decode(str_replace('\"', '"', $datas), true);
      $query_final = "";
      if ($level == "STRUCTURE") {
        foreach ($obj_data as $row) {
          $query_final = "UPDATE " . self::$TBL_DIGITAL_TREE_STRUCTURE . "
          SET 
            periode = '" . $row["to_periode"] . "',
            log_user = '" . $row["log_user"] . "'
          WHERE 
            id_structure = '" . $row["id"] . "';";
          $this->db->query($query_final);
        }
      } else if ($level == "DOMAIN") {
        foreach ($obj_data as $row) {
          $query_final = "UPDATE " . self::$TBL_MASTER_DOMAIN . "
          SET 
            id_structure = '" . $row["to_structure"] . "',
            log_user = '" . $row["log_user"] . "'
          WHERE 
            id_structure = '" . $row["id"] . "';";
          $this->db->query($query_final);
        }
      } else if ($level == "PORTFOLIO") {
        foreach ($obj_data as $row) {
          $query_final = "UPDATE " . self::$TBL_MASTER_PORTFOLIO . "
          SET 
            id_domain = '" . $row["to_domain"] . "',
            log_user = '" . $row["log_user"] . "'
          WHERE 
            id_portfolio = '" . $row["id"] . "';";
          $this->db->query($query_final);
        }
      } else if ($level == "PRODUCT") {
        foreach ($obj_data as $row) {
          $query_final = "UPDATE " . self::$TBL_MASTER_PRODUCT . "
          SET 
            id_portfolio = '" . $row["to_portfolio"] . "',
            log_user = '" . $row["log_user"] . "'
          WHERE 
            id_product = '" . $row["id"] . "';";
          $this->db->query($query_final);
        }
      } else {
        return false;
      }
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }

  public function delete($id)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    try {
      $query = "DELETE FROM " . self::$TBL_DIGITAL_TREE_STRUCTURE . " WHERE id_structure = '$id';";
      $stmt_ = $this->db->query($query);
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }

  public function delete_domain($id)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    try {
      $query = "DELETE FROM " . self::$TBL_MASTER_DOMAIN . " where id_domain = '$id';";
      $stmt_ = $this->db->query($query);
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }

  public function delete_portfolio($id)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    try {
      $query = "DELETE FROM " . self::$TBL_MASTER_PORTFOLIO . " where id_portfolio = '$id';";
      $stmt_ = $this->db->query($query);
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }

  public function delete_product($id)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    try {
      $query = "DELETE FROM " . self::$TBL_MASTER_PRODUCT . " where id_product = '$id';";
      $stmt_ = $this->db->query($query);
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }

  public function insert($data)
  {
    try {
      $query = "INSERT INTO " . self::$TBL_DIGITAL_TREE_STRUCTURE . " (
                `periode`,
                `structure_name`,
                `status`,
                `created_date`,
                `log_user`
              )
              VALUES
                (
                  '" . $data["periode"] . "',
                  '" . $data["structure_name"] . "',
                  '" . $data["status"] . "',
                  '" . $data["created_date"] . "',
                  '" . $data["log_user"] . "'
                );";

      if ($this->db->query($query)) {
        return $this->db->insert_id();
      } else {
        return null;
      }
    } catch (\Throwable $th) {
      return "Error : " . $th->getMessage();
    }
  }

  public function insert_domain($id_structure, $periode, $status, $created_date, $log_user, $data)
  {
    try {
      $query = "INSERT INTO " . self::$TBL_MASTER_DOMAIN . " (
        `id_structure`,
        `id_master_ref`,
        `periode`,
        `domain_name`,
        `status`,
        `created_date`,
        `log_user`
      )
      VALUES
      (
        '" . $id_structure . "',
        '" . $data["id_master_ref"] . "',
        '" . $periode . "',
        '" . $data["domain_name"] . "',
        '" . $status . "',
        '" . $created_date . "',
        '" . $log_user . "'
      );";

      if ($this->db->query($query)) {
        return $this->db->insert_id();
      } else {
        return null;
      }
    } catch (\Throwable $th) {
      return "Error : " . $th->getMessage();
    }
  }

  public function insert_portfolio($id_domain, $periode, $status, $created_date, $log_user, $data)
  {
    try {
      $query = "INSERT INTO " . self::$TBL_MASTER_PORTFOLIO . " (
        `id_domain`,
        `id_master_ref`,
        `periode`,
        `portfolio_name`,
        `status`,
        `created_date`,
        `log_user`
      )
      VALUES
        (
          '" . $id_domain . "',
          '" . $data["id_master_ref"] . "',
          '" . $periode . "',
          '" . $data["portfolio_name"] . "',
          '" . $status . "',
          '" . $created_date . "',
          '" . $log_user . "'
        );";
      if ($this->db->query($query)) {
        return $this->db->insert_id();
      } else {
        return null;
      }
    } catch (\Throwable $th) {
      return "Error : " . $th->getMessage();
    }
  }

  public function insert_product($id_portfolio, $periode, $status, $created_date, $log_user, $data)
  {
    try {
      $query = "INSERT INTO " . self::$TBL_MASTER_PRODUCT . " (
        `id_portfolio`,
        `id_master_ref`,
        `periode`,
        `product_name`,
        `status`,
        `created_date`,
        `log_user`
      )
      VALUES
        (
          '" . $id_portfolio . "',
          '" . $data["id_master_ref"] . "',
          '" . $periode . "',
          '" . $data["product_name"] . "',
          '" . $status . "',
          '" . $created_date . "',
          '" . $log_user . "'
        );";

      if ($this->db->query($query)) {
        return $this->db->insert_id();
      } else {
        return null;
      }
    } catch (\Throwable $th) {
      return "Error : " . $th->getMessage();
    }
  }

  public function get_master_domain()
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "SELECT 
        id_domain as id_master_ref,
          periode,
          domain_name,
          status
      FROM " . self::$TBL_MASTER_DOMAIN_REF . "
      WHERE status = 'ACTIVE';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get_master_domain_by_name($domain_name)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "SELECT 
        id_domain as id_master_ref,
          periode,
          domain_name,
          status
      FROM " . self::$TBL_MASTER_DOMAIN_REF . "
      WHERE 
        domain_name = '" . $domain_name . "'
        and status = 'ACTIVE';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get_master_portfolio()
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "SELECT 
        id_portfolio as id_master_ref,
          periode,
          portfolio_name,
          status
      FROM " . self::$TBL_MASTER_PORTFOLIO_REF . "
      WHERE status = 'ACTIVE';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get_master_portfolio_by_name($name)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "SELECT 
          id_portfolio as id_master_ref,
          periode,
          portfolio_name,
          status
      FROM " . self::$TBL_MASTER_PORTFOLIO_REF . "
      WHERE 
        portfolio_name = '" . $name . "'
        and status = 'ACTIVE';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get_master_product()
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "SELECT 
        id_product as id_master_ref,
          periode,
          product_name,
          status
      FROM " . self::$TBL_MASTER_PRODUCT_REF . "
      WHERE status = 'ACTIVE';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get_master_product_by_name($product_name)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "SELECT 
        id_product as id_master_ref,
          periode,
          product_name,
          status
      FROM " . self::$TBL_MASTER_PRODUCT_REF . "
      WHERE 
        product_name = '" . $product_name . "' 
        and status = 'ACTIVE';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get_master_cfu($cfu)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "SELECT * FROM dashboard_dxb.master_cfu_ref 
      WHERE cfu_name = '" . $cfu . "' AND `status` = 'ACTIVE';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get_master_segment($segment)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "SELECT * FROM dashboard_dxb.master_segment_ref 
      WHERE segment_name = '" . $segment . "' AND `status` = 'ACTIVE';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function get_master_era($era)
  {
    if (getenv('ENVIRONMENT') == "testing") {
      return array();
    }

    $query = "SELECT * FROM dashboard_dxb.master_era_ref 
      WHERE era_name = '" . $era . "' AND `status` = 'ACTIVE';";
    $stmt_ = $this->db->query($query);
    return $stmt_->result();
  }

  public function update($data)
  {
    try {
      $query = "UPDATE " . self::$TBL_DIGITAL_TREE_STRUCTURE . "
                SET
                `structure_name` = '" . $data["structure_name"] . "',
                `periode` = '" . $data["periode"] . "',
                `status` = '" . $data["status"] . "',
                `created_date` = '" . $data["created_date"] . "',
                `log_user` = '" . $data["log_user"] . "',
                `is_default` = 0
                WHERE `id_structure` = '" . $data["id_structure"] . "';";

      $this->db->query($query);
    } catch (\Throwable $th) {
      return "Error : " . $th->getMessage();
    }
  }

  public function update_domain($id_structure, $periode, $status, $log_user, $data)
  {
    try {
      $query = "UPDATE " . self::$TBL_MASTER_DOMAIN . " 
      SET
      `id_structure` = '" . $id_structure . "',
      `id_master_ref` = '" . $data["id_master_ref"] . "',
      `periode` = '" . $periode . "',
      `domain_name` = '" . $data["domain_name"] . "',
      `status` = '" . $status . "',
      `flag_existing` = '" . $data["is_existing"] . "',
      `log_user` = '" . $log_user . "'
      WHERE `id_domain` = '" . $data["id_domain"] . "';";

      $this->db->query($query);
    } catch (\Throwable $th) {
      return "Error : " . $th->getMessage();
    }
  }

  public function update_portfolio($id_domain, $periode, $status, $log_user, $data)
  {
    try {
      $query = "UPDATE " . self::$TBL_MASTER_PORTFOLIO . "
      SET
      `id_domain` = '" . $id_domain . "',
      `id_master_ref` = '" . $data["id_master_ref"] . "',
      `periode` = '" . $periode . "',
      `portfolio_name` = '" . $data["portfolio_name"] . "',
      `status` = '" . $status . "',
      `flag_existing` = '" . $data["is_existing"] . "',
      `log_user` = '" . $log_user . "'
      WHERE `id_portfolio` = '" . $data["id_portfolio"] . "';";
      $this->db->query($query);
    } catch (\Throwable $th) {
      return "Error : " . $th->getMessage();
    }
  }

  public function update_product($id_portfolio, $periode, $status, $log_user, $data)
  {
    try {
      $query = "UPDATE " . self::$TBL_MASTER_PRODUCT . " 
      SET
      `id_portfolio` = '" . $id_portfolio . "',
      `id_master_ref` = '" . $data["id_master_ref"] . "',
      `periode` = '" . $periode . "',
      `product_name` = '" . $data["product_name"] . "',
      `status` = '" . $status . "',
      `flag_existing` = '" . $data["is_existing"] . "',
      `log_user` = '" . $log_user . "'
      WHERE `id_product` = '<{expr}>';";
      $this->db->query($query);
    } catch (\Throwable $th) {
      return "Error : " . $th->getMessage();
    }
  }
}
