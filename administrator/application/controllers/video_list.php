<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class video_list extends CI_Controller {
    
    public $layout;
    public $list_kategori;
    public $list_label;
    public $list_tag;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_video_list');
        $this->layout = new layout('lite');
        
        $this->get_video_list->process(array(
            'action' => 'select',
            'table' => 'tbl_video_kategori',
            'column_value' => array(
                'id',
                'judul_kategori'
            )
        ));
        $this->list_kategori = $this->all;
        Privilege::admin();
    }

    public function get_video_list() {
        $this->get_video_list->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("video_list/get_video_list");
    }
    
    public function show_label($id_video){
        $this->get_video_list->process(array(
            'action' => 'select',
            'table' => 'tbl_video_label',
            'column_value' => array(
                'id',
                'nama_label'
            ),
            'where' => 'id_video = \''.$id_video.'\''
        ));
        $this->list_label = $this->all;
    }
    
    public function show_tag($id_video){
        $this->get_video_list->process(array(
            'action' => 'select',
            'table' => 'tbl_video_tag',
            'column_value' => array(
                'id',
                'nama_tag'
            ),
            'where' => 'id_video = \''.$id_video.'\''
        ));
        $this->list_tag = $this->all;
    }
    
    public function insert_label($insert_id){
        $all_label = array();
        $this->get_video_list->process(array(
            'action' => 'delete',
            'table' => 'tbl_video_label',
            'where' => 'id_video = \''.$insert_id.'\''
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
            $this->get_video_list->process(array(
                'action' => 'insert',
                'table' => 'tbl_video_label',
                'column_value' => array(
                    'id_video' => $insert_id,
                    'nama_label' => $all_label[$i]
                )
            ));
        }
    }
    
    public function insert_tag($insert_id){
        $all_tag = array();
        $this->get_video_list->process(array(
            'action' => 'delete',
            'table' => 'tbl_video_tag',
            'where' => 'id_video = \''.$insert_id.'\''
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
            $this->get_video_list->process(array(
                'action' => 'insert',
                'table' => 'tbl_video_tag',
                'column_value' => array(
                    'id_video' => $insert_id,
                    'nama_tag' => $all_tag[$i]
                )
            ));
        }
    }
    
    public function hapus($id){
        /* $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : $id; */
        $this->get_video_list->process(array(
            'action' => 'delete',
            'table' => 'tbl_video',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('video_list');
    }
    
    public function edit($id){
        /* $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : $id; */
        if($this->input->post('id_kategori')){
            $_GET['id'] = $id;
            $id_kategori = $this->input->post('id_kategori');
            $judul_video = $this->input->post('judul_video');
            $id_link_youtube = $this->input->post('id_link_youtube');
            $deskripsi_singkat = $this->input->post('deskripsi_singkat');
            upload_file("photo_video");
            $this->get_video_list->process(array(
                'action' => 'update',
                'table' => 'tbl_video',
                'column_value' => array(
                    'id_kategori' => $id_kategori,
                    'judul_video' => $judul_video,
                    'id_link_youtube' => $id_link_youtube,
                    'deskripsi_singkat' => $deskripsi_singkat,
                    'photo_video' => $this->name_file_upload
                ),
                'where' => 'id = \''.$id.'\''
            ));
            $this->insert_label($id);
            $this->insert_tag($id);
            redirect('video_list/edit/'.$id.'');
        }
        $this->get_video_list->process(array(
            'action' => 'select',
            'table' => 'tbl_video',
            'column_value' => array(
                    'id_kategori',
                    'judul_video',
                    'id_link_youtube',
                    'deskripsi_singkat',
                    'photo_video'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $row = $this->row;
        $this->show_label($id);
        $this->show_tag($id);
        $this->layout->loadView('video_list_form', array(
                    'id_kategori' => $row->id_kategori,
                    'judul_video' => $row->judul_video,
                    'deskripsi_singkat' => $row->deskripsi_singkat,
                    'id_link_youtube' => $row->id_link_youtube,
                    'photo_video' => $row->photo_video,
                    'list_kategori' => $this->list_kategori,
                    'list_label' => $this->list_label,
                    'list_tag' => $this->list_tag
        ));
    }
    
    public function add(){
        if($this->input->post('id_kategori')){
            $id_kategori = $this->input->post('id_kategori');
            $judul_video = $this->input->post('judul_video');
            $id_link_youtube = $this->input->post('id_link_youtube');
            $deskripsi_singkat = $this->input->post('deskripsi_singkat');
            upload_file("photo_video");
            $this->get_video_list->process(array(
                'action' => 'insert',
                'table' => 'tbl_video',
                'column_value' => array(
                    'id_kategori' => $id_kategori,
                    'judul_video' => $judul_video,
                    'id_link_youtube' => $id_link_youtube,
                    'deskripsi_singkat' => $deskripsi_singkat,
                    'photo_video' => $this->name_file_upload
                )
            ));
            
            $insert_id = $this->insert_id;
            $this->insert_label($insert_id);
            $this->insert_tag($insert_id);
            
            redirect('video_list/add');
        }
        $this->layout->loadView('video_list_form', array(
            'list_kategori' => $this->list_kategori
        ));
    }
    
    public function index() {
        $this->layout->loadView(
            'video_list',
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




