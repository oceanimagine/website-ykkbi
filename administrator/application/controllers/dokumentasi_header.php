<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class dokumentasi_header extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_dokumentasi_header');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_dokumentasi_header() {
        $this->get_dokumentasi_header->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("dokumentasi_header/get_dokumentasi_header");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        delete_photo('photo_dokumentasi_header');
        $this->get_dokumentasi_header->process(array(
            'action' => 'delete',
            'table' => 'tbl_dokumentasi_header',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('dokumentasi_header');
    }
    
    public function edit($id){
        if($this->input->post('judul_event')){
            $_GET['id'] = $id;
            
            $judul_event = $this->input->post('judul_event');
            upload_file("photo_dokumentasi_header");
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_selesai = $this->input->post('tanggal_selesai');
            $deskripsi_singkat = $this->input->post('deskripsi_singkat');
            $this->get_dokumentasi_header->process(array(
                'action' => 'update',
                'table' => 'tbl_dokumentasi_header',
                'column_value' => array(
                    
                    'judul_event' => $judul_event,
                    'photo_dokumentasi_header' => $this->name_file_upload,
                    'tanggal_mulai' => $tanggal_mulai,
                    'tanggal_selesai' => $tanggal_selesai,
                    'deskripsi_singkat' => $deskripsi_singkat
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('dokumentasi_header/edit/'.$id.'');
        }
        $this->get_dokumentasi_header->process(array(
            'action' => 'select',
            'table' => 'tbl_dokumentasi_header',
            'column_value' => array(
                
                'judul_event',
                'photo_dokumentasi_header',
                'tanggal_mulai',
                'tanggal_selesai',
                'deskripsi_singkat'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('dokumentasi_header_form', array(
            
            'judul_event' => $this->row->{'judul_event'},
            'photo_dokumentasi_header' => $this->row->{'photo_dokumentasi_header'},
            'tanggal_mulai' => $this->row->{'tanggal_mulai'},
            'tanggal_selesai' => $this->row->{'tanggal_selesai'},
            'deskripsi_singkat' => $this->row->{'deskripsi_singkat'}
        ));
    }
    
    public function add(){
        if($this->input->post('judul_event')){
            
            $judul_event = $this->input->post('judul_event');
            upload_file("photo_dokumentasi_header");
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_selesai = $this->input->post('tanggal_selesai');
            $deskripsi_singkat = $this->input->post('deskripsi_singkat');
            $this->get_dokumentasi_header->process(array(
                'action' => 'insert',
                'table' => 'tbl_dokumentasi_header',
                'column_value' => array(
                    
                    'judul_event' => $judul_event,
                    'photo_dokumentasi_header' => $this->name_file_upload,
                    'tanggal_mulai' => $tanggal_mulai,
                    'tanggal_selesai' => $tanggal_selesai,
                    'deskripsi_singkat' => $deskripsi_singkat
                )
            ));
            redirect('dokumentasi_header/add');
        }
        $this->layout->loadView('dokumentasi_header_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'dokumentasi_header_list',
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