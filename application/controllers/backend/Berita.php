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
    $table = 'berita';
    $limit = null;
    $offset = null;
    $nik   = $this->session->userdata('nik');
    $where = [
      'created_nik' => $nik
    ];
    $order = 'id';
    $order_ori = 'DESC';
    $data['arr_berita'] = $this->mdb->get($table, $limit, $offset, $where, $order, $order_ori);
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
    $nama   = $this->session->userdata('nama');

    $table = 'berita';
    $data = [
      'judul'        => $judul,
      'isi'          => $isi,
      'kategori'     => 'Berita',
      'created_nik'  => $nik,
      'created_name' => $nama,
      'created_date' => date('Y-m-d H:i:s'),
      'status'       => 0,
    ];
    $exec = $this->mdb->insert_berita($table, $data);
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

  public function destroy()
  {
    $id = $this->input->post('id');
    $judul = $this->input->post('judul');

    $table = 'berita';
    $limit = null;
    $offset = null;
    $where = [
      'id' => $id
    ];
    $order = null;
    $order_ori = null;
    $count = $this->mdb->get($table, $limit, $offset, $where, $order, $order_ori)->num_rows();

    if($count == 1){
      $exec = $this->mdb->destroy($table, $where);

      if($exec === true){
        $return = [
          'code' => 200,
          'id' => $id,
          'judul' => $judul,
        ];
      }else{
        $return = [
          'code' => 500,
          'id' => $id,
          'judul' => $judul,
        ];
      }

    }else{
      $return = [
        'code' => 404,
        'id' => $id,
        'judul' => $judul,
      ];
    }

    echo json_encode($return);
  }

}

/* End of file Berita.php */
/* Location: ./application/controllers/backend/Berita.php */