<?php
class M_produtos extends CI_Model {
	public $dados="";
	public $table;
	public function __construct()
    {
        parent::__construct(); 
        $this->load->database();  
        $this->table = "Produtos";             
    }

	public function cadastra_produto($dados=false)
	{
		if(is_array($dados)){
			
			if(!empty($dados['descricao'])){ $this->dados['descricao'] =$dados['descricao'];}
			if(!empty($dados['codbarras'])){
				$this->dados['codBarras'] = $dados['codbarras'];
			}
			else{
				return false;
			}
			if(!empty($dados['categoria'])){
				$this->dados['categoria_id']=$dados['categoria'];
			}		
			else{
				return false;
			}
			$codbarras_ja_existe = $this->verificaSeExisteCodBarras($this->dados['codBarras']);	
			if($codbarras_ja_existe>0){
				return 'existe';
			}	
			//var_dump($this->dados); exit();	
			$this->db->insert($this->table, $this->dados); 
			if($this->db->affected_rows()>0){
				return true;
			}
			else{
				echo $this->db->_error_message();
				return false;
			}						
		}
		return false;
	}

	public function verificaSeExisteCodBarras($cod=false){
		if(!$cod) return false;
		$where['codBarras'] = $cod;
		$query=$this->db->get_where($this->table, $where);		
		return $query->num_rows(); 
	}

	public function pegaTodosProdutos(){
		$query = $this->db->get($this->table);
		return  $query->result();
	}
	public function pegaProduto($id=false){
		if(!$id) return false;
		$where['id'] = $id;
		$query=$this->db->get_where($this->table, $where);		
		return $query->result(); 
	}

/*	
	

	public function editaDistribuidor($id=false, $dados=false){
		if(!$id || !$dados || !(is_array($dados))){return false;}
		if($this->verificaSeExisteCNPJ($dados['cnpj'])){ return false;}
		$this->db->update($this->table, $dados, array('id' => $id) );
		if($this->db->affected_rows()>0){
			return true;
		}
		else{
			//echo $this->db->_error_message();
			return false;
		}	 			
	}

	public function verificaSeExisteCNPJ($cnpj=false){
		if(!$cnpj) return false;
		$where['cnpj'] = $cnpj;
		$query=$this->db->get_where($this->table, $where);		
		return $query->num_rows(); 
	}

	

	function excluiDistribuidor($id=false){
		if($id){
			$this->db->delete($this->table, array('id' => $id));
			if($this->db->affected_rows()>0){
				return true;
			}
			else{
				//echo $this->db->_error_message();
				return false;
			}
		}
		return false;
	}

	*/

}