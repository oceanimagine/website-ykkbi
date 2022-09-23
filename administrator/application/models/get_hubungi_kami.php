<?php 

class get_hubungi_kami extends CI_Model {

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
            $clouse = " where (nama_lengkap_pengirim like '%" . $sSearch . "%' or email_pengirim like '%" . $sSearch . "%') ";
        }

        $sql_total = "select id, nama_lengkap_pengirim, email_pengirim, isi_pesan_pengirim from tbl_hubungi_kami" . $clouse . "";

        $query_total = $this->db->query($sql_total);
        $total = $query_total->num_rows();

        $sql = "select id, nama_lengkap_pengirim, email_pengirim, isi_pesan_pengirim from tbl_hubungi_kami".$clouse." order by timestamp desc limit $iDisplayStart , $iDisplayLength";

        $page = ($iDisplayStart / $iDisplayLength);

        $resuld = $process_table->coba_db($sql, $page, $iDisplayLength, true, "../../../index.php/hubungi_kami/edit", "../../../index.php/hubungi_kami/hapus");

        $output = array(
            'sEcho' => $sEcho,
            'iTotalRecords' => $total,
            'iTotalDisplayRecords' => $total,
            'aaData' => $resuld
        );

        echo json_encode($output, JSON_HEX_QUOT | JSON_HEX_TAG);
    }

}