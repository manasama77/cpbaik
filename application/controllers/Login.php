<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

    public function auth()
    {
        $this->session->set_userdata('nik', '518.0000.0000');
        $this->session->set_userdata('nama', 'Adam PM');
        redirect('backend/dashboard','refresh');
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */