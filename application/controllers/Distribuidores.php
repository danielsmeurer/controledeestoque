<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribuidores extends CI_Controller {
	public $data="";
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('m_distribuidores');

	}

	public function index()
	{		
		redirect('distribuidores/form_lista');
		
	}

	public function form_cadastro(){
		if($this->input->post('submit_cadastro')){
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('nome', 'Nome do fornecedor', 'required');
			$this->form_validation->set_rules('cnpj', 'CNPJ', 'required|valid_cnpj');
            if ($this->form_validation->run() == TRUE)
            {                           	
            	$cadastra_distribuidor = $this->cadastra($this->input->post()); 
            	var_dump($cadastra_distribuidor); exit();
                if(!$cadastra_distribuidor){
                	$this->data['msg']['error']="<p>Categoria não foi gravada corretament</p>";
                }
                elseif( $$cadastra_distribuidor === 'existe'){
                	$this->data['msg']['error']="<p>Já existe uma distribuidor com o mesmo CNPJ escolha outro.</p>";
                }else{
                	$this->data['msg']['sucess']="<p>Distribuidor cadastrado com sucesso</p>";
                }               
            }
            else{
            	$this->data['msg']['error']="<p>Cadastro não foi efetuado.</p>";
            }
		}
		
		$this->data['title'] = 'Distribuidores - Cadastro';
		$this->load->view('template/header', $this->data);
		$this->load->view('distribuidores/form_cadastro', $this->data);
		$this->load->view('template/footer');
	}

	public function form_lista(){
		$this->data['distribuidores']=$this->listar_distribuidores();
		$this->data['title'] = 'Distribuidores - Lista ';
		$this->load->view('template/header', $this->data);
		$this->load->view('distribuidores/form_lista', $this->data);
		$this->load->view('template/footer');
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
				$this->form_validation->set_rules('nome', 'Nome do fornecedor', 'required');
				$this->form_validation->set_rules('cnpj', 'CNPJ', 'required|valid_cnpj');
	            if ($this->form_validation->run() == TRUE)
	            {
	            	$dados['nome']=$this->input->post('nome');
	            	$dados['cnpj']=$this->input->post('cnpj');
	             	$edita_distribuidor= $this->editar($id, $dados);
	                if(!$edita_distribuidor){
	                	$this->data['msg']['error']="<p>Distribuidor não foi alterada</p>";	               
	                }else{
	                	$this->data['msg']['sucess']="<p>Distribuidor atualizada com sucesso</p>";
	                }
	            }
			}
			$atual =$this->get_distribuidor($id);
			$this->data['id']=$id;
			$this->data['nome_atual']=$atual[0]->nome;
			$this->data['cnpj_atual']=$atual[0]->cnpj;
			$this->data['title'] = 'Categorias - Edição';
			$this->load->view('template/header', $this->data);
			$this->load->view('distribuidores/form_edita', $this->data);
			$this->load->view('template/footer');
		}
	}

	public function ajax_excluir_distribuidor(){
		if(!$this->input->post('dist_id')){
			show_404();
		}
		$id=$this->input->post('dist_id');
		$this->data['exclusao']=$this->excluir_distribuidor($id);
		echo json_encode($this->data['exclusao']);
		//$this->load->view('distribuidor/ajax_excluir',$this->data);
	}	

	public function ajax_form_lista(){
		$this->data['distribuidores']=$this->listar_distribuidores();		
		$this->load->view('distribuidores/ajax_form_lista', $this->data);		
	}

	private function excluir_distribuidor($id=false){
		if($id){
			return  $this->m_distribuidores->excluiDistribuidor($id);
		}
		return false;
	}

	private function get_distribuidor($id=false){
		if($id){
			return  $this->m_distribuidores->pegaDistribuidor($id);
		}
		return false;
	}

	private function cadastra($dados=false){
		if(!$dados){return false;}
		return  $this->m_distribuidores->cadastra_distribuidor($dados);
	}

	private function listar_distribuidores(){
		return  $this->m_distribuidores->pegaTodasDistribuidores();
	}

	private function editar($id=false, $data=false){
		if(!$id or !$data){return false;}
		return  $this->m_distribuidores->editadistribuidor($id, $data);
	}




}



/*
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
/*	public function form_categoria(){
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

	

	*/

