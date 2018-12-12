<?php
class Usuarios_model extends CI_Model{
    public function salvar($usuario){
        $this->db->insert("usuario",$usuario);
    } 
    public function logarUsuarios($email, $senha){
        $this->db->where("email",$email);
        $this->db->where("senha",$senha);
        $usuario = $this->db->get("usuario")->row_array();
        return $usuario;
    }
    public function adicionarMedidas($medidas){
        $this->db->insert("medidas",$medidas);
    }
} 