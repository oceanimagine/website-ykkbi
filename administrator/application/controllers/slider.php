<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class slider extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_slider');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_slider() {
        $GLOBALS['COBA'] = false;
        $this->get_slider->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("slider/get_slider");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        delete_photo('photo_slider');
        $this->get_slider->process(array(
            'action' => 'delete',
            'table' => 'tbl_slider',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('slider');
    }
    
    public function edit($id){
        if(isset($_POST['judul'])){
            $_GET['id'] = $id;
            
            upload_file("photo_slider");
            $judul = $this->input->post('judul');
            $deskripsi = $this->input->post('deskripsi');
            $this->get_slider->process(array(
                'action' => 'update',
                'table' => 'tbl_slider',
                'column_value' => array(
                    
                    'photo_slider' => $this->name_file_upload,
                    'judul' => $judul,
                    'deskripsi' => $deskripsi
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('slider/edit/'.$id.'');
        }
        $this->get_slider->process(array(
            'action' => 'select',
            'table' => 'tbl_slider',
            'column_value' => array(
                
                'photo_slider',
                'judul',
                'deskripsi'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('slider_form', array(
            
            'photo_slider' => $this->row->{'photo_slider'},
            'judul' => $this->row->{'judul'},
            'deskripsi' => $this->row->{'deskripsi'}
        ));
    }
    
    public function add(){
        if(isset($_POST['judul'])){
            
            upload_file("photo_slider");
            $judul = $this->input->post('judul');
            $deskripsi = $this->input->post('deskripsi');
            $this->get_slider->process(array(
                'action' => 'insert',
                'table' => 'tbl_slider',
                'column_value' => array(
                    
                    'photo_slider' => $this->name_file_upload,
                    'judul' => $judul,
                    'deskripsi' => $deskripsi
                )
            ));
            redirect('slider/add');
        }
        $this->layout->loadView('slider_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'slider_list',
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