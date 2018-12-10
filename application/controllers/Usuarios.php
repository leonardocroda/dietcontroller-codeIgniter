<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	public function novo()
	{
		// validações, checa se todos os campos obrigatórios foram preenchidos e se a senha tem 8 caracteres
		$this->form_validation->set_rules("nome", "nome", "required");
		$this->form_validation->set_rules("email", "email", "required");
		$this->form_validation->set_rules("senha", "senha", "required|min_length[8]");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		$sucesso = $this->form_validation->run(); //roda as regras de  validação
		if ($sucesso) {//caso os campos forem validados:
			$usuario = array(
				"nome" => $this->input->post("nome"),//insere o valor do input de id nome na coluna nome da tabela usuarios do banco de dados
				"email" => $this->input->post("email"),//insere o valor do input de id email na coluna email da tabela usuarios do banco de dados
				"senha" => md5($this->input->post("senha"))//insere o valor do input de id senha na coluna senha da tabela usuarios do banco de dados
			);

			$this->load->model("usuarios_model"); //carrega o model usuarios_model
			$this->usuarios_model->salvar($usuario); //chama a funçao salvar do model usuarios_model enviando como parametro o array com as inormações do usuário fornecidas acima
			$this->load->view('usuarios/novo');//carrega a view novo, que é só um html simples com uma mensagem de sucesso
		} else {
			$this->load->view('templates/header');//caso os campos não tenham sido validados recarrega a pagina index
			$this->load->view('templates/nav-top');
			$this->load->view('alimentos/index');
			$this->load->view('templates/footer');
			$this->load->view('templates/js');
	}
}
}
