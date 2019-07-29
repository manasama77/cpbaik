<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_core', 'mdb');
  }

  private function _template($data)
  {
    if(empty($this->session->userdata('username'))){
      redirect('login/admin','refresh');
    }else{
      $this->load->view('admin/template', $data);
    }
  }

  public function index()
  {
    $data['title']   = 'KSPPS Baytul Ikhtiar - User Management';
    $data['content'] = 'admin/index';
    $data['js']      = 'admin/admin_vitamin';
    $table           = 'admin';
    $limit           = null;
    $offset          = null;
    $where           = null;
    $order           = 'id';
    $order_ori       = 'DESC';
    $a               = $this->uri->segment(4) - 1;
    if($a < 0){
      $a = 0;
    }

    $jumlah_data = $this->mdb->get($table, $limit, $offset, $where, $order, $order_ori)->num_rows();
    $this->load->library('pagination');
    $config['base_url']           = site_url('admin/admin/index');
    $config['total_rows']         = $jumlah_data;
    $config['per_page']           = 5;
    $config['use_page_numbers']   = TRUE;
    $config['reuse_query_string'] = TRUE;
    
    $config['full_tag_open']      = '<ul class="pagination">';
    $config['full_tag_close']     = '</ul>';
    $config['attributes']         = ['class' => 'page-link'];
    $config['first_link']         = false;
    $config['last_link']          = false;
    $config['first_tag_open']     = '<li class="page-item">';
    $config['first_tag_close']    = '</li>';
    $config['prev_link']          = '&laquo';
    $config['prev_tag_open']      = '<li class="page-item">';
    $config['prev_tag_close']     = '</li>';
    $config['next_link']          = '&raquo';
    $config['next_tag_open']      = '<li class="page-item">';
    $config['next_tag_close']     = '</li>';
    $config['last_tag_open']      = '<li class="page-item">';
    $config['last_tag_close']     = '</li>';
    $config['cur_tag_open']       = '<li class="page-item active"><a href="#" class="page-link">';
    $config['cur_tag_close']      = '<span class="sr-only">(current)</span></a></li>';
    $config['num_tag_open']       = '<li class="page-item">';
    $config['num_tag_close']      = '</li>';
    $from                         = $a * $config['per_page'];
    $this->pagination->initialize($config);

    $data['arr_user'] = $this->mdb->get($table, $config['per_page'], $from, $where, $order, $order_ori);

    $this->_template($data);
  }

  public function create()
  {
    $data['title']   = 'KSPPS Baytul Ikhtiar - Buat User Baru';
    $data['content'] = 'admin/form';
    $data['js']      = 'admin/admin_vitamin_form';
    $this->_template($data);
  }

  public function cek_username()
  {
    $username = strtolower($this->input->get('username'));

    $exec = $this->mdb->get('admin', null, null, ['username' => $username], null, null);

    if($exec->num_rows() == 1){
      $return = [
        'code' => 400,
        'description' => 'Username Telah Terdaftar' 
      ];
    }else{
      $return = [
        'code' => 200,
        'description' => 'Username Dapat Digunakan' 
      ];
    }

    echo json_encode($return);

  }

  public function store()
  {
    $username = $this->input->post('username');
    $password = strtolower($this->input->post('keypass'));
    $nik   = $this->session->userdata('id');
    $nama   = $this->session->userdata('username');

    $password = password_hash($password, PASSWORD_DEFAULT);

    $table = 'admin';
    $data = [
      'username'     => $username,
      'password'     => $password,
      'status'       => 1,
      'created_date' => date('Y-m-d H:i:s'),
      'creator_id'   => $nik,
      'creator_name' => $nama
    ];
    $exec = $this->mdb->insert($table, $data);
    if($exec === TRUE){
      $return = [
        'code'  => 200,
        'flash' => 'Buat User Baru Berhasil'
      ];
    }else{
      $return = [
        'code'  => 500,
        'flash' => 'Terjadi kesalahan ketika menyimpan kedalam database'
      ];
    }

    echo json_encode($return);
  }

  public function destroy()
  {
    $id = $this->input->post('id');
    $username = $this->input->post('username');

    $table = 'admin';
    $limit = null;
    $offset = null;
    $where = [
      'id' => $id
    ];
    $order = null;
    $order_ori = null;
    $count = $this->mdb->get($table, $limit, $offset, $where, $order, $order_ori)->num_rows();

    if($count == 1){
      $exec = $this->mdb->destroy($table, $where);

      if($exec === true){
        $return = [
          'code' => 200,
          'id' => $id,
          'username' => $username,
        ];
      }else{
        $return = [
          'code' => 500,
          'id' => $id,
          'username' => $username,
        ];
      }

    }else{
      $return = [
        'code' => 404,
        'id' => $id,
        'username' => $username,
      ];
    }

    echo json_encode($return);
  }

  public function reset()
  {
    $id = $this->input->post('id');
    $pass = $this->input->post('pass');

    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $exec = $this->mdb->update('admin', ['id' => $id], ['password' => $pass]);
    if($exec){
      $this->session->set_flashdata('status', 'Reset Password Berhasil');
      redirect('admin/user/index','refresh');
    }else{
      $this->session->set_flashdata('status', 'Reset Password Gagal Silahkan Coba Kembali');
      redirect('admin/user/index','refresh');
    }

  }

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */