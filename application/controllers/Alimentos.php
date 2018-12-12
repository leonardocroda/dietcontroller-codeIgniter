<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alimentos extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata("usuario_logado")) {
			$this->diario();
		} else {
			$this->load->view("templates/header");
			$this->load->view("alimentos/index");
		}

	}
	public function formulario()
	{
		$this->load->view("templates/header");
		$this->load->view("templates/nav-top");
		$this->load->view("alimentos/formulario");
		$this->load->view("templates/js");
	}
	public function novo()
	{
		$this->form_validation->set_rules("nome", "nome", "required");
		$this->form_validation->set_rules("proteina", "proteina", "required");
		$this->form_validation->set_rules("gordura", "gordura", "required");
		$this->form_validation->set_rules("carboidrato", "carboidrato", "required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		$sucesso = $this->form_validation->run();
		if ($sucesso) {
			$alimento = array(
				"nome_alimento" => $this->input->post("nome"),
				"qtd_proteina" => $this->input->post("proteina"),
				"qtd_gordura" => $this->input->post("gordura"),
				"qtd_carboidrato" => $this->input->post("carboidrato"),
			);
			$this->load->model("alimentos_model");
			$this->alimentos_model->salvar($alimento);
			$this->session->set_flashdata("success", "Alimento cadastrado com sucesso");
			$this->add();
		} else {
			$this->load->view("templates/header");
			$this->load->view("templates/nav-top");
			$this->load->view("alimentos/formulario");
			$this->load->view("templates/footer");
			$this->load->view("templates/js");
		}
	}
	public function detalhes()
	{
		$id = $this->input->get("id_alimento");
		$this->load->model("alimentos_model");
		$alimento = $this->alimentos_model->retorna($id);
		$dados = array("alimento" => $alimento);
		$this->load->view("templates/header");
		$this->load->view("templates/nav-top");
		$this->load->view("alimentos/detalhes", $dados);
		$this->load->view("templates/js");
	}
	public function deleteDiario()
	{
		$id=$this->input->get("id_usuario_alimento");
		$this->load->model("alimentos_model");
		$this->alimentos_model->deletarAlimentoDiario($id);
		redirect('/');
	}
	public function delete()
	{
		$id=$this->input->get("id_alimento");
		$this->load->model("alimentos_model");
		$this->alimentos_model->deletar($id);
		$this->add();
	}
	public function edit($id)
	{

	}
	public function diario()
	{
		$usuario = $this->session->userdata('usuario_logado');
		$id_usuario = $usuario['id'];
		if ($this->input->post("data") == null) {
			$data = date("Y-m-d");
		} else {
			$data = $this->input->post("data");
		}
		$this->load->model("alimentos_model");
		$alimento = $this->alimentos_model->diario($id_usuario, $data);//adiciona a ingestão do alimento ao banco
		$dados = array("alimentos" => $alimento);//grava num array pra enviar pra view

		$this->load->view('templates/header');
		$this->load->view('templates/nav-top');
		$this->load->view('alimentos/diario', $dados);
		$this->load->view('templates/footer');
		$this->load->view('templates/js');

	}
	
	public function getAll()
	{
		$this->load->model("alimentos_model");
		$lista = $this->alimentos_model->buscaTodos();
		$dados = array("alimentos" => $lista);
		$this->load->view('templates/header', $dados);
		//  $this->load->view('templates/nav-top', $dados);
		$this->load->view('alimentos/index', $dados);
		$this->load->view('templates/footer', $dados);
		$this->load->view('templates/js', $dados);
	}
	public function add()
	{
		$this->load->model("alimentos_model");
		$lista = $this->alimentos_model->buscaTodos();
		$dados = array("alimentos" => $lista);
		$this->load->view('templates/header');
		$this->load->view('templates/nav-top');
		$this->load->view('alimentos/adicionar', $dados);
		$this->load->view('templates/js');
	}
	public function adicionar()
	{
		$usuario = $this->session->userdata('usuario_logado');
		$id_usuario = $usuario['id'];
		$id_alimento = $this->input->get("id_alimento");
		$quantidade = $this->input->post("quantidade");

		$ua = array(
			"id_alimento" => $id_alimento,
			"id_usuario" => $id_usuario,
			"qtd_alimento" => $quantidade,
			"data" => date("Y-m-d")
		);
		$this->load->model("alimentos_model");
		$alimento = $this->alimentos_model->adicionar($ua);
		$this->diario();
	}
	public function ingerido()
	{
	

		
	}
	public function restante($ua)
	{

	}
}
