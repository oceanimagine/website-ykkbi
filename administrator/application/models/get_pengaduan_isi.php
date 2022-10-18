<?php 

class get_pengaduan_isi extends CI_Model {

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
            $clouse = " where (pelapor_email like '%" . $sSearch . "%' or pelapor_nama like '%" . $sSearch . "%') ";
        }

        $sql_total = "select id from tbl_pengaduan_isi" . $clouse . "";

        $query_total = $this->db->query($sql_total);
        $total = $query_total->num_rows();

        $sql = "select id, laporan_no, laporan_tgl, laporan_jam, pelapor_nama, pelapor_tlp, pelapor_email, dilaporkan_nama, dilaporkan_pelanggaran, kejadian_tgl, kejadian_lokasi, kejadian_bukti from tbl_pengaduan_isi".$clouse." order by timestamp desc limit $iDisplayStart , $iDisplayLength";

        $page = ($iDisplayStart / $iDisplayLength);

        $resuld = $process_table->coba_db($sql, $page, $iDisplayLength, true, "../../../index.php/pengaduan_isi/edit", "../../../index.php/pengaduan_isi/hapus");

        $output = array(
            'sEcho' => $sEcho,
            'iTotalRecords' => $total,
            'iTotalDisplayRecords' => $total,
            'aaData' => $resuld
        );

        echo json_encode($output, JSON_HEX_QUOT | JSON_HEX_TAG);
    }

}