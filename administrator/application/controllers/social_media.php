<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class social_media extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_social_media');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_social_media() {
        $this->get_social_media->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("social_media/get_social_media");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_social_media->process(array(
            'action' => 'delete',
            'table' => 'tbl_social_media',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('social_media');
    }
    
    public function edit($id){
        if($this->input->post('nama_social_media')){
            $_GET['id'] = $id;
            
            $nama_social_media = $this->input->post('nama_social_media');
            $logo = $this->input->post('logo');
            $link = $this->input->post('link');
            $this->get_social_media->process(array(
                'action' => 'update',
                'table' => 'tbl_social_media',
                'column_value' => array(
                    
                    'nama_social_media' => $nama_social_media,
                    'logo' => $logo,
                    'link' => $link
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('social_media/edit/'.$id.'');
        }
        $this->get_social_media->process(array(
            'action' => 'select',
            'table' => 'tbl_social_media',
            'column_value' => array(
                
                'nama_social_media',
                'logo',
                'link'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('social_media_form', array(
            
            'nama_social_media' => $this->row->{'nama_social_media'},
            'logo' => $this->row->{'logo'},
            'link' => $this->row->{'link'}
        ));
    }
    
    public function add(){
        if($this->input->post('nama_social_media')){
            
            $nama_social_media = $this->input->post('nama_social_media');
            $logo = $this->input->post('logo');
            $link = $this->input->post('link');
            $this->get_social_media->process(array(
                'action' => 'insert',
                'table' => 'tbl_social_media',
                'column_value' => array(
                    
                    'nama_social_media' => $nama_social_media,
                    'logo' => $logo,
                    'link' => $link
                )
            ));
            redirect('social_media/add');
        }
        $this->layout->loadView('social_media_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'social_media_list',
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