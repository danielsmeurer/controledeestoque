<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {
	public $data="";
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('m_categorias');

	}

	public function index()
	{		
		redirect('categorias/form_cadastro');
		
	}

	public function form_cadastro(){
		if($this->input->post('submit_cadastro')){
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('nome', 'Nome da categoria', 'required');
            if ($this->form_validation->run() == TRUE)
            {
               	$cadastra_categoria = $this->cadastra($this->input->post('nome'));
                if(!$cadastra_categoria){
                	$this->data['msg']['error']="<p>Categoria não foi gravada corretament</p>";
                }
                elseif( $cadastra_categoria === 'existe'){
                	$this->data['msg']['error']="<p>Já existe uma categoria com este nome por favor escolha outro</p>";
                }else{
                	$this->data['msg']['sucess']="<p>Categoria cadastrada com sucesso</p>";
                }
            }
		}
		$this->data['title'] = 'Categorias - Cadastro';
		$this->load->view('template/header', $this->data);
		$this->load->view('categorias/form_cadastro', $this->data);
		$this->load->view('template/footer');
	}

	public function form_lista(){
		$this->data['categorias']=$this->listar_categorias();
		$this->data['title'] = 'Categorias - Lista ';
		$this->load->view('template/header', $this->data);
		$this->load->view('categorias/form_lista', $this->data);
		$this->load->view('template/footer');
	}

	public function form_edita(){
		if(!$this->uri->segment(3))	{
			show_404();
		}
		else{


		}
	}

	private function listar_categorias(){
		return  $this->m_categorias->pegaTodasCategorias();
	}

	private function cadastra($nome=false){
		if(!$nome){return false;}
		return  $this->m_categorias->cadastra_categoria($nome);
	}

	private function editar($id=false,$data=false){
		if(!$id or !$data){return false;}
		
	}





}
