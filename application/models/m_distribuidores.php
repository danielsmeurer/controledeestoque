<?php
class M_distribuidores extends CI_Model {
	public $dados="";
	public $table;
	public function __construct()
    {
        parent::__construct(); 
        $this->load->database();  
        $this->table = "Distribuidor";             
    }

	public function cadastra_distribuidor($dados=false)
	{
		if(is_array($dados)){
			if( empyt($dados['nome'])){return false;}
			if( empty($dados['cnpj'])){return false;}
			$this->dados['nome'] = $dados['nome'];
			$this->dados['cnpj'] = $dados['cnpj'];
			$cnpj_ja_existe = $this->verificaSeExisteCNPJ($this->dados['cnpj']);	
			if($cnpj_ja_existe>0){
				return 'existe';
			}				
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

	
	public function pegaTodasDistribuidores(){
		$query = $this->db->get($this->table);
		return  $query->result();
	}

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

	public function pegaDistribuidor($id=false){
		if(!$id) return false;
		$where['id'] = $id;
		$query=$this->db->get_where($this->table, $where);		
		return $query->result(); 
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




/*
	

	

	public function pegaTodasCategorias(){
		$query = $this->db->get($this->table);
		return  $query->result();
	}

	

	*/



}