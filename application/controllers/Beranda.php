<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

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
        $data['title'] = 'KSPPS Baytul Ikhtiar - Beranda';
        $data['content'] = 'beranda';
        $table = 'berita';
        $limit = null;
        $offset = null;
        $nik   = $this->session->userdata('nik');
        $where = [
          'status' => 1
        ];
        $data['arr_berita'] = $this->mdb->get($table, $limit, $offset, $where);
        $this->_template($data);
        
    }

}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */