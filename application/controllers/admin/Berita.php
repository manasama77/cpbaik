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
    if($this->session->userdata('username') == NULL){
      redirect('login/admin');
    }else{
      $this->load->view('admin/template', $data);
    }
  }

  public function index()
  {
    $data['title']   = 'KSPPS Baytul Ikhtiar - List Berita Baik';
    $data['content'] = 'berita/index';
    $data['js']      = 'berita/berita_vitamin';
    $table           = 'berita';
    $limit           = null;
    $offset          = null;
    $where           = ['kategori' => 'Berita'];
    $order           = 'id';
    $order_ori       = 'DESC';
    $a               = $this->uri->segment(4) - 1;
    if($a < 0){
      $a = 0;
    }

    $jumlah_data = $this->mdb->get($table, $limit, $offset, $where, $order, $order_ori)->num_rows();
    $this->load->library('pagination');
    $config['base_url']           = site_url('admin/berita/index');
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
    $data['title']   = 'KSPPS Baytul Ikhtiar - Buat Berita Baik';
    $data['content'] = 'berita/form';
    $data['js']      = 'berita/berita_vitamin_form';
    $this->_template($data);
  }

  public function store()
  {
    $judul = $this->input->post('judul');
    $sekilas = $this->input->post('sekilas');
    $isi   = nl2br($this->input->post('isi'));
    $nik   = $this->session->userdata('id');
    $nama   = $this->session->userdata('username');

    $table = 'berita';
    $data = [
      'judul'        => $judul,
      'isi'          => $isi,
      'kategori'     => 'Berita',
      'created_nik'  => $nik,
      'created_name' => $nama,
      'created_date' => date('Y-m-d H:i:s'),
      'status'       => 0,
      'sekilas'      => $sekilas,
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

  public function verify()
  {
    $id = $this->input->post('id');
    $judul = $this->input->post('judul');
    $status = $this->input->post('status');

    if($status == '0'){
      $exec = $this->mdb->update('berita', ['id' => $id], ['status' => '1']);
    }else{
      $exec = $this->mdb->update('berita', ['id' => $id], ['status' => '0']);
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

  public function edit($id)
  {
    $data['arr'] = $this->mdb->get('berita', null, null, ['id' => $id], null, null);
    $data['title']   = 'KSPPS Baytul Ikhtiar - Edit Berita Baik';
    $data['content'] = 'berita/form_edit';
    $data['js']      = 'berita/berita_vitamin_form_edit';
    $this->_template($data);
  }

  public function update()
  {
    $id    = $this->input->post('id');
    $judul = $this->input->post('judul');
    $isi   = nl2br($this->input->post('isi'));
    $nik   = $this->session->userdata('id');
    $nama  = $this->session->userdata('username');

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
    $exec = $this->mdb->update_berita($table, $data, $id);
    if($exec === TRUE){
      $return = [
        'code'  => 200,
        'flash' => 'Edit Berita Baik Berhasil'
      ];
    }else{
      $return = [
        'code'  => 500,
        'flash' => 'Terjadi kesalahan ketika menyimpan kedalam database'
      ];
    }

    echo json_encode($return);
  }

  public function upload()
  {
    if(isset($_FILES["file"]["name"]))  
    {
      $config['upload_path']   = 'assets/img/berita';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['overwrite']     = TRUE;
      $config['max_size']      = 100024;
      $config['encrypt_name']  = TRUE;
      $this->load->library('upload', $config);  

      if(!$this->upload->do_upload('file'))  
      {  
        $this->upload->display_errors();  
        return FALSE;
      }else{  
        $data = $this->upload->data();                 
        echo base_url().'asset/img/berita'.$this->upload->data("file_name");
      }  
    } 
  }

  public function lihat()
  {
    if($this->session->userdata('username') == NULL){
      redirect('login/admin');
    }else{
      $id = $this->input->get('id');

      $table = 'berita';
      $limit = NULL;
      $offset = NULL;
      $where = ['id' => $id];
      $order = NULL;
      $order_ori = 'ASC';
      $exec = $this->mdb->get($table, $limit, $offset, $where, $order, $order_ori);

      if($exec->num_rows() == '0'){
        echo json_encode([
          'code'        => '400',
          'description' => 'Berita Tidak Ditemukan'
        ]);
        exit();
      }else{
        $judul   = $exec->row()->judul;
        $sekilas = $exec->row()->sekilas;
        $isi     = $exec->row()->isi;

        $content = '';

        $content .= '<div class="row">';
        $content .= '<div class="col-2"><b>Judul:</b></div>';
        $content .= '<div class="col-10">';
        $content .= $judul;
        $content .= '</div>';
        $content .= '</div>';

        $content .= '<div class="row">';
        $content .= '<div class="col-2"><b>Sekilas:</b></div>';
        $content .= '<div class="col-10">';
        $content .= $sekilas;
        $content .= '</div>';
        $content .= '</div>';

        $content .= '<div class="row">';
        $content .= '<div class="col-12"><b>Isi Berita:</b></div>';
        $content .= '<div class="col-12">';
        $content .= $isi;
        $content .= '</div>';
        $content .= '</div>';

        $data = [
          'code'        => '200',
          'description' => 'Proses Ambil Berita Berhasil',
          'data'        => $content
        ];

        echo json_encode($data);
        exit();
      }

    }
  }

}

/* End of file Berita.php */
/* Location: ./application/controllers/backend/Berita.php */