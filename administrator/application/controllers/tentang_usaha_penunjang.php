<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class tentang_usaha_penunjang extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_tentang_usaha_penunjang');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_tentang_usaha_penunjang() {
        $this->get_tentang_usaha_penunjang->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("tentang_usaha_penunjang/get_tentang_usaha_penunjang");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_tentang_usaha_penunjang->process(array(
            'action' => 'delete',
            'table' => 'tbl_tentang_usaha_penunjang',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('tentang_usaha_penunjang');
    }
    
    public function edit($id){
        if($this->input->post('nama_usaha')){
            $_GET['id'] = $id;
            
            $nama_usaha = $this->input->post('nama_usaha');
            $link_usaha = $this->input->post('link_usaha');
            $this->get_tentang_usaha_penunjang->process(array(
                'action' => 'update',
                'table' => 'tbl_tentang_usaha_penunjang',
                'column_value' => array(
                    
                    'nama_usaha' => $nama_usaha,
                    'link_usaha' => $link_usaha
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('tentang_usaha_penunjang/edit/'.$id.'');
        }
        $this->get_tentang_usaha_penunjang->process(array(
            'action' => 'select',
            'table' => 'tbl_tentang_usaha_penunjang',
            'column_value' => array(
                
                'nama_usaha',
                'link_usaha'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('tentang_usaha_penunjang_form', array(
            
            'nama_usaha' => $this->row->{'nama_usaha'},
            'link_usaha' => $this->row->{'link_usaha'}
        ));
    }
    
    public function add(){
        if($this->input->post('nama_usaha')){
            
            $nama_usaha = $this->input->post('nama_usaha');
            $link_usaha = $this->input->post('link_usaha');
            $this->get_tentang_usaha_penunjang->process(array(
                'action' => 'insert',
                'table' => 'tbl_tentang_usaha_penunjang',
                'column_value' => array(
                    
                    'nama_usaha' => $nama_usaha,
                    'link_usaha' => $link_usaha
                )
            ));
            redirect('tentang_usaha_penunjang/add');
        }
        $this->layout->loadView('tentang_usaha_penunjang_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'tentang_usaha_penunjang_list',
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