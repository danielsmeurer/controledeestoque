<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
author = Daniel Soares Meurer


 */
class Produtos extends CI_Controller {
	public $data="";	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('m_produtos');

	}

	public function index()
	{		
		redirect('produtos/form_lista');
		
	}

	public function form_cadastro(){
		if($this->input->post('submit_cadastro')){
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('descricao', 'Descrição do produto', 'required');
			$this->form_validation->set_rules('codbarras', 'Codigo de barras ', 'required|numeric');
			if ($this->form_validation->run() == FALSE  || $this->input->post('categoria')==0)
            {                           	
            	if($this->input->post('categoria')==0){
            		$this->data['msg']['error']="<p>Selecione uma categoria</p>";  
            	}
            	else{
            	$this->data['msg']['error']="<p>Cadastro não foi efetuado.</p>"; 
            	} 
                           
            }
            else{
            	$cadastra_produto = $this->cadastra($this->input->post()); 
            	if(!$cadastra_produto){
                	$this->data['msg']['error']="<p>Produto não foi gravado corretament</p>";
                }
                elseif( $cadastra_produto === 'existe'){
                	$this->data['msg']['error']="<p>Já existe uma produto com este código de barras</p>";
                }else{
                	$this->data['msg']['sucess']="<p>Distribuidor cadastrado com sucesso</p>";
                }  
            }
		}
		$this->load->model('m_categorias');
		$categorias= $this->m_categorias->pegaTodasCategorias();
		if($categorias){
			$this->data['categorias'][0]='Selecione';
			foreach ($categorias as $cat) {
				$this->data['categorias'] [$cat->id]=$cat->nome;
			}
		}
		else{
			$this->data['categorias']=false;
		}
		$this->data['title'] = 'Produtos - Cadastro';
		$this->load->view('template/header', $this->data);
		$this->load->view('produtos/form_cadastro', $this->data);
		$this->load->view('template/footer');
	}	

	public function form_lista(){
		$this->data['produtos']=$this->listar_produtos();		
		$this->data['title'] = 'Produtos - Lista ';
		$this->load->view('template/header', $this->data);
		$this->load->view('produtos/form_lista', $this->data);
		$this->load->view('template/footer');
	}

	public function form_produto(){
		if(!$this->uri->segment(3))	{
			show_404();
		}
		else{
			$this->data['produto']=$this->get_produto($this->uri->segment(3));	
			$this->load->model('m_categorias');
			$categorias= $this->m_categorias->pegaTodasCategorias();
			//var_dump($this->data['produto']);
			$this->data['produto']['categoria']=false;

			if($categorias){
				foreach($categorias as $cat){
					if($this->data['produto'][0]->categoria_id == $cat->id){
						$this->data['produto']['categoria']=$cat->nome;
					}
					
				}
			}
			$this->data['title'] = 'Produto - Leitura';
			$this->load->view('template/header', $this->data);
			$this->load->view('produtos/form_produto', $this->data);
			$this->load->view('template/footer');
		}
	}

	private function listar_produtos(){
		return  $this->m_produtos->pegaTodosProdutos();
	}

	private function cadastra($dados=false){
		if(!$dados){return false;}
		return  $this->m_produtos->cadastra_produto($dados);
	}

	private function get_produto($id=false){
		if($id){
			return  $this->m_produtos->pegaProduto($id);
		}
		return false;
	}

/*
	

	
	

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
*/
	/*
	Pagina para apenas visualizar uma categoria.
	 */	
/*	


	private function excluir_distribuidor($id=false){
		if($id){
			return  $this->m_distribuidores->excluiDistribuidor($id);
		}
		return false;
	}

	

	private function cadastra($dados=false){
		if(!$dados){return false;}
		return  $this->m_distribuidores->cadastra_distribuidor($dados);
	}

	

	private function editar($id=false, $data=false){
		if(!$id or !$data){return false;}
		return  $this->m_distribuidores->editadistribuidor($id, $data);
	}*/
}
