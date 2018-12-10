<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alimentos extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata("usuario_logado")) {
			$this->diario();
		} else {
			$this->getAll();
		}

	}
	public function formulario()
	{
		$this->load->view("templates/header");
		$this->load->view("templates/nav-top");
		$this->load->view("alimentos/formulario");
		$this->load->view("templates/footer");
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
			redirect('/');
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
		$this->load->view("templates/footer");
		$this->load->view("templates/js");
	}
	public function delete($id)
	{
		$this->load->model("alimentos_model");
		$this->alimentos_model->deletar_produto($id);
		redirect('/');
	}
	public function edit($id)
	{

	}
	public function diario()
	{
		$usuario = $this->session->userdata('usuario_logado');
		$id_usuario = $usuario['id'];
		$data = $this->input->post("data");
		$this->load->model("alimentos_model");
		$alimento = $this->alimentos_model->diario($id_usuario, $data);
		$dados = array("alimentos" => $alimento);
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
		$this->load->view('templates/footer');
		$this->load->view('templates/js');
	}
	public function adicionar()
	{
		$usuario = $this->session->userdata('usuario_logado');
		$id_usuario = $usuario['id'];
		$id_alimento=$this->input->get("id_alimento");
		$ua=array(
			"id_alimento"=>$id_alimento,
			"id_usuario"=>$id_usuario,
			"qtd_alimento"=>$this->input->post("quantidade"),
			"data"=>date("Y-m-d")
		);
		$this->load->model("alimentos_model");
		$alimento = $this->alimentos_model->adicionar($ua);
		$dados = array("alimento" => $alimento);
		$this->load->view("templates/header");
		$this->load->view("templates/nav-top");
		$this->load->view("usuarios/novo");
		$this->load->view("templates/footer");
		$this->load->view("templates/js");
	}
}
