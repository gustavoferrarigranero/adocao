<?php
class PerdidoController{

	private $perdidoModel;

	public function __construct(){
		require_once("model/PerdidoModel.php");
		$this->perdidoModel = new PerdidoModel();
	}

	public function inserir($dados = array()){
		$this->perdidoModel->inserir($dados);
		$_SESSION['sucesso'] = "Animal Perdido cadastrado com sucesso!";
	}
	
	public function alterar($dados = array()){
		
		if($this->perdidoModel->alterar($dados)){
			$_SESSION['sucesso'] = "Dados alterados com sucesso!";
		}
	}
	
	public function excluir($dados = array()){
		
		$id = $dados['id'];
		$this->perdidoModel->excluir($id);
		
	}
	
	public function listar($dados = array()){
		
		$this->perdidoModel->listar($dados);
		
	}
	
	public function foto($dados = array()){
		
		$this->perdidoModel->foto($dados);
		
	}
	
	public function lastId(){
		
		return $this->perdidoModel->lastId();
		
	}
}
