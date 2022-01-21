<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class tkht_bantuan extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_tkht_bantuan');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_tkht_bantuan() {
        $this->get_tkht_bantuan->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("tkht_bantuan/get_tkht_bantuan");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_tkht_bantuan->process(array(
            'action' => 'delete',
            'table' => 'tbl_tkht_bantuan',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('tkht_bantuan');
    }
    
    public function edit($id){
        if($this->input->post('judul')){
            $_GET['id'] = $id;
            
            $judul = $this->input->post('judul');
            $isi_tkht_bantuan = $this->input->post('isi_tkht_bantuan');
            $tipe_tkht = $this->input->post('tipe_tkht');
            $status = $this->input->post('status');
            $this->get_tkht_bantuan->process(array(
                'action' => 'update',
                'table' => 'tbl_tkht_bantuan',
                'column_value' => array(
                    
                    'judul' => $judul,
                    'isi_tkht_bantuan' => $isi_tkht_bantuan,
                    'tipe_tkht' => $tipe_tkht,
                    'status' => $status
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('tkht_bantuan/edit/'.$id.'');
        }
        $this->get_tkht_bantuan->process(array(
            'action' => 'select',
            'table' => 'tbl_tkht_bantuan',
            'column_value' => array(
                
                'judul',
                'isi_tkht_bantuan',
                'tipe_tkht',
                'status'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('tkht_bantuan_form', array(
            
            'judul' => $this->row->{'judul'},
            'isi_tkht_bantuan' => $this->row->{'isi_tkht_bantuan'},
            'tipe_tkht' => $this->row->{'tipe_tkht'},
            'status' => $this->row->{'status'}
        ));
    }
    
    public function add(){
        if($this->input->post('judul')){
            
            $judul = $this->input->post('judul');
            $isi_tkht_bantuan = $this->input->post('isi_tkht_bantuan');
            $tipe_tkht = $this->input->post('tipe_tkht');
            $status = $this->input->post('status');
            $this->get_tkht_bantuan->process(array(
                'action' => 'insert',
                'table' => 'tbl_tkht_bantuan',
                'column_value' => array(
                    
                    'judul' => $judul,
                    'isi_tkht_bantuan' => $isi_tkht_bantuan,
                    'tipe_tkht' => $tipe_tkht,
                    'status' => $status
                )
            ));
            redirect('tkht_bantuan/add');
        }
        $this->layout->loadView('tkht_bantuan_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'tkht_bantuan_list',
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