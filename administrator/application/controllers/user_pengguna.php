<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class user_pengguna extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_user_pengguna');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_user_pengguna() {
        $this->get_user_pengguna->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("user_pengguna/get_user_pengguna");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        delete_photo('photo_user_pengguna');
        $this->get_user_pengguna->process(array(
            'action' => 'delete',
            'table' => 'tbl_user_pengguna',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('user_pengguna');
    }
    
    public function edit($id){
        if($this->input->post('nama_lengkap')){
            $_GET['id'] = $id;
            
            $nama_lengkap = $this->input->post('nama_lengkap');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $nomor_telepon = $this->input->post('nomor_telepon');
            $email = $this->input->post('email');
            $alamat_lengkap = $this->input->post('alamat_lengkap');
            upload_file("photo_user_pengguna");
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->get_user_pengguna->process(array(
                'action' => 'update',
                'table' => 'tbl_user_pengguna',
                'column_value' => array(
                    
                    'nama_lengkap' => $nama_lengkap,
                    'jenis_kelamin' => $jenis_kelamin,
                    'nomor_telepon' => $nomor_telepon,
                    'email' => $email,
                    'alamat_lengkap' => $alamat_lengkap,
                    'photo_user_pengguna' => $this->name_file_upload,
                    'username' => $username,
                    'password' => $password
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('user_pengguna/edit/'.$id.'');
        }
        $this->get_user_pengguna->process(array(
            'action' => 'select',
            'table' => 'tbl_user_pengguna',
            'column_value' => array(
                
                'nama_lengkap',
                'jenis_kelamin',
                'nomor_telepon',
                'email',
                'alamat_lengkap',
                'photo_user_pengguna',
                'username',
                'password'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('user_pengguna_form', array(
            
            'nama_lengkap' => $this->row->{'nama_lengkap'},
            'jenis_kelamin' => $this->row->{'jenis_kelamin'},
            'nomor_telepon' => $this->row->{'nomor_telepon'},
            'email' => $this->row->{'email'},
            'alamat_lengkap' => $this->row->{'alamat_lengkap'},
            'photo_user_pengguna' => $this->row->{'photo_user_pengguna'},
            'username' => $this->row->{'username'},
            'password' => $this->row->{'password'}
        ));
    }
    
    public function add(){
        if($this->input->post('nama_lengkap')){
            
            $nama_lengkap = $this->input->post('nama_lengkap');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $nomor_telepon = $this->input->post('nomor_telepon');
            $email = $this->input->post('email');
            $alamat_lengkap = $this->input->post('alamat_lengkap');
            upload_file("photo_user_pengguna");
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->get_user_pengguna->process(array(
                'action' => 'insert',
                'table' => 'tbl_user_pengguna',
                'column_value' => array(
                    
                    'nama_lengkap' => $nama_lengkap,
                    'jenis_kelamin' => $jenis_kelamin,
                    'nomor_telepon' => $nomor_telepon,
                    'email' => $email,
                    'alamat_lengkap' => $alamat_lengkap,
                    'photo_user_pengguna' => $this->name_file_upload,
                    'username' => $username,
                    'password' => $password
                )
            ));
            redirect('user_pengguna/add');
        }
        $this->layout->loadView('user_pengguna_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'user_pengguna_list',
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