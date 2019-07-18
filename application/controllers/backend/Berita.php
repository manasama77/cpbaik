<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_core', 'mdb');
  }

  private function _template($data)
  {
    $this->load->view('backend/template', $data);
  }

  public function index()
  {
    $data['title']   = 'KSPPS Baytul Ikhtiar - List Berita Baik';
    $data['content'] = 'berita/index';
    $data['js']      = 'berita/berita_vitamin';
    $this->_template($data);
  }

  public function create()
  {
    $data['title']   = 'KSPPS Baytul Ikhtiar - Buat Berita Baik';
    $data['content'] = 'berita/form';
    $data['js']      = 'berita/berita_vitamin_form';
    $this->_template($data);
  }

  public function store()
  {
    $judul = $this->input->post('judul');
    $isi   = nl2br($this->input->post('isi'));
    $nik   = $this->session->userdata('nik');

    $table = 'berita';
    $data = [
      'judul'        => $judul,
      'isi'          => $isi,
      'kategori'  => 'Berita',
      'created_by'   => $nik,
      'created_date' => date('Y-m-d H:i:s'),
      'status'       => 0,
    ];
    $exec = $this->mdb->insert($table, $data);
    if($exec === TRUE){
      $return = [
        'code'  => 200,
        'flash' => 'Buat Berita Baik Berhasil'
      ];
    }else{
      $return = [
        'code'  => 500,
        'flash' => 'Terjadi kesalahan ketika menyimpan kedalam database'
      ];
    }

    echo json_encode($return);
  }

}

/* End of file Berita.php */
/* Location: ./application/controllers/backend/Berita.php */