<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alimentos extends CI_Controller
{

	public function index()
	{
		$this->load->model("alimentos_model");
		$lista = $this->alimentos_model->buscaTodos();
		$dados = array("alimentos" => $lista);
		$this->load->view('alimentos/index', $dados);
	}
	public function formulario()
	{
		$this->load->view("alimentos/formulario");
	}
	public function novo(){
		$this->form_validation->set_rules("nome","nome","required");
		$this->form_validation->set_rules("proteina","proteina","required");
		$this->form_validation->set_rules("gordura","gordura","required");
		$this->form_validation->set_rules("carboidrato","carboidrato","required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
		$sucesso=$this->form_validation->run();
		if($sucesso){
			$alimento = array(
				"nome_alimento" => $this->input->post("nome"),
				"qtd_proteina" => $this->input->post("proteina"),
				"qtd_gordura" => $this->input->post("gordura"),
				"qtd_carboidrato" => $this->input->post("carboidrato"),
			);
			$this->load->model("alimentos_model");
			$this->alimentos_model->salvar($alimento);
			$this->session->set_flashdata("success", "Alimento cadastrado com sucesso");
			redirect('/');
		}else{
			$this->load->view("alimentos/formulario");
		}

	
	}
}
