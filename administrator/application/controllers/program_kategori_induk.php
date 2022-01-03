<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class program_kategori_induk extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_program_kategori_induk');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_program_kategori_induk() {
        $this->get_program_kategori_induk->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("program_kategori_induk/get_program_kategori_induk");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_program_kategori_induk->process(array(
            'action' => 'delete',
            'table' => 'tbl_program_kategori_induk',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('program_kategori_induk');
    }
    
    public function edit($id){
        if($this->input->post('judul_kategori')){
            $_GET['id'] = $id;
            
            $judul_kategori = $this->input->post('judul_kategori');
            $this->get_program_kategori_induk->process(array(
                'action' => 'update',
                'table' => 'tbl_program_kategori_induk',
                'column_value' => array(
                    
                    'judul_kategori' => $judul_kategori
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('program_kategori_induk/edit/'.$id.'');
        }
        $this->get_program_kategori_induk->process(array(
            'action' => 'select',
            'table' => 'tbl_program_kategori_induk',
            'column_value' => array(
                
                'judul_kategori'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('program_kategori_induk_form', array(
            
            'judul_kategori' => $this->row->{'judul_kategori'}
        ));
    }
    
    public function add(){
        if($this->input->post('judul_kategori')){
            
            $judul_kategori = $this->input->post('judul_kategori');
            $this->get_program_kategori_induk->process(array(
                'action' => 'insert',
                'table' => 'tbl_program_kategori_induk',
                'column_value' => array(
                    
                    'judul_kategori' => $judul_kategori
                )
            ));
            redirect('program_kategori_induk/add');
        }
        $this->layout->loadView('program_kategori_induk_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'program_kategori_induk_list',
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