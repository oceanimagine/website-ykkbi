<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class artikel_list extends CI_Controller {
    
    public $layout;
    public $list_kategori;
    public $list_label;
    public $list_tag;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_artikel_list');
        $this->layout = new layout('lite');
        
        $this->get_artikel_list->process(array(
            'action' => 'select',
            'table' => 'tbl_artikel_kategori',
            'column_value' => array(
                'id',
                'judul_kategori'
            )
        ));
        $this->list_kategori = $this->all;
        Privilege::admin();
    }

    public function get_artikel_list() {
        $this->get_artikel_list->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("artikel_list/get_artikel_list");
    }
    
    public function show_label($id_artikel){
        $this->get_artikel_list->process(array(
            'action' => 'select',
            'table' => 'tbl_artikel_label',
            'column_value' => array(
                'id',
                'nama_label'
            ),
            'where' => 'id_artikel = \''.$id_artikel.'\''
        ));
        $this->list_label = $this->all;
    }
    
    public function show_tag($id_artikel){
        $this->get_artikel_list->process(array(
            'action' => 'select',
            'table' => 'tbl_artikel_tag',
            'column_value' => array(
                'id',
                'nama_tag'
            ),
            'where' => 'id_artikel = \''.$id_artikel.'\''
        ));
        $this->list_tag = $this->all;
    }
    
    public function insert_label($insert_id){
        $all_label = array();
        $this->get_artikel_list->process(array(
            'action' => 'delete',
            'table' => 'tbl_artikel_label',
            'where' => 'id_artikel = \''.$insert_id.'\''
        ));
        for($i = 1; $i <= 100; $i++){
            if(isset($_POST['Label_' . $i])){
                if($this->input->post('Label_' . $i)){
                    $all_label[] = $this->input->post('Label_' . $i);
                }
            } else {
                break;
            }
        }
        for($i = 0; $i < sizeof($all_label); $i++){
            $this->get_artikel_list->process(array(
                'action' => 'insert',
                'table' => 'tbl_artikel_label',
                'column_value' => array(
                    'id_artikel' => $insert_id,
                    'nama_label' => $all_label[$i]
                )
            ));
        }
    }
    
    public function insert_tag($insert_id){
        $all_tag = array();
        $this->get_artikel_list->process(array(
            'action' => 'delete',
            'table' => 'tbl_artikel_tag',
            'where' => 'id_artikel = \''.$insert_id.'\''
        ));
        for($i = 1; $i <= 100; $i++){
            if(isset($_POST['Tag_' . $i])){
                if($this->input->post('Tag_' . $i)){
                    $all_tag[] = $this->input->post('Tag_' . $i);
                }
            } else {
                break;
            }
        }
        for($i = 0; $i < sizeof($all_tag); $i++){
            $this->get_artikel_list->process(array(
                'action' => 'insert',
                'table' => 'tbl_artikel_tag',
                'column_value' => array(
                    'id_artikel' => $insert_id,
                    'nama_tag' => $all_tag[$i]
                )
            ));
        }
    }
    
    public function hapus($id){
        /* $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : $id; */
        $this->get_artikel_list->process(array(
            'action' => 'delete',
            'table' => 'tbl_artikel',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('artikel_list');
    }
    
    public function edit($id){
        /* $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : $id; */
        if($this->input->post('id_kategori')){
            $_GET['id'] = $id;
            $id_kategori = $this->input->post('id_kategori');
            $judul_artikel = $this->input->post('judul_artikel');
            $isi_artikel = $this->input->post('isi_artikel');
            upload_file("photo_artikel");
            $this->get_artikel_list->process(array(
                'action' => 'update',
                'table' => 'tbl_artikel',
                'column_value' => array(
                    'id_kategori' => $id_kategori,
                    'judul_artikel' => $judul_artikel,
                    'isi_artikel' => $isi_artikel,
                    'photo_artikel' => $this->name_file_upload
                ),
                'where' => 'id = \''.$id.'\''
            ));
            $this->insert_label($id);
            $this->insert_tag($id);
            redirect('artikel_list/edit/'.$id.'');
        }
        $this->get_artikel_list->process(array(
            'action' => 'select',
            'table' => 'tbl_artikel',
            'column_value' => array(
                    'id_kategori',
                    'judul_artikel',
                    'isi_artikel',
                    'photo_artikel'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $row = $this->row;
        $this->show_label($id);
        $this->show_tag($id);
        $this->layout->loadView('artikel_list_form', array(
                    'id_kategori' => $row->id_kategori,
                    'judul_artikel' => $row->judul_artikel,
                    'photo_artikel' => $row->photo_artikel,
                    'isi_artikel' => $row->isi_artikel,
                    'list_kategori' => $this->list_kategori,
                    'list_label' => $this->list_label,
                    'list_tag' => $this->list_tag
        ));
    }
    
    public function add(){
        if($this->input->post('id_kategori')){
            $id_kategori = $this->input->post('id_kategori');
            $judul_artikel = $this->input->post('judul_artikel');
            $isi_artikel = $this->input->post('isi_artikel');
            upload_file("photo_artikel");
            $this->get_artikel_list->process(array(
                'action' => 'insert',
                'table' => 'tbl_artikel',
                'column_value' => array(
                    'id_kategori' => $id_kategori,
                    'judul_artikel' => $judul_artikel,
                    'isi_artikel' => $isi_artikel,
                    'photo_artikel' => $this->name_file_upload
                )
            ));
            
            $insert_id = $this->insert_id;
            $this->insert_label($insert_id);
            $this->insert_tag($insert_id);
            
            redirect('artikel_list/add');
        }
        $this->layout->loadView('artikel_list_form', array(
            'list_kategori' => $this->list_kategori
        ));
    }
    
    public function index() {
        $this->layout->loadView(
            'artikel_list',
            array(
                "hasil" => "abcd",
                "script" => $this->script_table()
            )
        );
    }
    
    public function inbox(){
        $this->layout->loadView('inbox_view');
    }
}




