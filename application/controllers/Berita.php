<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_core', 'mdb');
  }

  private function _template($data)
  {
    $this->load->view('frontend/template', $data);
  }

  public function index($offset = null)
  {
    $data['title'] = 'KSPPS Baytul Ikhtiar - Berita Baik';
    $data['content'] = 'berita';

    $id_kategori = '';
    $limit       = 2;
    $offset      = $this->uri->segment(2);
    $keyword     = '';

    $table = 'berita';

    $where = ['status' => '1', 'kategori' => 'Berita'];
    if($this->input->post('keyword') != NULL){
      $where = [
        'status' => '1',
        'kategori' => 'Berita',
        'judul ILIKE' => "%".$this->input->post('keyword')."%"
      ];
    }

    $arr_berita_all      = $this->mdb->get($table, null, null, $where, 'id', 'ASC');
    $total_data          = $arr_berita_all->num_rows();
    $data['arr_berita']  = $this->mdb->get($table, $limit, $offset, $where, 'id', 'ASC');

    // pagination limit
    $pagination['use_page_numbers']   = TRUE;
    $pagination['reuse_query_string'] = TRUE;
    $pagination['base_url']        = site_url('berita');
    $pagination['total_rows']      = $total_data;
    $pagination['full_tag_open']   = '<ul class="pagination pagination-lg">';
    $pagination['full_tag_close']  = '</ul>';
    $pagination['attributes']      = ['class' => 'page-link'];
    $pagination['first_tag_open']  = '<li class="page-item">';
    $pagination['first_tag_close'] = '</li>';
    $pagination['last_tag_open']  = '<li class="page-item">';
    $pagination['last_tag_close'] = '</li>';
    $pagination['cur_tag_open']    = '<li class="page-item active"><a class="page-link disabled text-white">';
    $pagination['cur_tag_close']   = '</a></li>';
    $pagination['num_tag_open']    = '<li class="page-item">';
    $pagination['num_tag_close']   = '</li>';
    $pagination['next_link']       = '<i class="fa fa-chevron-right"></i>';
    $pagination['next_tag_open']   = '<li class="page-item">';
    $pagination['next_tag_close']  = '</li>';
    $pagination['prev_link']       = '<i class="fa fa-chevron-left"></i>';
    $pagination['prev_tag_open']   = '<li class="page-item">';
    $pagination['prev_tag_close']  = '</li>';
    $pagination['per_page']        = $limit;
    $pagination['uri_segment']     = 2;
    $this->pagination->initialize($pagination);

    $this->_template($data);

  }

  public function read()
  {
    $id_berita   = $this->uri->segment(3);
    $table = 'berita';
    $where = ['status' => '1', 'kategori' => 'Berita', 'id' => $id_berita];

    $data['title'] = 'KSPPS Baytul Ikhtiar - Berita Baik';
    $data['arr_berita'] = $this->mdb->get($table, null, null, $where, 'id', 'ASC');
    $data['content'] = 'read';

    $this->_template($data);
  }

  public function profile()
  {
    $id_berita   = $this->uri->segment(3);
    $table = 'berita';
    $where = ['status' => '1', 'kategori' => 'Profile', 'id' => $id_berita];

    $data['title'] = 'KSPPS Baytul Ikhtiar - Profile Baik';
    $data['arr_berita'] = $this->mdb->get($table, null, null, $where, 'id', 'ASC');
    $data['content'] = 'read_profile';

    $this->_template($data);
  }

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */