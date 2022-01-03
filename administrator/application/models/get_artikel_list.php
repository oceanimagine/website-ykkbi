<?php 

class get_artikel_list extends CI_Model {
    private $param;
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
            $clouse = " where judul_artikel like '%" . $sSearch . "%' ";
        }
        
        $sql_total = "select id, judul_artikel from tbl_artikel" . $clouse . "";

        $query_total = $this->db->query($sql_total);
        $total = $query_total->num_rows();
        
        $sql = "
            select 
                id, 
                (select a.judul_kategori from tbl_artikel_kategori a where a.id = id_kategori) judul_kategori,
                -- <LOAD IMAGE> --
                -- CASE WHEN LOAD_FILE(CONCAT('".str_replace("\\", "/", dir_upload('photo_artikel'))."/',photo_artikel)) IS NOT NULL THEN 
                -- CONCAT('<img src=\"../../../../upload/photo_artikel/',photo_artikel,'\" style=\"width: 200px;\" />') else 
                -- '(NOIMAGE)' END as file,
                -- </LOAD IMAGE> --
                photo_artikel,
                judul_artikel, 
                get_label_only_html(id) label, 
                get_tag_only_html(id) tag 
            from 
                tbl_artikel ".$clouse." 
            order by id_kategori asc limit $iDisplayStart , $iDisplayLength
        ";

        $page = ($iDisplayStart / $iDisplayLength);

        $resuld = $process_table->coba_db($sql, $page, $iDisplayLength, true, "../../../index.php/artikel_list/edit", "../../../index.php/artikel_list/hapus");

        $output = array(
            'sEcho' => $sEcho,
            'iTotalRecords' => $total,
            'iTotalDisplayRecords' => $total,
            'aaData' => $resuld
        );

        echo json_encode($output, JSON_HEX_QUOT | JSON_HEX_TAG);
    }

}




