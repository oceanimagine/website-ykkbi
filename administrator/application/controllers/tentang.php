<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class tentang extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_tentang');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_tentang() {
        $this->get_tentang->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("tentang/get_tentang");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_tentang->process(array(
            'action' => 'delete',
            'table' => 'tbl_tentang',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('tentang');
    }
    
    public function edit($id){
        if($this->input->post('kategori_tentang')){
            $_GET['id'] = $id;
            
            $kategori_tentang = $this->input->post('kategori_tentang');
            $judul_tentang = $this->input->post('judul_tentang');
            $isi_tentang = $this->input->post('isi_tentang');
            $this->get_tentang->process(array(
                'action' => 'update',
                'table' => 'tbl_tentang',
                'column_value' => array(
                    
                    'kategori_tentang' => $kategori_tentang,
                    'judul_tentang' => $judul_tentang,
                    'isi_tentang' => $isi_tentang
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('tentang/edit/'.$id.'');
        }
        $this->get_tentang->process(array(
            'action' => 'select',
            'table' => 'tbl_tentang',
            'column_value' => array(
                
                'kategori_tentang',
                'judul_tentang',
                'isi_tentang'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('tentang_form', array(
            
            'kategori_tentang' => $this->row->{'kategori_tentang'},
            'judul_tentang' => $this->row->{'judul_tentang'},
            'isi_tentang' => $this->row->{'isi_tentang'}
        ));
    }
    
    public function add(){
        if($this->input->post('kategori_tentang')){
            
            $kategori_tentang = $this->input->post('kategori_tentang');
            $judul_tentang = $this->input->post('judul_tentang');
            $isi_tentang = $this->input->post('isi_tentang');
            $this->get_tentang->process(array(
                'action' => 'insert',
                'table' => 'tbl_tentang',
                'column_value' => array(
                    
                    'kategori_tentang' => $kategori_tentang,
                    'judul_tentang' => $judul_tentang,
                    'isi_tentang' => $isi_tentang
                )
            ));
            redirect('tentang/add');
        }
        $this->layout->loadView('tentang_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'tentang_list',
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