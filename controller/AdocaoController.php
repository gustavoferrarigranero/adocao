<?php
class AdocaoController{

	private $adocaoModel;

	public function __construct(){
		require_once("model/AdocaoModel.php");
		$this->adocaoModel = new AdocaoModel();
	}

	public function inserir($dados = array()){
		$this->adocaoModel->inserir($dados);
		$_SESSION['sucesso'] = "Adoção cadastrado com sucesso!";
	}
	
	public function alterar($dados = array()){
		
		if($this->adocaoModel->alterar($dados)){
			$_SESSION['sucesso'] = "Dados alterados com sucesso!";
		}
	}
	
	public function excluir($dados = array()){
		
		$id = $dados['id'];
		$this->adocaoModel->excluir($id);
		
	}
	
	public function listar($dados = array()){
		
		$this->adocaoModel->listar($dados);
		
	}
	
	public function foto($dados = array()){
		
		$this->adocaoModel->foto($dados);
		
	}
	
	public function lastId(){
		
		return $this->adocaoModel->lastId();
		
	}
}
