<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    private function _template($data)
    {
        $this->load->view('admin/template', $data);
    }

    public function index()
    {
        $data['title'] = 'KSPPS Baytul Ikhtiar - Dashboard';
        $data['content'] = 'dashboard/index';
        $data['js']      = 'dashboard/dashboard_vitamin';
        $this->_template($data);
    }

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/backend/Dashboard.php */