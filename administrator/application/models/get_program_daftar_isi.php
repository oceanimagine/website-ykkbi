<?php 

class get_program_daftar_isi extends CI_Model {

    function __construct(){
        $this->param = new process_param();
        parent::__construct();
    }

    /* Process Database */
    function process($param){
        return $this->param->process($param);
    }

    function get_data(){

        $process_table = new process_table();

        $sEcho = isset($_GET["sEcho"]) ? $_GET["sEcho"] : '0';
        $iDisplayLength = isset($_GET["iDisplayLength"]) ? intval($_GET["iDisplayLength"]) : 10;
        $iDisplayStart = isset($_GET["iDisplayStart"]) ? intval($_GET["iDisplayStart"]) : 0;
        $sSearch = isset($_GET["sSearch"]) ? $_GET["sSearch"] : '';

        $clouse = "";

        if ($sSearch != '') {
            $clouse = " where judul_daftar_isi like '%" . $sSearch . "%' ";
        }

        $sql_total = "select id, (select a.judul_kategori_sub from tbl_program_kategori_sub a where a.id = id_program_kategori_sub), judul_daftar_isi from tbl_program_daftar_isi" . $clouse . "";

        $query_total = $this->db->query($sql_total);
        $total = $query_total->num_rows();

        $sql = "select id, (select a.judul_kategori_sub from tbl_program_kategori_sub a where a.id = id_program_kategori_sub), judul_daftar_isi from tbl_program_daftar_isi".$clouse." order by id asc limit $iDisplayStart , $iDisplayLength";

        $page = ($iDisplayStart / $iDisplayLength);

        $resuld = $process_table->coba_db($sql, $page, $iDisplayLength, true, "../../../index.php/program_daftar_isi/edit", "../../../index.php/program_daftar_isi/hapus");

        $output = array(
            'sEcho' => $sEcho,
            'iTotalRecords' => $total,
            'iTotalDisplayRecords' => $total,
            'aaData' => $resuld
        );

        echo json_encode($output, JSON_HEX_QUOT | JSON_HEX_TAG);
    }

}