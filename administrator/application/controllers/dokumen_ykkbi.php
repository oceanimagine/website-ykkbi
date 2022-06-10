<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class dokumen_ykkbi extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_dokumen_ykkbi');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_dokumen_ykkbi() {
        $this->get_dokumen_ykkbi->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("dokumen_ykkbi/get_dokumen_ykkbi");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_dokumen_ykkbi->process(array(
            'action' => 'delete',
            'table' => 'tbl_dokumen_ykkbi',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('dokumen_ykkbi');
    }
    
    public function edit($id){
        if($this->input->post('judul_besar')){
            $_GET['id'] = $id;
            
            $judul_besar = $this->input->post('judul_besar');
            $judul_kecil = $this->input->post('judul_kecil');
            $google_drive_pdf = $this->input->post('google_drive_pdf');
            $status = $this->input->post('status');
            $this->get_dokumen_ykkbi->process(array(
                'action' => 'update',
                'table' => 'tbl_dokumen_ykkbi',
                'column_value' => array(
                    
                    'judul_besar' => $judul_besar,
                    'judul_kecil' => $judul_kecil,
                    'google_drive_pdf' => $google_drive_pdf,
                    'status' => $status
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('dokumen_ykkbi/edit/'.$id.'');
        }
        
        $this->get_dokumen_ykkbi->process(array(
            'action' => 'select',
            'table' => 'tbl_dokumen_ykkbi',
            'column_value' => array(
                'id',
                'judul_besar',
                'judul_kecil',
                'google_drive_pdf',
                'status'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('dokumen_ykkbi_form', array(
            
            'judul_besar' => $this->row->{'judul_besar'},
            'judul_kecil' => $this->row->{'judul_kecil'},
            'google_drive_pdf' => $this->row->{'google_drive_pdf'},
            'status' => $this->row->{'status'}
        ));
    }
    
    public function add(){
        if($this->input->post('judul_besar')){
            
            $judul_besar = $this->input->post('judul_besar');
            $judul_kecil = $this->input->post('judul_kecil');
            $google_drive_pdf = $this->input->post('google_drive_pdf');
            $status = $this->input->post('status');
            $this->get_dokumen_ykkbi->process(array(
                'action' => 'insert',
                'table' => 'tbl_dokumen_ykkbi',
                'column_value' => array(
                    
                    'judul_besar' => $judul_besar,
                    'judul_kecil' => $judul_kecil,
                    'google_drive_pdf' => $google_drive_pdf,
                    'status' => $status
                )
            ));
            redirect('dokumen_ykkbi/add');
        }
        $this->layout->loadView('dokumen_ykkbi_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'dokumen_ykkbi_list',
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