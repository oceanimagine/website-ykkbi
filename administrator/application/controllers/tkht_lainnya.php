<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class tkht_lainnya extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_tkht_lainnya');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_tkht_lainnya() {
        $this->get_tkht_lainnya->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("tkht_lainnya/get_tkht_lainnya");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_tkht_lainnya->process(array(
            'action' => 'delete',
            'table' => 'tbl_tkht_lainnya',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('tkht_lainnya');
    }
    
    public function edit($id){
        if($this->input->post('judul')){
            $_GET['id'] = $id;
            
            $judul = $this->input->post('judul');
            $isi_tkht_lainnya = $this->input->post('isi_tkht_lainnya');
            $tipe_tkht = $this->input->post('tipe_tkht');
            $status = $this->input->post('status');
            $this->get_tkht_lainnya->process(array(
                'action' => 'update',
                'table' => 'tbl_tkht_lainnya',
                'column_value' => array(
                    
                    'judul' => $judul,
                    'isi_tkht_lainnya' => $isi_tkht_lainnya,
                    'tipe_tkht' => $tipe_tkht,
                    'status' => $status
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('tkht_lainnya/edit/'.$id.'');
        }
        $this->get_tkht_lainnya->process(array(
            'action' => 'select',
            'table' => 'tbl_tkht_lainnya',
            'column_value' => array(
                
                'judul',
                'isi_tkht_lainnya',
                'tipe_tkht',
                'status'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('tkht_lainnya_form', array(
            
            'judul' => $this->row->{'judul'},
            'isi_tkht_lainnya' => $this->row->{'isi_tkht_lainnya'},
            'tipe_tkht' => $this->row->{'tipe_tkht'},
            'status' => $this->row->{'status'}
        ));
    }
    
    public function add(){
        if($this->input->post('judul')){
            
            $judul = $this->input->post('judul');
            $isi_tkht_lainnya = $this->input->post('isi_tkht_lainnya');
            $tipe_tkht = $this->input->post('tipe_tkht');
            $status = $this->input->post('status');
            $this->get_tkht_lainnya->process(array(
                'action' => 'insert',
                'table' => 'tbl_tkht_lainnya',
                'column_value' => array(
                    
                    'judul' => $judul,
                    'isi_tkht_lainnya' => $isi_tkht_lainnya,
                    'tipe_tkht' => $tipe_tkht,
                    'status' => $status
                )
            ));
            redirect('tkht_lainnya/add');
        }
        $this->layout->loadView('tkht_lainnya_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'tkht_lainnya_list',
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