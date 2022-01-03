<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class artikel_kategori extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_artikel_kategori');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_artikel_kategori() {
        $this->get_artikel_kategori->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("artikel_kategori/get_artikel_kategori");
    }
    
    public function hapus($id){
        /* $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : $id; */
        $this->get_artikel_kategori->process(array(
            'action' => 'delete',
            'table' => 'tbl_artikel_kategori',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('artikel_kategori');
    }
    
    public function edit($id){
        /* $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : $id; */
        if($this->input->post('judul_kategori')){
            $judul_kategori = $this->input->post('judul_kategori');
            $this->get_artikel_kategori->process(array(
                'action' => 'update',
                'table' => 'tbl_artikel_kategori',
                'column_value' => array(
                    'judul_kategori' => $judul_kategori
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('artikel_kategori/edit/'.$id.'');
        }
        $this->get_artikel_kategori->process(array(
            'action' => 'select',
            'table' => 'tbl_artikel_kategori',
            'column_value' => array(
                    'judul_kategori'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('artikel_kategori_form', array(
                    'judul_kategori' => $this->row->judul_kategori
        ));
    }
    
    public function add(){
        if($this->input->post('judul_kategori')){
            $judul_kategori = $this->input->post('judul_kategori');
            $this->get_artikel_kategori->process(array(
                'action' => 'insert',
                'table' => 'tbl_artikel_kategori',
                'column_value' => array(
                    'judul_kategori' => $judul_kategori
                )
            ));
            redirect('artikel_kategori/add');
        }
        $this->layout->loadView('artikel_kategori_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'artikel_kategori',
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




