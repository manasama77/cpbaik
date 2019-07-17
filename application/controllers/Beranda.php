<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

    private function _template($data)
    {
        $this->load->view('frontend/template', $data);
    }

    public function index()
    {
        $data['title'] = 'KSPPS Baytul Ikhtiar - Beranda';
        $data['content'] = 'beranda';
        $this->_template($data);
        
    }

}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */