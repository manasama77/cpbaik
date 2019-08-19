<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentangkami extends CI_Controller {

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
    //$this->sirkah();
    $data['title'] = 'KSPPS Baytul Ikhtiar - Tentang Kami';
    $data['content'] = 'tentangkami';
    $table = 'tentang';
    $data['tentang'] = $this->mdb->get($table, null, null, null, null, 'ASC');
    $this->_template($data);

  }

}

/* End of file Tentangkami.php */
/* Location: ./application/controllers/Tentangkami.php */