<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class pengaduan_kategori extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_pengaduan_kategori');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_pengaduan_kategori() {
        $this->get_pengaduan_kategori->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("pengaduan_kategori/get_pengaduan_kategori");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_pengaduan_kategori->process(array(
            'action' => 'delete',
            'table' => 'tbl_pengaduan_kategori',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('pengaduan_kategori');
    }
    
    public function edit($id){
        if($this->input->post('judul_kategori')){
            $_GET['id'] = $id;
            
            $judul_kategori = $this->input->post('judul_kategori');
            $this->get_pengaduan_kategori->process(array(
                'action' => 'update',
                'table' => 'tbl_pengaduan_kategori',
                'column_value' => array(
                    
                    'judul_kategori' => $judul_kategori
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('pengaduan_kategori/edit/'.$id.'');
        }
        $this->get_pengaduan_kategori->process(array(
            'action' => 'select',
            'table' => 'tbl_pengaduan_kategori',
            'column_value' => array(
                
                'judul_kategori'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('pengaduan_kategori_form', array(
            
            'judul_kategori' => $this->row->{'judul_kategori'}
        ));
    }
    
    public function add(){
        if($this->input->post('judul_kategori')){
            
            $judul_kategori = $this->input->post('judul_kategori');
            $this->get_pengaduan_kategori->process(array(
                'action' => 'insert',
                'table' => 'tbl_pengaduan_kategori',
                'column_value' => array(
                    
                    'judul_kategori' => $judul_kategori
                )
            ));
            redirect('pengaduan_kategori/add');
        }
        $this->layout->loadView('pengaduan_kategori_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'pengaduan_kategori_list',
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