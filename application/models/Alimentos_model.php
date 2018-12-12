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
    public function deletarAlimentoDiario($id)
    {
        $this->db->where('id_usuario_alimento', $id);
        $this->db->delete('usuario_alimento');
        return true;
    }
    public function deletar($id)
    {
        $this->db->where('id_alimento', $id);
        $this->db->delete('alimento');
        return true;
    }
    public function diario($id_usuario, $data)
    {
        $query = $this->db->select('a.nome_alimento, a.qtd_proteina, a.qtd_gordura, a.qtd_carboidrato, ua.qtd_alimento, m.meta_proteina, m.meta_gordura, m.meta_carboidrato, ua.id_usuario_alimento')
            ->from('usuario_alimento ua')
            ->join('alimento a', 'a.id_alimento = ua.id_alimento')
            ->join('usuario u', 'u.id = ua.id_usuario')
            ->join('medidas m', 'u.id = m.id_usuario')
            ->where('u.id', $id_usuario)
            ->where('ua.data', $data)
            ->where('m.id_usuario', $id_usuario)
            ->get();
        return $query->result_array();
    }
    public function adicionar($ua)
    {
        $this->db->insert("usuario_alimento", $ua);
    }
    public function meta($id)
    {
        $query = $this->db->select('meta_proteina, meta_carboidrato, meta_gordura')
            ->from('medidas ')
            ->where('id_usuario', $id)
            ->get();
        return $query->result_array();
    }
    public function macrosIngeridos($data)
    {
        $query = $this->db->select('a.qtd_proteina, a.qtd_carboidrato, a.qtd_gordura, ua.qtd_alimento')
            ->from('usuario_alimento ua')
            ->join('alimento a', 'a.id_alimento = ua.id_alimento')
            ->where('ua.data', $data)
            ->get();
        return $query->result_array();
    }
} 