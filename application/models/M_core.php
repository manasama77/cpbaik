<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_core extends CI_Model {

  public function get($table, $limit = null, $offset = null, $where = null)
  {
    if($where != null)
    {
      $this->db->where($where);
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

  public function update($table, $where, $data)
  {
    $this->db->trans_start();
    $this->db->where($where);
    $this->db->update($table, $data);
    $this->db->trans_complete();
    return $this->db->trans_status();
  }
  

}

/* End of file M_core.php */
/* Location: ./application/models/M_core.php */