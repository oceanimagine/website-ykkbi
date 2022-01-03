<?php

class process_menu {
    public $result_menu = array();
    public $address_menu = 0;
    public $address_checkbox = 0;
    public $keterangan_parent = "- Tidak Ada";
    private $session_menu = array();
    private $id_user = "0";
    private $id_child = array();
    private $boolean = false;
    private $id_child_disabled = array();
    function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->model('test');
        $this->model = $this->CI->test;
        if(isset($_SESSION['PRI']) && $_SESSION['PRI'] == "SUPERADMIN"){
            $this->set_privilege_all();
        }
        if(isset($_SESSION['PRI']) && $_SESSION['PRI'] == "ADMIN"){
            if(isset($_SESSION['USR'])){
                $this->set_privilege($_SESSION['USR']);
            }
        }
        $this->session_menu = isset($_SESSION['MENU']) && is_array($_SESSION['MENU']) ? $_SESSION['MENU'] : array();
        $this->id_user = isset($_GET['id']) && $_GET['id'] != "" && is_numeric($_GET['id']) ? $_GET['id'] : "0";
    }
    
    public function set_parent($id_menu){
        $parent_all = $this->get_menu_parent($id_menu);
        $parent_cmm = $parent_all[1] . $id_menu;
        $explode_cm = explode(",", $parent_cmm);
        for($i = 0; $i < sizeof($explode_cm); $i++){
            $_SESSION['MENU'][$explode_cm[$i]] = true;
        }
    }
    
    public function set_privilege($id_admin){
        $_SESSION['MENU'] = array();
        $this->model->process(array(
            'action' => 'select',
            'table' => 'tbl_menu_privilege',
            'column_value' => array(
                'id_menu'
            ),
            'where' => 'id_user = \''.$id_admin.'\'' 
        ));
        foreach($this->CI->all as $row){
            $this->set_parent($row->id_menu);
        }
    }
    
    public function set_privilege_all(){
        $this->model->process(array(
            'action' => 'select',
            'table' => 'tbl_menu',
            'column_value' => array(
                'id'
            )
        ));
        foreach($this->CI->all as $row){
            $_SESSION['MENU'][$row->id] = true;
        }
    }
    
    function check_child_active($id_parent){
        $query = "select id, nama_menu, module from tbl_menu where parent_id = '".$id_parent."' order by id asc";
        $hasil = $this->model->kueri($query);
        if ($hasil->num_rows() > 0){
            foreach ($hasil->result() as $row){
                if(isset($this->id_child[$row->id]) && $this->id_child[$row->id]){
                    $this->boolean = true;
                    break;
                }
                $this->check_child_active($row->id);
            }
        }
        return $this->boolean;
    }
    function select_menu($id_parent){
        $query = "select id, nama_menu, module from tbl_menu where parent_id = '".$id_parent."' order by id asc";
        $hasil = $this->model->kueri($query);
        $menu_ = "";
	$ada_sub = 0;
        if ($hasil->num_rows() > 0){
            /*  menu-open */
            $menu_ = $id_parent > 0 ? "<ul class=\"treeview-menu replace_open\" replace_style>\n" : "";
            foreach ($hasil->result() as $row){
                if(isset($this->session_menu[$row->id]) && $this->session_menu[$row->id]){
		    $active = "";
		    if($this->CI->uri->segment(1) == $row->module){
                        $this->id_child[$row->id] = true;
			$ada_sub = 1;
			$active = "class=\"active\"";
		    } else if(isset($this->CI->menu_yang_aktif) && $this->CI->menu_yang_aktif != "" && $this->CI->menu_yang_aktif == $row->module){
                        $this->id_child[$row->id] = true;
			$ada_sub = 1;
			$active = "class=\"active\"";
		    }
		    $subs_ = $this->select_menu($row->id);
		    if($subs_[1] || $this->check_child_active($row->id)){
                        $this->boolean = false;
                        $this->id_child[$row->id] = true;
			$active = "class=\"active\"";
		    }
                    $menu_ = $menu_ . '
                    <li '.$active.'>
                        <a href="../../../index.php/'.$row->module.'"><i class="fa fa-'.($id_parent > 0 ? 'circle-o' : 'server').'"></i> <span>'.$row->nama_menu.'</span></a>
                        '.$subs_[0].'
                    </li>';
                }
            }
            $menu_ = $menu_ . ($id_parent > 0 ? "
                </ul>\n" : "");
            
	    if($ada_sub || (isset($subs_) && is_array($subs_) && isset($subs_[1]) && $subs_[1]) || $this->check_child_active($id_parent)){
                $this->boolean = false;
		$menu_ = str_replace(array('replace_open', 'replace_style'), array('menu-open', 'style="display: block;"'), $menu_);
	    } else {
		$menu_ = str_replace(array('replace_open', 'replace_style'), array('', '', ''), $menu_);
	    }
        }
        return array($menu_, $ada_sub);
    }
    function option_menu($strip, $id_parent){
        $strp_ = substr($strip, 0, 1);
        $query = "select id, nama_menu, module from tbl_menu where parent_id = '".$id_parent."'";
        $hasil = $this->model->kueri($query);
        $menu_ = "";
        if ($hasil->num_rows() > 0){
            if(isset($_GET['id']) && $_GET['id'] != "" && is_numeric($_GET['id'])){
                $id = $_GET['id'];
                $query_parent = "select parent_id from tbl_menu where id = '".$id."'";
                $hasil_parent = $this->model->kueri($query_parent);
                $id_selected_ = $hasil_parent->row();
                $id_select = $id_selected_->parent_id;
            }
            foreach ($hasil->result() as $row){
                $menu_ = $menu_ . '<option value="'.$row->id.'"'.(isset($id_select) && $id_select == $row->id ? " selected='selected'" : "").'>'.$strip." ".$row->nama_menu.'</option>
                '.$this->option_menu(($strip . $strp_), $row->id);
            }
        }
        return $menu_;
    }
    function get_menu_parent($id){
        $query = "select id, nama_menu, parent_id from tbl_menu where id = '".$id."'";
        $hasil = $this->model->kueri($query);
        $reslt = "";
        $resld = "";
        if ($hasil->num_rows() > 0){
            $row = $hasil->row();
            $rslts = $this->get_menu_parent($row->parent_id);
            $reslt = $rslts[0] . $row->nama_menu . "&nbsp;<i class=\"fa fa-arrow-right\" style=\"font-size: 10px; margin-right: 2px; margin-left: 2px;\"></i>&nbsp;";
            $resld = $rslts[1] . $row->id . ",";
        }
        return array($reslt,$resld);
    }
    function get_privilege_table(){
        ob_start();
        echo "<div class='panel panel-success'>\n";
        echo '
            <div class="panel-heading bg-light-blue-gradient" style="padding-bottom: 10px; color: white;">
                List Privilege     
            </div>
        ';
        echo "<table border='1' style='border-spacing: 0; font-family: consolas, monospace !important; cursor: default;' class='table table-bordered table-hover no-footer dataTable'>\n";
        $this->get_menu_root();
        echo "</table>\n";
        echo "</div>\n";
        return ob_get_clean();
    }
    function get_child_disabled($id_menu){
        $query_child = "select id from tbl_menu where parent_id = '".$id_menu."'";
        $hasil_child = $this->model->kueri($query_child);
        $id_child = $hasil_child->result_array();
        if(sizeof($id_child) > 0){
            for($i = 0; $i < sizeof($id_child); $i++){
                $this->id_child_disabled[$id_child[$i]['id']] = true;
                $this->get_child_disabled($id_child[$i]['id']);
            }
        }
    }
    function option_menu_tr($strip, $id_parent, $strip_original){
        $strp_ = $strip_original;
        $query = "select id, nama_menu, module from tbl_menu where parent_id = '".$id_parent."'";
        $hasil = $this->model->kueri($query);
        $menu_ = "";
        $match = false;
        if ($hasil->num_rows() > 0){
            if(isset($_GET['id']) && $_GET['id'] != "" && is_numeric($_GET['id'])){
                $id = $_GET['id'];
                $query_parent = "select id, parent_id from tbl_menu where id = '".$id."'";
                $hasil_parent = $this->model->kueri($query_parent);
                $id_selected_ = $hasil_parent->row();
                $id_select = $id_selected_->parent_id;
                $this->get_child_disabled($id);
            }
            foreach ($hasil->result() as $row){
                $disabled = "";
                if(isset($id) && $row->id == $id){
                    $disabled = " disabled";
                }
                if(isset($this->id_child_disabled[$row->id]) && $this->id_child_disabled[$row->id]){
                    $disabled = " disabled";
                }
                if(isset($id_select) && $id_select == $row->id){
                    $match = true;
                    $this->keterangan_parent = "";
                }
                $menu_ = $menu_ . "<tr>\n";
                $menu_ = $menu_ . "<td style='padding: 10px; white-space: nowrap; text-align: center;'><input style='width: 15px; height: 15px;' value='" . $row->id . "' type='radio' name='select_menu'".(isset($id_select) && $id_select == $row->id ? " checked='checked'" : ""). $disabled ." /></td>";
                $menu_ = $menu_ . "<td style='padding: 10px; white-space: nowrap;'>" . $strip . $row->nama_menu . "</td>\n";
                $menu_ = $menu_ . "</tr>\n";
                
                $menu_ = $menu_ . $this->option_menu_tr(($strip . $strp_), $row->id, $strip_original);
            }
        }
        return $menu_;
    }
    function get_menu_root($parent_id = '0'){
        $query = "select id, nama_menu, parent_id from tbl_menu where parent_id = '".$parent_id."'";
        $hasil = $this->model->kueri($query);
        $arr__ = array();
        $check = 0;
        if($this->id_user > 0){
            $query_menu = "select id_menu from tbl_menu_privilege where id_user = '".$this->id_user."'";
            $hasil_menu = $this->model->kueri($query_menu);
            foreach ($hasil_menu->result() as $row){
                $arr__[$row->id_menu] = true;
            }
            if($this->id_user == "UNKNOWN"){
                $check = 1;
            }
        }
        if ($hasil->num_rows() > 0){
            foreach ($hasil->result() as $row){
                $query_inside = "select nama_menu from tbl_menu where parent_id = '".$row->id."'";
                $hasil_inside = $this->model->kueri($query_inside);
                if ($hasil_inside->num_rows() == 0){
                    $result_ = $this->get_menu_parent($row->parent_id);
                    echo "<tr>\n";
                    echo "<td style='padding: 10px; white-space: nowrap; text-align: center;'><input style='width: 15px; height: 15px;' value='" . $row->id . "' type='checkbox' name='check_".$this->address_checkbox."'".((isset($arr__[$row->id]) && $arr__[$row->id]) || $check ? " checked='checked'" : "")."".($check ? " disabled='disabled'" : "")." /></td>";
                    echo "<td style='padding: 10px; white-space: nowrap;'>" . $result_[0] . $row->nama_menu . "</td>\n";
                    echo "</tr>\n";
                    $this->address_checkbox++;
                }
                $this->get_menu_root($row->id);
            }
        }
    }
    function json_sub_menu($strip, $id_parent, $module_edit, $module_hapus){
        $strp_ = $strip;
        $query = "select ".$GLOBALS['kolom_menu']." from tbl_menu where parent_id = '".$id_parent."'";
        $hasil = $this->model->kueri($query);
        if ($hasil->num_rows() > 0){
            foreach ($hasil->result() as $row){
                if(!isset($this->result_menu[$this->address_menu])){
                    $this->result_menu[$this->address_menu] = array();
                }
                $this->result_menu[$this->address_menu][0] = "SUBMENU";
                $this->result_menu[$this->address_menu][1] = $row->id;
                $this->result_menu[$this->address_menu][2] = $strip . " " . $row->nama_menu;
                $this->result_menu[$this->address_menu][3] = $row->module;
                $this->result_menu[$this->address_menu][4] = 
                        "<a href='" . $module_edit . "/" . $row->id . "'>Edit</a>" . " / " . 
                        "<a href=\"" . $module_hapus . "/" . $row->id . "#\" onclick=\"confirm_delete('" . $module_hapus . "/" . $row->id . "')\" data-target=\"#modal-default\" data-toggle=\"modal\">Hapus</a>";
                $this->address_menu++;
                $this->json_sub_menu($strip . $strp_, $row->id, $module_edit, $module_hapus);
            }
        }
        
    }
}