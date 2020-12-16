<?php
class Db_model extends CI_Model {
    
    public function __construct(){
         $this->load->database();
         
    }
    public function get_data(){
        $query = $this->db->get('mytable'); 
        return $query->result_array();
    }

    public function create($headline, $content, $name){
      $this->db->set('headline', $headline);
      $this->db->set('content', $content);
      $this->db->set('name', $name);
      $this->db->insert('mytable');
      return $this->db->insert_id();
      }

    public function delete($id){
        $this->db->where('id', intval($id));
        $this->db->delete('myTable');
    }

    public function update($id, $headline, $content, $name)
    {
        $this->db->set('headline', $headline);
        $this->db->set('content', $content);
        $this->db->set('name', $name);
        $this->db->where('ID', intval($id));
        $this->db->update('mytable');
    }

}