<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kisah extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_core', 'mdb');
  }

  private function _template($data)
  {
    if($this->session->userdata('username') == NULL){
      redirect('login/admin');
    }else{
      $this->load->view('admin/template', $data);
    }
  }

  public function index()
  {
    $data['title']   = 'KSPPS Baytul Ikhtiar - List Kisah Baik';
    $data['content'] = 'kisah/index';
    $data['js']      = 'kisah/kisah_vitamin';
    $table           = 'kisah';
    $limit           = null;
    $offset          = null;
    $where           = null;
    $order           = 'id';
    $order_ori       = 'DESC';
    $a               = $this->uri->segment(4) - 1;
    if($a < 0){
      $a = 0;
    }

    $jumlah_data = $this->mdb->get($table, $limit, $offset, $where, $order, $order_ori)->num_rows();
    $this->load->library('pagination');
    $config['base_url']           = site_url('admin/kisah/index');
    $config['total_rows']         = $jumlah_data;
    $config['per_page']           = 5;
    $config['use_page_numbers']   = TRUE;
    $config['reuse_query_string'] = TRUE;
    
    $config['full_tag_open']      = '<ul class="pagination">';
    $config['full_tag_close']     = '</ul>';
    $config['attributes']         = ['class' => 'page-link'];
    $config['first_link']         = false;
    $config['last_link']          = false;
    $config['first_tag_open']     = '<li class="page-item">';
    $config['first_tag_close']    = '</li>';
    $config['prev_link']          = '&laquo';
    $config['prev_tag_open']      = '<li class="page-item">';
    $config['prev_tag_close']     = '</li>';
    $config['next_link']          = '&raquo';
    $config['next_tag_open']      = '<li class="page-item">';
    $config['next_tag_close']     = '</li>';
    $config['last_tag_open']      = '<li class="page-item">';
    $config['last_tag_close']     = '</li>';
    $config['cur_tag_open']       = '<li class="page-item active"><a href="#" class="page-link">';
    $config['cur_tag_close']      = '<span class="sr-only">(current)</span></a></li>';
    $config['num_tag_open']       = '<li class="page-item">';
    $config['num_tag_close']      = '</li>';
    $from                         = $a * $config['per_page'];
    $this->pagination->initialize($config);

    $data['arr_berita'] = $this->mdb->get($table, $config['per_page'], $from, $where, $order, $order_ori);

    $this->_template($data);
  }

  public function create()
  {
    $data['title']   = 'KSPPS Baytul Ikhtiar - Buat Kisah Baik';
    $data['content'] = 'kisah/form';
    $data['js']      = 'kisah/kisah_vitamin_form';
    $this->_template($data);
  }

  public function store()
  {
    $judul = $this->input->post('judul');
    $video = $this->input->post('video');
    $nik   = $this->session->userdata('id');
    $nama   = $this->session->userdata('username');

    $table = 'kisah';
    $data = [
      'judul'        => $judul,
      'video'        => $video,
      'created_nik'  => $nik,
      'created_name' => $nama,
      'created_date' => date('Y-m-d H:i:s'),
      'status'       => 0,
    ];
    $exec = $this->mdb->insert($table, $data);
    if($exec === TRUE){
      $return = [
        'code'  => 200,
        'flash' => 'Buat Kisah Baik Berhasil'
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

    $table = 'kisah';
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

  public function verify()
  {
    $id = $this->input->post('id');
    $judul = $this->input->post('judul');
    $status = $this->input->post('status');

    if($status == '0'){
      $exec = $this->mdb->update('kisah', ['id' => $id], ['status' => '1']);
    }else{
      $exec = $this->mdb->update('kisah', ['id' => $id], ['status' => '0']);
    }

    if($exec === true){
      $return = ['code' => 200];
    }else{
      $return = [
        'code' => 500,
        'description' => 'proses simpan data gagal, silahkan coba kembali'
      ];
    }

    echo json_encode($return);
  }

}

/* End of file Berita.php */
/* Location: ./application/controllers/backend/Berita.php */