<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class laporan extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_laporan');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_laporan() {
        $this->get_laporan->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("laporan/get_laporan");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_laporan->process(array(
            'action' => 'delete',
            'table' => 'tbl_laporan',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('laporan');
    }
    
    public function edit($id){
        if($this->input->post('judul_laporan')){
            $_GET['id'] = $id;
            
            $judul_laporan = $this->input->post('judul_laporan');
            $google_drive_pdf = $this->input->post('google_drive_pdf');
            $this->get_laporan->process(array(
                'action' => 'update',
                'table' => 'tbl_laporan',
                'column_value' => array(
                    
                    'judul_laporan' => $judul_laporan,
                    'google_drive_pdf' => $google_drive_pdf
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('laporan/edit/'.$id.'');
        }
        $this->get_laporan->process(array(
            'action' => 'select',
            'table' => 'tbl_laporan',
            'column_value' => array(
                
                'judul_laporan',
                'google_drive_pdf'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('laporan_form', array(
            
            'judul_laporan' => $this->row->{'judul_laporan'},
            'google_drive_pdf' => $this->row->{'google_drive_pdf'}
        ));
    }
    
    public function add(){
        if($this->input->post('judul_laporan')){
            
            $judul_laporan = $this->input->post('judul_laporan');
            $google_drive_pdf = $this->input->post('google_drive_pdf');
            $this->get_laporan->process(array(
                'action' => 'insert',
                'table' => 'tbl_laporan',
                'column_value' => array(
                    
                    'judul_laporan' => $judul_laporan,
                    'google_drive_pdf' => $google_drive_pdf
                )
            ));
            redirect('laporan/add');
        }
        $this->layout->loadView('laporan_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'laporan_list',
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