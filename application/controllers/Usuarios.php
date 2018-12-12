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
			$this->logarRecente($usuario['email'],$usuario['senha']);
			$this->load->view('templates/header');
			$this->load->view('usuarios/medidas');
			
		} else {
			$this->load->view('templates/header');//caso os campos não tenham sido validados recarrega a pagina index
			$this->load->view('templates/nav-top');
			$this->load->view('alimentos/index');
			$this->load->view('templates/footer');
			$this->load->view('templates/js');
		}
	}
	public function logarRecente($email,$senha){
		$this->load->model("usuarios_model");
		$usuario = $this->usuarios_model->logarUsuarios($email, $senha);
		if($usuario){
		   $this->session->set_userdata("usuario_logado",$usuario);
		   $this->session->set_flashdata("success","logado com sucesso");
		}
	}
	public function medidas(){
		$usuario = $this->session->userdata('usuario_logado');
		$id = $usuario['id'];
		$peso=$this->input->post("peso");
		$altura=$this->input->post("altura");
		$idade=$this->input->post("idade");
		$sexo='m';
		$tmb=$this->calculaTMB($peso,$altura,$sexo,$idade);
		$indice=1.2;
		$gcd=$this->calculaGCD($tmb,$indice);
		$prot=$peso*2;
		$gord=$peso;
		$carb= ($gcd-($prot*4+$gord*9))/4;
		$medidas=array(
			"id_usuario"=>$id,
			"peso"=>$peso,
			"altura"=>$altura,
			"sexo"=>$sexo,
			"idade"=>$idade,
			"gcd"=>$gcd,
			"tmb"=>$tmb,
			"meta_carboidrato"=>$carb,
			"meta_proteina"=>$prot,
			"meta_gordura"=>$gord,
			"data"=>date("Y-m-d")
		);
		$this->load->model("usuarios_model");
		$this->usuarios_model->adicionarMedidas($medidas);
		redirect('/');
	}
	

	public function calculaTMB($peso,$altura,$sexo,$idade){
		switch ($sexo) {
			case 'm': {
			  $tmb = (10 * $peso) + (6.25 * $altura) - (5 * $idade) + 5;
			  break;
			}
			case 'f':{
			  $tmb = (10 * $peso) + (6.25 * $altura) - (5 * $idade) - 161;
			  break;
			}
			default:{
			  //statements;
			  break;
			}
		}	
		return $tmb;
	}
	public function calculaGCD($tmb, $indice){
		$gcd=$tmb*$indice;
		return $gcd;
	}
	public function calculaMacros($gcd, $peso){
		
		$prot=$peso*2;
		$gord=$peso;
		$carb= ($gcd-($prot*4+$gord*9))/4;
		return $macros=array(
			"meta_carboidrato"=>$carb,
			"meta_proteina"=>$prot,
			"meta_gordura"=>$gord
		);
	}
	public function adicionarMedida(){
		$this->load->view('templates/header');
		$this->load->view('usuarios/medidas');
	}

}
