<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
    $data['title'] = 'KSPPS Baytul Ikhtiar - Dashboard';
    $data['content'] = 'dashboard/index';
    $data['js']      = 'dashboard/dashboard_vitamin';
    $data['berita'] = $this->mdb->get('berita', null, null, ['status' => '1', 'kategori' => 'Berita'], null, null)->num_rows();
    $data['kisah'] = $this->mdb->get('kisah', null, null, ['status' => '1'], null, null)->num_rows();
    $this->_template($data);
  }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/backend/Dashboard.php */