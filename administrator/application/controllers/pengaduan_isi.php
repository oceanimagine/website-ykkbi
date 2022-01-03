<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class pengaduan_isi extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_pengaduan_isi');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_pengaduan_isi() {
        $this->get_pengaduan_isi->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("pengaduan_isi/get_pengaduan_isi");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        delete_photo('photo_pengaduan_isi');
        $this->get_pengaduan_isi->process(array(
            'action' => 'delete',
            'table' => 'tbl_pengaduan_isi',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('pengaduan_isi');
    }
    
    public function edit($id){
        if($this->input->post('id_pengaduan_kategori')){
            $_GET['id'] = $id;
            
            $id_pengaduan_kategori = $this->input->post('id_pengaduan_kategori');
            upload_file("photo_pengaduan_isi");
            $nama_lengkap = $this->input->post('nama_lengkap');
            $email = $this->input->post('email');
            $pesan_pengaduan = $this->input->post('pesan_pengaduan');
            $this->get_pengaduan_isi->process(array(
                'action' => 'update',
                'table' => 'tbl_pengaduan_isi',
                'column_value' => array(
                    
                    'id_pengaduan_kategori' => $id_pengaduan_kategori,
                    'photo_pengaduan_isi' => $this->name_file_upload,
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'pesan_pengaduan' => $pesan_pengaduan
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('pengaduan_isi/edit/'.$id.'');
        }
        $this->get_pengaduan_isi->process(array(
            'action' => 'select',
            'table' => 'tbl_pengaduan_isi',
            'column_value' => array(
                
                'id_pengaduan_kategori',
                'photo_pengaduan_isi',
                'nama_lengkap',
                'email',
                'pesan_pengaduan'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('pengaduan_isi_form', array(
            
            'id_pengaduan_kategori' => $this->row->{'id_pengaduan_kategori'},
            'photo_pengaduan_isi' => $this->row->{'photo_pengaduan_isi'},
            'nama_lengkap' => $this->row->{'nama_lengkap'},
            'email' => $this->row->{'email'},
            'pesan_pengaduan' => $this->row->{'pesan_pengaduan'}
        ));
    }
    
    public function add(){
        if($this->input->post('id_pengaduan_kategori')){
            
            $id_pengaduan_kategori = $this->input->post('id_pengaduan_kategori');
            upload_file("photo_pengaduan_isi");
            $nama_lengkap = $this->input->post('nama_lengkap');
            $email = $this->input->post('email');
            $pesan_pengaduan = $this->input->post('pesan_pengaduan');
            $this->get_pengaduan_isi->process(array(
                'action' => 'insert',
                'table' => 'tbl_pengaduan_isi',
                'column_value' => array(
                    
                    'id_pengaduan_kategori' => $id_pengaduan_kategori,
                    'photo_pengaduan_isi' => $this->name_file_upload,
                    'nama_lengkap' => $nama_lengkap,
                    'email' => $email,
                    'pesan_pengaduan' => $pesan_pengaduan
                )
            ));
            redirect('pengaduan_isi/add');
        }
        $this->layout->loadView('pengaduan_isi_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'pengaduan_isi_list',
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