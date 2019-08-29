<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_core', 'mcore');
  }

  private function _template($data)
  {
    $this->load->view('login', $data);
  }

  public function index($tipe)
  {
    if($tipe == "anggota"){
      $data['title'] = 'KSPPS Baytul Ikhtiar Login Anggota';
    }elseif($tipe == "karyawan"){
      $data['title'] = 'KSPPS Baytul Ikhtiar Login Karyawan';
    }elseif($tipe == "admin"){
      $data['title'] = 'KSPPS Baytul Ikhtiar Login Admin';
    }
    $data['tipe'] = $tipe;
    $this->_template($data);
  }

  public function auth($tipe, $nik, $nama)
  {
    $nama = urldecode($nama);
    
    if($tipe == 'karyawan'){
      $this->session->set_userdata('nik', $nik);
      $this->session->set_userdata('nama', $nama);
      $count = $this->mcore->get('karyawan_log', null, null, [
        'nik' => $nik
      ]);

      if($count->num_rows() > 0)
      {
        $exec = $this->mcore->update('karyawan_log', 
          [
            'nik'        => $nik
          ], 
          [
            'last_login' => date('Y-m-d H:i:s')
          ]
        );
      }else{
        $exec = $this->mcore->insert('karyawan_log', [
          'nik'        => $nik,
          'nama'       => $nama,
          'last_login' => date('Y-m-d H:i:s'),
        ]);
      }

      if($exec)
      {
        redirect('backend/dashboard','refresh');
      }else{
        $this->session->unset_userdata([
          'nik'  => '',
          'nama' => '',
        ]);
        $this->session->set_userdata('status', 500);
        redirect('login/karyawan','refresh');
      }

    }

  }

  public function auth_admin()
  {
    $username = $this->input->post('username');
    $password = sha1($this->input->post('keypass'));
    $arr_admin = $this->mcore->get('admin', 1, 0, ['username' => $username, 'status' => '1', 'password' => $password], null, null);

    if($arr_admin->num_rows() == 1){
      $this->mcore->update('admin', ['username' => $username, 'status' => '1'], ['last_login' => date('Y-m-d H:i:s')]);
      $this->session->set_userdata([
        'id' => $arr_admin->row()->id,
        'username' => $username,
      ]);
      $return = [
        'code' => 200,
        'desc' => ''
      ];
    }else{
      $return = [
        'code' => 400,
        'desc' => '',
        'lq' => $this->db->last_query(),
      ];
    }

    echo json_encode($return);

  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(site_url('beranda'),'refresh');
  }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */