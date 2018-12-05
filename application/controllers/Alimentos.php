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
	 
}
