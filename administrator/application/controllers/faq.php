<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* https://stackoverflow.com/jobs/149384/software-engineer-team-lead-iprice-group?med=clc
 * https://stackoverflow.com/questions/17059987/changing-from-msql-to-mysqli-real-escape-string-link
 */

class faq extends CI_Controller {
    
    public $layout;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('get_faq');
        $this->layout = new layout('lite');
        Privilege::admin();
    }

    public function get_faq() {
        $this->get_faq->get_data();
    }

    public function script_table(){
        return $this->layout->loadjs("faq/get_faq");
    }
    
    public function hapus($id){
        $_GET['id'] = $id;
        
        $this->get_faq->process(array(
            'action' => 'delete',
            'table' => 'tbl_faq',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('faq');
    }
    
    public function edit($id){
        if($this->input->post('judul')){
            $_GET['id'] = $id;
            
            $judul = $this->input->post('judul');
            $pertanyaan = $this->input->post('pertanyaan');
            $jawaban = $this->input->post('jawaban');
            $this->get_faq->process(array(
                'action' => 'update',
                'table' => 'tbl_faq',
                'column_value' => array(
                    
                    'judul' => $judul,
                    'pertanyaan' => $pertanyaan,
                    'jawaban' => $jawaban
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('faq/edit/'.$id.'');
        }
        $this->get_faq->process(array(
            'action' => 'select',
            'table' => 'tbl_faq',
            'column_value' => array(
                
                'judul',
                'pertanyaan',
                'jawaban'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('faq_form', array(
            
            'judul' => $this->row->{'judul'},
            'pertanyaan' => $this->row->{'pertanyaan'},
            'jawaban' => $this->row->{'jawaban'}
        ));
    }
    
    public function add(){
        if($this->input->post('judul')){
            
            $judul = $this->input->post('judul');
            $pertanyaan = $this->input->post('pertanyaan');
            $jawaban = $this->input->post('jawaban');
            $this->get_faq->process(array(
                'action' => 'insert',
                'table' => 'tbl_faq',
                'column_value' => array(
                    
                    'judul' => $judul,
                    'pertanyaan' => $pertanyaan,
                    'jawaban' => $jawaban
                )
            ));
            redirect('faq/add');
        }
        $this->layout->loadView('faq_form');
    }
    
    public function index() {
        $this->layout->loadView(
            'faq_list',
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