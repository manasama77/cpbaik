<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_core extends CI_Model {

  public function get($table, $limit = null, $offset = null, $where = null, $order = null, $order_ori = 'ASC')
  {
    // TEMPLATE get($table, $limit, $offset, $where, $order, $order_ori)
    if($where != null)
    {
      $this->db->where($where);
    }

    if($order != null)
    {
      $this->db->order_by($order, $order_ori);
    }

    return $this->db->get($table, $limit, $offset);
  }

  public function insert($table, $data)
  {
    $this->db->trans_start();
    $this->db->insert($table, $data);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  public function insert_berita($table, $data)
  {
    $this->db->trans_start();
    $image = $this->_uploadImage();
    $data['gambar'] = $image;
    $this->db->insert($table, $data);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  public function update($table, $where, $data)
  {
    $this->db->trans_start();
    $this->db->where($where);
    $this->db->update($table, $data);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  public function update_berita($table, $data, $id)
  {
    $this->db->trans_start();
    if(empty($_FILES['gambar']['name'])){
      $image = $this->input->post('prev_gambar');
    }else{
      $image = $this->_uploadImage();
    }
    $data['gambar'] = $image;
    $this->db->where('id', $id);
    $this->db->update($table, $data);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  public function destroy($table, $where = null)
  {
    $this->db->trans_start();
    $this->db->delete($table, $where);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }

  private function _uploadImage()
  {
    $config['upload_path']   = 'assets/img/berita';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['overwrite']     = TRUE;
    $config['max_size']      = 100024;
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
        return $this->upload->data("file_name");
    }
    
    return "default-image.jpg";
  }
  

}

/* End of file M_core.php */
/* Location: ./application/models/M_core.php */