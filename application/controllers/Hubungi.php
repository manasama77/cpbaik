<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hubungi extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_core', 'mdb');
  }

  private function _template($data)
  {
    $this->load->view('frontend/template', $data);
  }

  public function index()
  {
    $this->load->helper(array('form'));
    $this->load->library('form_validation');

    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('pesan', 'Pesan', 'required');

    if($this->form_validation->run() != FALSE){
      $nama  = $this->input->post('nama');
      $email = $this->input->post('email');
      $pesan = $this->input->post('pesan');

      $table = 'bukutamu';
      $data = [
        'nama' => $nama,
        'email' => $email,
        'pesan' => $email,
        'created_date' => date('Y-m-d H:i:s')
      ];
      $exec = $this->mdb->insert($table, $data);

      if($exec){
        $this->session->set_flashdata('status', 'ok');
        redirect('/hubungi');
      }else{
        $this->session->set_flashdata('status', 'no');
        redirect('/hubungi');
      }
    }


    $data['title']   = 'KSPPS Baytul Ikhtiar - Hubungi Kami';
    $data['content'] = 'hubungikami';
    $this->_template($data);

  }

  public function store()
  {

  }

}

/* End of file Hubungi.php */
/* Location: ./application/controllers/Hubungi.php */