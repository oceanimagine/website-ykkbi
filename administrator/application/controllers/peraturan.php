<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class peraturan extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_peraturan');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_peraturan() {
        $this->get_peraturan->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("peraturan/get_peraturan");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_peraturan->process(array(
            'action' => 'delete',
            'table' => 'tbl_peraturan',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('peraturan');
    }
    
    public function edit($id){
        if($this->input->post('judul_peraturan')){
            $_GET['id'] = $id;
            
            $judul_peraturan = $this->input->post('judul_peraturan');
            $google_drive_pdf = $this->input->post('google_drive_pdf');
            $status = $this->input->post('status');
            $this->get_peraturan->process(array(
                'action' => 'update',
                'table' => 'tbl_peraturan',
                'column_value' => array(
                    
                    'judul_peraturan' => $judul_peraturan,
                    'google_drive_pdf' => $google_drive_pdf,
                    'status' => $status
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('peraturan/edit/'.$id.'');
        }
        $this->get_peraturan->process(array(
            'action' => 'select',
            'table' => 'tbl_peraturan',
            'column_value' => array(
                
                'id'
            ),
            'where' => 'status = \'publish\''
        ));
        $jumlah_publish = $this->num_rows;
        $data = $jumlah_publish > 0 ? $this->all : array((object) array("id" => 0));
        $this->get_peraturan->process(array(
            'action' => 'select',
            'table' => 'tbl_peraturan',
            'column_value' => array(
                'id',
                'judul_peraturan',
                'google_drive_pdf',
                'status'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('peraturan_form', array(
            
            'judul_peraturan' => $this->row->{'judul_peraturan'},
            'google_drive_pdf' => $this->row->{'google_drive_pdf'},
            'id_data' => $data[0]->id,
            'id_edit' => $id,
            'status' => $this->row->{'status'},
            'jumlah_publish' => $jumlah_publish
        ));
    }
    
    public function add(){
        if($this->input->post('judul_peraturan')){
            
            $judul_peraturan = $this->input->post('judul_peraturan');
            $google_drive_pdf = $this->input->post('google_drive_pdf');
            $status = $this->input->post('status');
            $this->get_peraturan->process(array(
                'action' => 'insert',
                'table' => 'tbl_peraturan',
                'column_value' => array(
                    
                    'judul_peraturan' => $judul_peraturan,
                    'google_drive_pdf' => $google_drive_pdf,
                    'status' => $status
                )
            ));
            redirect('peraturan/add');
        }
        $this->get_peraturan->process(array(
            'action' => 'select',
            'table' => 'tbl_peraturan',
            'column_value' => array(
                
                'id'
            ),
            'where' => 'status = \'publish\''
        ));
        $jumlah_publish = $this->num_rows;
        $this->layout->loadView('peraturan_form', array(
            'jumlah_publish' => $jumlah_publish
        ));
    }
    
    public function index() {
        $this->layout->loadView(
            'peraturan_list',
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