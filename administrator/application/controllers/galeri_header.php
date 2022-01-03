<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class galeri_header extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_galeri_header');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_galeri_header() {
        $this->get_galeri_header->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("galeri_header/get_galeri_header");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        delete_photo('photo_galeri_header');
        $this->get_galeri_header->process(array(
            'action' => 'delete',
            'table' => 'tbl_galeri_header',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('galeri_header');
    }
    
    public function edit($id){
        if($this->input->post('judul_galeri')){
            $_GET['id'] = $id;
            
            upload_file("photo_galeri_header");
            $judul_galeri = $this->input->post('judul_galeri');
            $deskripsi_singkat = $this->input->post('deskripsi_singkat');
            $this->get_galeri_header->process(array(
                'action' => 'update',
                'table' => 'tbl_galeri_header',
                'column_value' => array(
                    
                    'photo_galeri_header' => $this->name_file_upload,
                    'judul_galeri' => $judul_galeri,
                    'deskripsi_singkat' => $deskripsi_singkat
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('galeri_header/edit/'.$id.'');
        }
        $this->get_galeri_header->process(array(
            'action' => 'select',
            'table' => 'tbl_galeri_header',
            'column_value' => array(
                
                'photo_galeri_header',
                'judul_galeri',
                'deskripsi_singkat'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('galeri_header_form', array(
            
            'photo_galeri_header' => $this->row->{'photo_galeri_header'},
            'judul_galeri' => $this->row->{'judul_galeri'},
            'deskripsi_singkat' => $this->row->{'deskripsi_singkat'}
        ));
    }
    
    public function add(){
        if($this->input->post('judul_galeri')){
            
            upload_file("photo_galeri_header");
            $judul_galeri = $this->input->post('judul_galeri');
            $deskripsi_singkat = $this->input->post('deskripsi_singkat');
            $this->get_galeri_header->process(array(
                'action' => 'insert',
                'table' => 'tbl_galeri_header',
                'column_value' => array(
                    
                    'photo_galeri_header' => $this->name_file_upload,
                    'judul_galeri' => $judul_galeri,
                    'deskripsi_singkat' => $deskripsi_singkat
                )
            ));
            redirect('galeri_header/add');
        }
        $this->layout->loadView('galeri_header_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'galeri_header_list',
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