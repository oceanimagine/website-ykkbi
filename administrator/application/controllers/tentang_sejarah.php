<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class tentang_sejarah extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_tentang_sejarah');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_tentang_sejarah() {
        $this->get_tentang_sejarah->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("tentang_sejarah/get_tentang_sejarah");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_tentang_sejarah->process(array(
            'action' => 'delete',
            'table' => 'tbl_tentang_sejarah',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('tentang_sejarah');
    }
    
    public function edit($id){
        if($this->input->post('judul')){
            $_GET['id'] = $id;
            
            $judul = $this->input->post('judul');
            $isi_sejarah = $this->input->post('isi_sejarah');
            $status = $this->input->post('status');
            $this->get_tentang_sejarah->process(array(
                'action' => 'update',
                'table' => 'tbl_tentang_sejarah',
                'column_value' => array(
                    
                    'judul' => $judul,
                    'isi_sejarah' => $isi_sejarah,
                    'status' => $status
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('tentang_sejarah/edit/'.$id.'');
        }
        $this->get_tentang_sejarah->process(array(
            'action' => 'select',
            'table' => 'tbl_tentang_sejarah',
            'column_value' => array(
                
                'judul',
                'isi_sejarah',
                'status'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('tentang_sejarah_form', array(
            
            'judul' => $this->row->{'judul'},
            'isi_sejarah' => $this->row->{'isi_sejarah'},
            'status' => $this->row->{'status'}
        ));
    }
    
    public function add(){
        if($this->input->post('judul')){
            
            $judul = $this->input->post('judul');
            $isi_sejarah = $this->input->post('isi_sejarah');
            $status = $this->input->post('status');
            $this->get_tentang_sejarah->process(array(
                'action' => 'insert',
                'table' => 'tbl_tentang_sejarah',
                'column_value' => array(
                    
                    'judul' => $judul,
                    'isi_sejarah' => $isi_sejarah,
                    'status' => $status
                )
            ));
            redirect('tentang_sejarah/add');
        }
        $this->layout->loadView('tentang_sejarah_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'tentang_sejarah_list',
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