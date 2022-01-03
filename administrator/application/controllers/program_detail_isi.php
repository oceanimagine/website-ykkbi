<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class program_detail_isi extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_program_detail_isi');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_program_detail_isi() {
        $this->get_program_detail_isi->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("program_detail_isi/get_program_detail_isi");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_program_detail_isi->process(array(
            'action' => 'delete',
            'table' => 'tbl_program_detail_isi',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('program_detail_isi');
    }
    
    public function edit($id){
        if($this->input->post('id_program_daftar_isi')){
            $_GET['id'] = $id;
            
            $id_program_daftar_isi = $this->input->post('id_program_daftar_isi');
            $isi = $this->input->post('isi');
            $this->get_program_detail_isi->process(array(
                'action' => 'update',
                'table' => 'tbl_program_detail_isi',
                'column_value' => array(
                    
                    'id_program_daftar_isi' => $id_program_daftar_isi,
                    'isi' => $isi
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('program_detail_isi/edit/'.$id.'');
        }
        $this->get_program_detail_isi->process(array(
            'action' => 'select',
            'table' => 'tbl_program_detail_isi',
            'column_value' => array(
                
                'id_program_daftar_isi',
                'isi'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('program_detail_isi_form', array(
            
            'id_program_daftar_isi' => $this->row->{'id_program_daftar_isi'},
            'isi' => $this->row->{'isi'}
        ));
    }
    
    public function add(){
        if($this->input->post('id_program_daftar_isi')){
            
            $id_program_daftar_isi = $this->input->post('id_program_daftar_isi');
            $isi = $this->input->post('isi');
            $this->get_program_detail_isi->process(array(
                'action' => 'insert',
                'table' => 'tbl_program_detail_isi',
                'column_value' => array(
                    
                    'id_program_daftar_isi' => $id_program_daftar_isi,
                    'isi' => $isi
                )
            ));
            redirect('program_detail_isi/add');
        }
        $this->layout->loadView('program_detail_isi_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'program_detail_isi_list',
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