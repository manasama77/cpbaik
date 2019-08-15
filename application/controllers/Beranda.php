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
    //$this->sirkah();
    $data['title'] = 'KSPPS Baytul Ikhtiar - Beranda';
    $data['content'] = 'beranda';
    $table = 'berita';
    $table2 = 'kisah';
    $limit = null;
    $offset = null;
    $nik   = $this->session->userdata('nik');
    $where = [
      'status' => 1
    ];
    $data['arr_profile'] = $this->mdb->get($table, null, null, ['kategori' => 'Profile'], 'id', 'ASC');
    $data['arr_berita'] = $this->mdb->get($table, 6, 0, ['kategori' => 'Berita', 'status' => '1'], 'id', 'DESC');
    $data['arr_kisah'] = $this->mdb->get($table2, 2, 0, ['status' => '1'], 'id', 'DESC');
    $this->_template($data);

  }

  public function sirkah()
  {
    $url = 'http://app.baytulikhtiar.com/index.php/webservices/get_detail';

    $get_periode = date('d-m-Y');
    $exp_bulans = explode('-', $get_periode);
    $exp_tahuns = explode('-', $exp_bulans[2]);
    $get_bulan = $exp_bulans[1] - 1;
    $post_tanggal = $exp_tahuns[0].'-'.$get_bulan.'-'.'1';

    $fields['from_date'] = $post_tanggal;
    //url-ify the data for the POST
    $field_string = http_build_query($fields);

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($field_string));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $field_string);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

    //execute post
    $content = curl_exec($ch);
    //close connection
    curl_close($ch);
    $x = json_decode($content);

    echo json_encode($x);
    exit();

    //$get_par = ($ret->get_count_par_lancar / $ret->get_count_par_all) * 100;

    /*
    $data['get_count_par_lancar'] = $ret->get_count_par_lancar;
    $data['get_count_par_all'] = $ret->get_count_par_all;
    $data['get_count_anggota'] = $ret->get_count_anggota;
    $data['get_sum_saldo'] = $ret->get_sum_saldo;
    $data['get_pembiayaan'] = $ret->get_pembiayaan;
    return $data;
    */
  }

}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */