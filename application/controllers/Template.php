<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {
	public $data="";
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{		
		//redirect('categorias/form_cadastro');
		
	}

	

	

}
