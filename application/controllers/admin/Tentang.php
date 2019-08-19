<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_core', 'mdb');
  }

  private function _template($data)
  {
    if(empty($this->session->userdata('username'))){
      redirect('login/admin','refresh');
    }else{
      $this->load->view('admin/template', $data);
    }
  }

  public function index()
  {
    $data['title']   = 'KSPPS Baytul Ikhtiar - Tentang Kami';
    $data['content'] = 'tentang/form';
    $data['js']      = 'tentang/tentang_vitamin_form';
    $table           = 'tentang';

    $data['arr_tentang'] = $this->mdb->get($table, null, null, null, null, null);

    $this->_template($data);
  }

  public function store()
  {
    $judul = $this->input->post('judul');
    $isi1  = nl2br($this->input->post('isi1'));
    $isi2  = nl2br($this->input->post('isi2'));

    $table = 'tentang';
    $data = [
      'judul' => $judul,
      'isi1'  => $isi1,
      'isi2'  => $isi2
    ];
    $exec = $this->mdb->update_tentang($table, $data);
    if($exec === TRUE){
      $return = [
        'code'  => 200,
        'flash' => 'Update Tentang Kami Berhasil'
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
    $data['title']   = 'KSPPS Baytul Ikhtiar - Edit Profile Baik';
    $data['content'] = 'profile/form_edit';
    $data['js']      = 'profile/profile_vitamin_form_edit';
    $this->_template($data);
  }

  public function update()
  {
    $id = $this->input->post('id');
    $judul = $this->input->post('judul');
    $isi   = nl2br($this->input->post('isi'));
    $nik   = $this->session->userdata('id');
    $nama   = $this->session->userdata('username');

    $table = 'berita';
    $data = [
      'judul'        => $judul,
      'isi'          => $isi,
      'kategori'     => 'Profile',
      'created_nik'  => $nik,
      'created_name' => $nama,
      'created_date' => date('Y-m-d H:i:s'),
      'status'       => 0,
    ];
    $exec = $this->mdb->update_berita($table, $data, $id);
    if($exec === TRUE){
      $return = [
        'code'  => 200,
        'flash' => 'Edit Profile Baik Berhasil'
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

}

/* End of file Berita.php */
/* Location: ./application/controllers/backend/Berita.php */