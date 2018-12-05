<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function autenticar()
	{
		 $this->load->model("usuarios_model");
		 $email = $this->input->post("email");
		 $senha = md5($this->input->post("senha"));
		 $usuario = $this->usuarios_model->logarUsuarios($email, $senha);
		 if($usuario){
			$this->session->set_userdata("usuario_logado",$usuario);
			$this->session->set_flashdata("success","logado com sucesso");
		 }
		 else{
			$this->session->set_flashdata("danger","usuario ou senha inválidos");
		 }
		 redirect('/');
	}
	public function logout(){
		$this->session->unset_userdata("usuario_logado");
		$this->session->set_flashdata("success","Deslogado com sucesso");
		redirect('/');
	}
}
