<?php 

class get_dokumentasi_detail extends CI_Model {

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
            $clouse = " where photo_dokumentasi_detail like '%" . $sSearch . "%' ";
        }

        $sql_total = "select id, (select a.judul_event from tbl_dokumentasi_header a where a.id = id_dokumentasi_header), photo_dokumentasi_detail, deskripsi_singkat from tbl_dokumentasi_detail" . $clouse . "";

        $query_total = $this->db->query($sql_total);
        $total = $query_total->num_rows();

        $sql = "select id, (select a.judul_event from tbl_dokumentasi_header a where a.id = id_dokumentasi_header), photo_dokumentasi_detail, deskripsi_singkat from tbl_dokumentasi_detail".$clouse." order by id asc limit $iDisplayStart , $iDisplayLength";

        $page = ($iDisplayStart / $iDisplayLength);

        $resuld = $process_table->coba_db($sql, $page, $iDisplayLength, true, "../../../index.php/dokumentasi_detail/edit", "../../../index.php/dokumentasi_detail/hapus");

        $output = array(
            'sEcho' => $sEcho,
            'iTotalRecords' => $total,
            'iTotalDisplayRecords' => $total,
            'aaData' => $resuld
        );

        echo json_encode($output, JSON_HEX_QUOT | JSON_HEX_TAG);
    }

}