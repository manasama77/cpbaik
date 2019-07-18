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
    $data['title'] = 'KSPPS Baytul Ikhtiar - Login Karyawan';
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

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */