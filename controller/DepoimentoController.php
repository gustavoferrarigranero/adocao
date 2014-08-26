<?php
class DepoimentoController{

	private $depoimentoModel;

	public function __construct(){
		require_once("model/DepoimentoModel.php");
		$this->depoimentoModel = new DepoimentoModel();
	}

	public function inserir($dados = array()){
		
		$this->depoimentoModel->inserir($dados);
		
		$_SESSION['sucesso'] = "Depoimento cadastrado com sucesso!";
	}
	
	public function alterar($dados = array()){
		
		if($this->depoimentoModel->alterar($dados)){
			$_SESSION['sucesso'] = "Dados alterados com sucesso!";
		}
	}
	
	public function excluir($dados = array()){
		
		$id = $dados['id'];
		$this->depoimentoModel->excluir($id);
		
	}
	
	public function listar($dados = array()){
		
		return $this->depoimentoModel->listar($dados);
		
	}
	
	public function get($dados = array()){
		
		return $this->depoimentoModel->get($dados);
		
	}
	
	public function like($depoimento_id){
		
		return $this->depoimentoModel->like($depoimento_id);
		
	}
	
	public function deslike($depoimento_id){
		
		return $this->depoimentoModel->deslike($depoimento_id);
		
	}
	
	public function lastId(){
		
		return $this->depoimentoModel->lastId();
		
	}
}
