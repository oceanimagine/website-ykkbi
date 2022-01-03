<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class hubungi_kami extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_hubungi_kami');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_hubungi_kami() {
        $this->get_hubungi_kami->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("hubungi_kami/get_hubungi_kami");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_hubungi_kami->process(array(
            'action' => 'delete',
            'table' => 'tbl_hubungi_kami',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('hubungi_kami');
    }
    
    public function edit($id){
        if($this->input->post('nama_lengkap_pengirim')){
            $_GET['id'] = $id;
            
            $nama_lengkap_pengirim = $this->input->post('nama_lengkap_pengirim');
            $email_pengirim = $this->input->post('email_pengirim');
            $isi_pesan_pengirim = $this->input->post('isi_pesan_pengirim');
            $this->get_hubungi_kami->process(array(
                'action' => 'update',
                'table' => 'tbl_hubungi_kami',
                'column_value' => array(
                    
                    'nama_lengkap_pengirim' => $nama_lengkap_pengirim,
                    'email_pengirim' => $email_pengirim,
                    'isi_pesan_pengirim' => $isi_pesan_pengirim
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('hubungi_kami/edit/'.$id.'');
        }
        $this->get_hubungi_kami->process(array(
            'action' => 'select',
            'table' => 'tbl_hubungi_kami',
            'column_value' => array(
                
                'nama_lengkap_pengirim',
                'email_pengirim',
                'isi_pesan_pengirim'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('hubungi_kami_form', array(
            
            'nama_lengkap_pengirim' => $this->row->{'nama_lengkap_pengirim'},
            'email_pengirim' => $this->row->{'email_pengirim'},
            'isi_pesan_pengirim' => $this->row->{'isi_pesan_pengirim'}
        ));
    }
    
    public function add(){
        if($this->input->post('nama_lengkap_pengirim')){
            
            $nama_lengkap_pengirim = $this->input->post('nama_lengkap_pengirim');
            $email_pengirim = $this->input->post('email_pengirim');
            $isi_pesan_pengirim = $this->input->post('isi_pesan_pengirim');
            $this->get_hubungi_kami->process(array(
                'action' => 'insert',
                'table' => 'tbl_hubungi_kami',
                'column_value' => array(
                    
                    'nama_lengkap_pengirim' => $nama_lengkap_pengirim,
                    'email_pengirim' => $email_pengirim,
                    'isi_pesan_pengirim' => $isi_pesan_pengirim
                )
            ));
            redirect('hubungi_kami/add');
        }
        $this->layout->loadView('hubungi_kami_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'hubungi_kami_list',
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