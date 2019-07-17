<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    private function _template($data)
    {
        $this->load->view('backend/template', $data);
    }

    public function index()
    {
        $data['title'] = 'KSPPS Baytul Ikhtiar - Dashboard';
        $data['content'] = 'dashboard/index';
        $data['js'] = 'dashboard.js';
        $this->_template($data);
    }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/backend/Dashboard.php */