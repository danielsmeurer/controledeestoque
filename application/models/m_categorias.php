<?php
class M_categorias extends CI_Model {
	public $categoria="";
	public $table;
	public function __construct()
    {
        parent::__construct(); 
        $this->load->database();  
        $this->table = "Categorias";             
    }

	public function cadastra_categoria($nome=false)
	{
		if($nome){
			$this->categoria= array('nome' => $nome);	
			$categoria_nome_ja_existe = $this->verificaSeExisteCategoria(false, $nome);	
			if($categoria_nome_ja_existe>0){
				return 'existe';
			}	
			$this->db->insert($this->table, $this->categoria); 
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

	public function verificaSeExisteCategoria($id=false, $nome=false){
		if(!$id && !$nome) return false;
		if($id){
			$where['id'] = $id;
		}
		if($nome){
			$where['nome'] = $nome;
		}
		$query=$this->db->get_where($this->table, $where);		
		return $query->num_rows(); 
	}

	public function pegaCategoria($id=false, $nome=false){
		if(!$id && !$nome) return false;
		if($id){
			$where['id'] = $id;
		}
		if($nome){
			$where['nome'] = $nome;
		}
		$query=$this->db->get_where($this->table, $where);		
		return $query->result(); 
	}

	public function pegaTodasCategorias(){
		$query = $this->db->get($this->table);
		return  $query->result();
	}

	public function editaCategoria($id=false, $categoria=false){
		if(!$id or !$categoria){return false;}
		if($this->verificaSeExisteCategoria($id=false, $categoria)){ return false;}
		$this->categoria['nome']= $categoria;
		var_dump($id);
		$this->db->update($this->table, $this->categoria, array('id' => 12) );
		if($this->db->affected_rows()>0){
			return true;
		}
		else{
			//echo $this->db->_error_message();
			return false;
		}	 			
	}



}