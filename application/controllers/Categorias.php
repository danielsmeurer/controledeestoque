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


	public function ajax_form_lista(){
		$this->data['categorias']=$this->listar_categorias();		
		$this->load->view('categorias/ajax_form_lista', $this->data);
		
	}

	public function form_edita(){
		if(!$this->uri->segment(3))	{
			show_404();
		}
	else{
			$id=$this->uri->segment(3);
			if($this->input->post('submit_edita')){
				$this->load->library('form_validation');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$this->form_validation->set_rules('nome', 'Nome da categoria', 'required');
	            if ($this->form_validation->run() == TRUE)
	            {
	             	$edita_categoria= $this->editar($id, $this->input->post('nome'));
	                if(!$edita_categoria){
	                	$this->data['msg']['error']="<p>Categoria não foi alterada</p>";	               
	                }else{
	                	$this->data['msg']['sucess']="<p>Categoria atualizada com sucesso</p>";
	                }
	            }
			}
			$atual =$this->get_categoria($id);
			$this->data['id']=$id;
			$this->data['nome_atual']=$atual[0]->nome;				
			$this->data['title'] = 'Categorias - Edição';
			$this->load->view('template/header', $this->data);
			$this->load->view('categorias/form_edita', $this->data);
			$this->load->view('template/footer');
		}
	}
	/*
	Pagina para apenas visualizar uma categoria.
	 */	
	public function form_categoria(){
		if(!$this->uri->segment(3))	{
			show_404();
		}
		else{
			$this->data['categoria']=$this->get_categoria($this->uri->segment(3));			
			$this->data['title'] = 'Categorias - Leitura';
			$this->load->view('template/header', $this->data);
			$this->load->view('categorias/form_categoria', $this->data);
			$this->load->view('template/footer');
		}
	}

	public function ajax_excluir_categoria(){
		if(!$this->input->post('cat_id')){
			show_404();
		}
		$id=$this->input->post('cat_id');
		$this->data['exclusao']=$this->excluir_categoria($id);
		$this->load->view('categorias/ajax_excluir',$this->data);
	}

	private function listar_categorias(){
		return  $this->m_categorias->pegaTodasCategorias();
	}

	

	private function cadastra($nome=false){
		if(!$nome){return false;}
		return  $this->m_categorias->cadastra_categoria($nome);
	}

	private function editar($id=false, $data=false){
		if(!$id or !$data){return false;}
		return  $this->m_categorias->editaCategoria($id, $data);
	}

	private function get_categoria($id=false){
		if($id){
			return  $this->m_categorias->pegaCategoria($id, false);
		}
		return false;
	}

	private function excluir_categoria($id){
		if($id){
			return  $this->m_categorias->excluiCategoria($id);
		}
		return false;
	}

}
