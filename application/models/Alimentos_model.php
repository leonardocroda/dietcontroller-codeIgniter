<?php
class Alimentos_model extends CI_Model{

    public function buscaTodos(){
        return $this->db->get("alimento")->result_array();
    }

}