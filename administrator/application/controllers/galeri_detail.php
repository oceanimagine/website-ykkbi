<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class galeri_detail extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_galeri_detail');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_galeri_detail() {
        $this->get_galeri_detail->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("galeri_detail/get_galeri_detail");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        delete_photo('photo_galeri_detail');
        $this->get_galeri_detail->process(array(
            'action' => 'delete',
            'table' => 'tbl_galeri_detail',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('galeri_detail');
    }
    
    public function edit($id){
        if($this->input->post('id_galeri_header')){
            $_GET['id'] = $id;
            
            $id_galeri_header = $this->input->post('id_galeri_header');
            upload_file("photo_galeri_detail");
            $deskripsi_singkat = $this->input->post('deskripsi_singkat');
            $this->get_galeri_detail->process(array(
                'action' => 'update',
                'table' => 'tbl_galeri_detail',
                'column_value' => array(
                    
                    'id_galeri_header' => $id_galeri_header,
                    'photo_galeri_detail' => $this->name_file_upload,
                    'deskripsi_singkat' => $deskripsi_singkat
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('galeri_detail/edit/'.$id.'');
        }
        $this->get_galeri_detail->process(array(
            'action' => 'select',
            'table' => 'tbl_galeri_detail',
            'column_value' => array(
                
                'id_galeri_header',
                'photo_galeri_detail',
                'deskripsi_singkat'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('galeri_detail_form', array(
            
            'id_galeri_header' => $this->row->{'id_galeri_header'},
            'photo_galeri_detail' => $this->row->{'photo_galeri_detail'},
            'deskripsi_singkat' => $this->row->{'deskripsi_singkat'}
        ));
    }
    
    public function add(){
        if($this->input->post('id_galeri_header')){
            
            $id_galeri_header = $this->input->post('id_galeri_header');
            upload_file("photo_galeri_detail");
            $deskripsi_singkat = $this->input->post('deskripsi_singkat');
            $this->get_galeri_detail->process(array(
                'action' => 'insert',
                'table' => 'tbl_galeri_detail',
                'column_value' => array(
                    
                    'id_galeri_header' => $id_galeri_header,
                    'photo_galeri_detail' => $this->name_file_upload,
                    'deskripsi_singkat' => $deskripsi_singkat
                )
            ));
            redirect('galeri_detail/add');
        }
        $this->layout->loadView('galeri_detail_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'galeri_detail_list',
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