<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class informasi_lainnya extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_informasi_lainnya');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_informasi_lainnya() {
        $this->get_informasi_lainnya->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("informasi_lainnya/get_informasi_lainnya");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_informasi_lainnya->process(array(
            'action' => 'delete',
            'table' => 'tbl_informasi_lainnya',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('informasi_lainnya');
    }
    
    public function edit($id){
        if($this->input->post('redaksi')){
            $_GET['id'] = $id;
            
            $redaksi = $this->input->post('redaksi');
            $jenis = $this->input->post('jenis');
            $this->get_informasi_lainnya->process(array(
                'action' => 'update',
                'table' => 'tbl_informasi_lainnya',
                'column_value' => array(
                    
                    'redaksi' => $redaksi,
                    'jenis' => $jenis
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('informasi_lainnya/edit/'.$id.'');
        }
        $this->get_informasi_lainnya->process(array(
            'action' => 'select',
            'table' => 'tbl_informasi_lainnya',
            'column_value' => array(
                
                'redaksi',
                'jenis'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('informasi_lainnya_form', array(
            
            'redaksi' => $this->row->{'redaksi'},
            'jenis' => $this->row->{'jenis'}
        ));
    }
    
    public function add(){
        if($this->input->post('redaksi')){
            
            $redaksi = $this->input->post('redaksi');
            $jenis = $this->input->post('jenis');
            $this->get_informasi_lainnya->process(array(
                'action' => 'insert',
                'table' => 'tbl_informasi_lainnya',
                'column_value' => array(
                    
                    'redaksi' => $redaksi,
                    'jenis' => $jenis
                )
            ));
            redirect('informasi_lainnya/add');
        }
        $this->layout->loadView('informasi_lainnya_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'informasi_lainnya_list',
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