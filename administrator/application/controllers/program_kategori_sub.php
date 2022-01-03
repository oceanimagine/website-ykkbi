<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class program_kategori_sub extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_program_kategori_sub');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_program_kategori_sub() {
        $this->get_program_kategori_sub->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("program_kategori_sub/get_program_kategori_sub");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_program_kategori_sub->process(array(
            'action' => 'delete',
            'table' => 'tbl_program_kategori_sub',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('program_kategori_sub');
    }
    
    public function edit($id){
        if($this->input->post('id_program_kategori_induk')){
            $_GET['id'] = $id;
            
            $id_program_kategori_induk = $this->input->post('id_program_kategori_induk');
            $judul_kategori_sub = $this->input->post('judul_kategori_sub');
            $this->get_program_kategori_sub->process(array(
                'action' => 'update',
                'table' => 'tbl_program_kategori_sub',
                'column_value' => array(
                    
                    'id_program_kategori_induk' => $id_program_kategori_induk,
                    'judul_kategori_sub' => $judul_kategori_sub
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('program_kategori_sub/edit/'.$id.'');
        }
        $this->get_program_kategori_sub->process(array(
            'action' => 'select',
            'table' => 'tbl_program_kategori_sub',
            'column_value' => array(
                
                'id_program_kategori_induk',
                'judul_kategori_sub'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('program_kategori_sub_form', array(
            
            'id_program_kategori_induk' => $this->row->{'id_program_kategori_induk'},
            'judul_kategori_sub' => $this->row->{'judul_kategori_sub'}
        ));
    }
    
    public function add(){
        if($this->input->post('id_program_kategori_induk')){
            
            $id_program_kategori_induk = $this->input->post('id_program_kategori_induk');
            $judul_kategori_sub = $this->input->post('judul_kategori_sub');
            $this->get_program_kategori_sub->process(array(
                'action' => 'insert',
                'table' => 'tbl_program_kategori_sub',
                'column_value' => array(
                    
                    'id_program_kategori_induk' => $id_program_kategori_induk,
                    'judul_kategori_sub' => $judul_kategori_sub
                )
            ));
            redirect('program_kategori_sub/add');
        }
        $this->layout->loadView('program_kategori_sub_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'program_kategori_sub_list',
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