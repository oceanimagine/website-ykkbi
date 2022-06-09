<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class tentang_profile_pengurus extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_tentang_profile_pengurus');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_tentang_profile_pengurus() {
        $this->get_tentang_profile_pengurus->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("tentang_profile_pengurus/get_tentang_profile_pengurus");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_tentang_profile_pengurus->process(array(
            'action' => 'delete',
            'table' => 'tbl_tentang_profile_pengurus',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('tentang_profile_pengurus');
    }
    
    public function edit($id){
        if($this->input->post('judul')){
            $_GET['id'] = $id;
            
            $judul = $this->input->post('judul');
            $isi_profile_pengurus = $this->input->post('isi_profile_pengurus');
            $status = $this->input->post('status');
            $this->get_tentang_profile_pengurus->process(array(
                'action' => 'update',
                'table' => 'tbl_tentang_profile_pengurus',
                'column_value' => array(
                    
                    'judul' => $judul,
                    'isi_profile_pengurus' => $isi_profile_pengurus,
                    'status' => $status
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('tentang_profile_pengurus/edit/'.$id.'');
        }
        $this->get_tentang_profile_pengurus->process(array(
            'action' => 'select',
            'table' => 'tbl_tentang_profile_pengurus',
            'column_value' => array(
                
                'id'
            ),
            'where' => 'status = \'publish\''
        ));
        $jumlah_publish = $this->num_rows;
        $data = $jumlah_publish > 0 ? $this->all : array((object) array("id" => 0));
        $this->get_tentang_profile_pengurus->process(array(
            'action' => 'select',
            'table' => 'tbl_tentang_profile_pengurus',
            'column_value' => array(
                
                'judul',
                'isi_profile_pengurus',
                'status'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('tentang_profile_pengurus_form', array(
            
            'judul' => $this->row->{'judul'},
            'isi_profile_pengurus' => $this->row->{'isi_profile_pengurus'},
            'status' => $this->row->{'status'},
            'id_data' => $data[0]->id,
            'id_edit' => $id,
            'jumlah_publish' => $jumlah_publish
        ));
    }
    
    public function add(){
        if($this->input->post('judul')){
            
            $judul = $this->input->post('judul');
            $isi_profile_pengurus = $this->input->post('isi_profile_pengurus');
            $status = $this->input->post('status');
            $this->get_tentang_profile_pengurus->process(array(
                'action' => 'insert',
                'table' => 'tbl_tentang_profile_pengurus',
                'column_value' => array(
                    
                    'judul' => $judul,
                    'isi_profile_pengurus' => $isi_profile_pengurus,
                    'status' => $status
                )
            ));
            redirect('tentang_profile_pengurus/add');
        }
        $this->get_tentang_profile_pengurus->process(array(
            'action' => 'select',
            'table' => 'tbl_tentang_profile_pengurus',
            'column_value' => array(
                
                'id'
            ),
            'where' => 'status = \'publish\''
        ));
        $jumlah_publish = $this->num_rows;
        $this->layout->loadView('tentang_profile_pengurus_form', array(
            'jumlah_publish' => $jumlah_publish
        ));
    }
    
    public function index() {
        $this->layout->loadView(
            'tentang_profile_pengurus_list',
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