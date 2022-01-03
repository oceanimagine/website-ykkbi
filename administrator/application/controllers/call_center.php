<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class call_center extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_call_center');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_call_center() {
        $this->get_call_center->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("call_center/get_call_center");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_call_center->process(array(
            'action' => 'delete',
            'table' => 'tbl_call_center',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('call_center');
    }
    
    public function edit($id){
        if($this->input->post('judul_call_center')){
            $_GET['id'] = $id;
            
            $judul_call_center = $this->input->post('judul_call_center');
            $nomor_call_center = $this->input->post('nomor_call_center');
            $keterangan = $this->input->post('keterangan');
            $this->get_call_center->process(array(
                'action' => 'update',
                'table' => 'tbl_call_center',
                'column_value' => array(
                    
                    'judul_call_center' => $judul_call_center,
                    'nomor_call_center' => $nomor_call_center,
                    'keterangan' => $keterangan
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('call_center/edit/'.$id.'');
        }
        $this->get_call_center->process(array(
            'action' => 'select',
            'table' => 'tbl_call_center',
            'column_value' => array(
                
                'judul_call_center',
                'nomor_call_center',
                'keterangan'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('call_center_form', array(
            
            'judul_call_center' => $this->row->{'judul_call_center'},
            'nomor_call_center' => $this->row->{'nomor_call_center'},
            'keterangan' => $this->row->{'keterangan'}
        ));
    }
    
    public function add(){
        if($this->input->post('judul_call_center')){
            
            $judul_call_center = $this->input->post('judul_call_center');
            $nomor_call_center = $this->input->post('nomor_call_center');
            $keterangan = $this->input->post('keterangan');
            $this->get_call_center->process(array(
                'action' => 'insert',
                'table' => 'tbl_call_center',
                'column_value' => array(
                    
                    'judul_call_center' => $judul_call_center,
                    'nomor_call_center' => $nomor_call_center,
                    'keterangan' => $keterangan
                )
            ));
            redirect('call_center/add');
        }
        $this->layout->loadView('call_center_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'call_center_list',
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