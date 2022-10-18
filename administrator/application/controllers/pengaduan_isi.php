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
        delete_photo('photo_pengaduan_isi', 'tbl_pengaduan_isi', 'kejadian_bukti');
        $this->get_pengaduan_isi->process(array(
            'action' => 'delete',
            'table' => 'tbl_pengaduan_isi',
            'where' => 'id = \''.$id.'\''
        ));
        redirect('pengaduan_isi');
    }
    
    public function edit($id){
        if($this->input->post('nama_pelapor')){
            $_GET['id'] = $id;
            
            $nama_pelapor = $this->input->post('nama_pelapor');
            $nomor_telepon = $this->input->post('nomor_telepon');
            $alamat_email = $this->input->post('alamat_email');
            $nama_dilaporkan = $this->input->post('nama_dilaporkan');
            $pelanggaran_dilaporkan = $this->input->post('pelanggaran_dilaporkan');
            $tanggal_kejadian = $this->input->post('tanggal_kejadian');
            $lokasi_kejadian = $this->input->post('lokasi_kejadian');
            
            upload_file("photo_pengaduan_isi", 'tbl_pengaduan_isi', 'kejadian_bukti');
            
            $this->get_pengaduan_isi->process(array(
                'action' => 'update',
                'table' => 'tbl_pengaduan_isi',
                'column_value' => array(
                    
                    'laporan_tgl' => date("Ymd"),
                    'laporan_jam' => date("H:i:s"),
                    'pelapor_nama' => $nama_pelapor,
                    'pelapor_tlp' => $nomor_telepon,
                    'pelapor_email' => $alamat_email,
                    'dilaporkan_nama' => $nama_dilaporkan,
                    'dilaporkan_pelanggaran' => $pelanggaran_dilaporkan,
                    'kejadian_tgl' => str_replace("-", "", $tanggal_kejadian),
                    'kejadian_lokasi' => $lokasi_kejadian,
                    'kejadian_bukti' => $this->name_file_upload
                ),
                'where' => 'id = \''.$id.'\''
            ));
            redirect('pengaduan_isi/edit/'.$id.'');
        }
        $this->get_pengaduan_isi->process(array(
            'action' => 'select',
            'table' => 'tbl_pengaduan_isi',
            'column_value' => array(
                'laporan_no',
                'laporan_tgl',
                'laporan_jam',
                'pelapor_nama',
                'pelapor_tlp',
                'pelapor_email',
                'dilaporkan_nama',
                'dilaporkan_pelanggaran',
                'kejadian_tgl',
                'kejadian_lokasi',
                'kejadian_bukti'
            ),
            'where' => 'id = \''.$id.'\''
        ));
        $this->layout->loadView('pengaduan_isi_form', array(
            'laporan_no' => $this->row->{'laporan_no'},
            'pelapor_nama' => $this->row->{'pelapor_nama'},
            'pelapor_tlp' => $this->row->{'pelapor_tlp'},
            'pelapor_email' => $this->row->{'pelapor_email'},
            'dilaporkan_nama' => $this->row->{'dilaporkan_nama'},
            'dilaporkan_pelanggaran' => $this->row->{'dilaporkan_pelanggaran'},
            'kejadian_tgl' => substr($this->row->{'kejadian_tgl'},0,4) . "-" . substr($this->row->{'kejadian_tgl'},4,2) . "-" . substr($this->row->{'kejadian_tgl'},6,2),
            'kejadian_lokasi' => $this->row->{'kejadian_lokasi'},
            'kejadian_bukti' => $this->row->{'kejadian_bukti'},
        ));
    }
    
    public function add(){
        if($this->input->post('nama_pelapor')){
            
            $nama_pelapor = $this->input->post('nama_pelapor');
            $nomor_telepon = $this->input->post('nomor_telepon');
            $alamat_email = $this->input->post('alamat_email');
            $nama_dilaporkan = $this->input->post('nama_dilaporkan');
            $pelanggaran_dilaporkan = $this->input->post('pelanggaran_dilaporkan');
            $tanggal_kejadian = $this->input->post('tanggal_kejadian');
            $lokasi_kejadian = $this->input->post('lokasi_kejadian');
            upload_file("photo_pengaduan_isi");
            
            $this->get_pengaduan_isi->process(array(
                'action' => 'insert',
                'table' => 'tbl_pengaduan_isi',
                'column_value' => array(
                    'laporan_no' => SYNTAX("CONCAT(LPAD((SELECT (COUNT(b.id) + 1) next_num FROM `tbl_pengaduan_isi` b where SUBSTR(b.laporan_no, 5, 4) = YEAR(CURDATE())), 3, '0'), '-', YEAR(CURDATE()), '-', 'WBS')"),
                    'laporan_tgl' => date("Ymd"),
                    'laporan_jam' => date("H:i:s"),
                    'pelapor_nama' => $nama_pelapor,
                    'pelapor_tlp' => $nomor_telepon,
                    'pelapor_email' => $alamat_email,
                    'dilaporkan_nama' => $nama_dilaporkan,
                    'dilaporkan_pelanggaran' => $pelanggaran_dilaporkan,
                    'kejadian_tgl' => str_replace("-", "", $tanggal_kejadian),
                    'kejadian_lokasi' => $lokasi_kejadian,
                    'kejadian_bukti' => $this->name_file_upload
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