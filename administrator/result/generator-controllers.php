<?php

define('BASEPATH', "../application/config");
include_once __DIR__ . "/../../config/connect-list.php";
include_once __DIR__ . "/../../config/connect.php";
include BASEPATH . "/database.php";

$host = $db['default']['hostname'];
$user = $db['default']['username'];
$pass = $db['default']['password'];
$data = $db['default']['database'];

$nama_tabel = "tbl_laporan";
$connect = mysqli_connect($host, $user, $pass, $data);

$query_describe = mysqli_query($connect, "describe " . $nama_tabel);

if(mysqli_num_rows($query_describe) > 0){
    
    $explode_key = explode("_", $nama_tabel);
    $underscore_ = "";
    $rest_name_ = "";
    for($i = 1; $i < sizeof($explode_key); $i++){
        $rest_name_ = $rest_name_ . $underscore_ . $explode_key[$i];
        $underscore_ = "_";
    }
    
    $column_first = "";
    $column_primary  = "";
    $post_collect = "";
    $insert_update_column = "";
    $select_column = "";
    $select_view = "";
    $delete_photo = "";
    $comma = "";
    while($hasil_describe = mysqli_fetch_array($query_describe)){
        if($column_first == ""){
            if($hasil_describe['Key'] != "PRI" && substr($hasil_describe['Field'], 0, strlen("photo")) != "photo"){
                $column_first = $hasil_describe['Field'];
            }
        }
        if($column_primary == ""){
            if($hasil_describe['Key'] == "PRI"){
                $column_primary = $hasil_describe['Field'];
            }
        }
        if(strtolower($hasil_describe['Key']) != strtolower("PRI") && $hasil_describe['Field'] != "timestamp"){
            $real_name = str_replace(" ", "_", $hasil_describe['Field']);
            if(substr($hasil_describe['Field'], 0, strlen("photo")) == "photo"){
                $real_vars_post = "upload_file(\"".$hasil_describe['Field']."\");";
                $real_vars_insert_update = "'".$hasil_describe['Field']."' => \$this->name_file_upload";
                $delete_photo = "delete_photo('".$hasil_describe['Field']."');";
            } else {
                $real_vars_post = "\$".$real_name." = \$this->input->post('".$real_name."');";
                $real_vars_insert_update = "'".$hasil_describe['Field']."' => \$".$real_name."";
            }
            
            $post_collect = $post_collect . "
            ".$real_vars_post."";
            $insert_update_column = $insert_update_column . $comma."
                    ".$real_vars_insert_update."";
            $select_column = $select_column . $comma . "
                '".$hasil_describe['Field']."'";
            $select_view = $select_view . $comma . "
            '".$real_name."' => \$this->row->{'".$hasil_describe['Field']."'}";
            $comma = ",";
        }
    }
    
    ob_start();
    echo '<?php if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class '.$rest_name_.' extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model(\'get_'.$rest_name_.'\');
        $this->layout = new layout(\'lite\');
        Privilege::admin();
    }

    public function get_'.$rest_name_.'() {
        $this->get_'.$rest_name_.'->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("'.$rest_name_.'/get_'.$rest_name_.'");
    }
    
    public function hapus($id){
        $_GET[\'id\'] = $id;
        '.$delete_photo.'
        $this->get_'.$rest_name_.'->process(array(
            \'action\' => \'delete\',
            \'table\' => \''.$nama_tabel.'\',
            \'where\' => \''.$column_primary.' = \\\'\'.$id.\'\\\'\'
        ));
        redirect(\''.$rest_name_.'\');
    }
    
    public function edit($id){
        if($this->input->post(\''.$column_first.'\')){
            $_GET[\'id\'] = $id;
            '.$post_collect.'
            $this->get_'.$rest_name_.'->process(array(
                \'action\' => \'update\',
                \'table\' => \''.$nama_tabel.'\',
                \'column_value\' => array(
                    '.$insert_update_column.'
                ),
                \'where\' => \''.$column_primary.' = \\\'\'.$id.\'\\\'\'
            ));
            redirect(\''.$rest_name_.'/edit/\'.$id.\'\');
        }
        $this->get_'.$rest_name_.'->process(array(
            \'action\' => \'select\',
            \'table\' => \''.$nama_tabel.'\',
            \'column_value\' => array(
                '.$select_column.'
            ),
            \'where\' => \''.$column_primary.' = \\\'\'.$id.\'\\\'\'
        ));
        $this->layout->loadView(\''.$rest_name_.'_form\', array(
            '.$select_view.'
        ));
    }
    
    public function add(){
        if($this->input->post(\''.$column_first.'\')){
            '.$post_collect.'
            $this->get_'.$rest_name_.'->process(array(
                \'action\' => \'insert\',
                \'table\' => \''.$nama_tabel.'\',
                \'column_value\' => array(
                    '.$insert_update_column.'
                )
            ));
            redirect(\''.$rest_name_.'/add\');
        }
        $this->layout->loadView(\''.$rest_name_.'_form\');
    }
    
    public function index() {
        $this->layout->loadView(
            \''.$rest_name_.'_list\',
            array(
                "hasil" => "abcd",
                "script" => $this->script_table()
            )
        );
    }
    
    public function inbox(){
        $this->layout->loadView(\'inbox_view\');
    }
}';
    $hasil_controller = ob_get_clean();
    file_put_contents(__DIR__ . "/../application/controllers/" . $rest_name_ . ".php", $hasil_controller);
}
