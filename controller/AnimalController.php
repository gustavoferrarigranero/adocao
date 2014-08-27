<?php
class AnimalController{

	private $animalModel;

	public function __construct(){
		require_once("model/AnimalModel.php");
		$this->animalModel = new AnimalModel();
	}

	public function inserir($dados = array()){
		
		$this->animalModel->inserir($dados);
		
		$_SESSION['sucesso'] = "Animal cadastrado com sucesso!";
	}
	
	public function alterar($dados = array()){
		
		if($this->animalModel->alterar($dados)){
			$_SESSION['sucesso'] = "Dados alterados com sucesso!";
		}
	}
	
	public function excluir($dados = array()){
		
		$id = $dados['id'];
		$this->animalModel->excluir($id);
		
	}
	
	public function listar($dados = array()){
		
		return $this->animalModel->listar($dados);
		
	}
	
	public function listarFiltro($filtro){
		
		return $this->animalModel->listarFiltro($filtro);
		
	}
	
	public function foto($dados = array()){
		
		$this->animalModel->foto($dados);
		
	}
	
	public function lastId(){
		
		return $this->animalModel->lastId();
		
	}
}
