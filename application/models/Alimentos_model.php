<?php
class Alimentos_model extends CI_Model
{

    public function buscaTodos()
    {
        return $this->db->get("alimento")->result_array();
    }
    public function salvar($alimento)
    {
        $this->db->insert("alimento", $alimento);
    }
    public function retorna($id)
    {
        return $this->db->get_where("alimento", array(
            "id_alimento" => $id
        ))->row_array();
    }
    public function deletar_produto($id)
    {
        $this->db->where('id_alimento', $id);
        $this->db->delete('alimento');
        return true;
    }
    public function diario($id_usuario, $data)
    {
        $query = $this->db->select('a.nome_alimento, ua.qtd_alimento')
            ->from('usuario_alimento ua')
            ->join('alimento a', 'a.id_alimento = ua.id_alimento')
            ->join('usuario u', 'u.id = ua.id_usuario')
            ->where('u.id', $id_usuario)
            ->where('ua.data',$data)
            ->get();
        return $query->result_array();

    }
    public function adicionar($ua){
        $this->db->insert("usuario_alimento",$ua);

    }
} 