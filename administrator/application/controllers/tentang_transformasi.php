<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class tentang_transformasi extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_tentang_transformasi');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_tentang_transformasi() {
        $this->get_tentang_transformasi->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("tentang_transformasi/get_tentang_transformasi");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_tentang_transformasi->process(array(
            'action' => 'delete',
            'table' => 'tbl_tentang_transformasi',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('tentang_transformasi');
    }
    
    public function edit($id){
        if($this->input->post('judul')){
            $_GET['id'] = $id;
            
            $judul = $this->input->post('judul');
            $isi_transformasi = $this->input->post('isi_transformasi');
            $status = $this->input->post('status');
            $this->get_tentang_transformasi->process(array(
                'action' => 'update',
                'table' => 'tbl_tentang_transformasi',
                'column_value' => array(
                    
                    'judul' => $judul,
                    'isi_transformasi' => $isi_transformasi,
                    'status' => $status
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('tentang_transformasi/edit/'.$id.'');
        }
        $this->get_tentang_transformasi->process(array(
            'action' => 'select',
            'table' => 'tbl_tentang_transformasi',
            'column_value' => array(
                
                'judul',
                'isi_transformasi',
                'status'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('tentang_transformasi_form', array(
            
            'judul' => $this->row->{'judul'},
            'isi_transformasi' => $this->row->{'isi_transformasi'},
            'status' => $this->row->{'status'}
        ));
    }
    
    public function add(){
        if($this->input->post('judul')){
            
            $judul = $this->input->post('judul');
            $isi_transformasi = $this->input->post('isi_transformasi');
            $status = $this->input->post('status');
            $this->get_tentang_transformasi->process(array(
                'action' => 'insert',
                'table' => 'tbl_tentang_transformasi',
                'column_value' => array(
                    
                    'judul' => $judul,
                    'isi_transformasi' => $isi_transformasi,
                    'status' => $status
                )
            ));
            redirect('tentang_transformasi/add');
        }
        $this->layout->loadView('tentang_transformasi_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'tentang_transformasi_list',
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