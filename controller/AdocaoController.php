<?php
class AdocaoController{

	private $adocaoModel;

	public function __construct(){
		require_once("model/AdocaoModel.php");
		$this->adocaoModel = new AdocaoModel();
	}

	public function inserir($dados = array()){
		
		require_once("AnimalController.php");
		$animalController = new AnimalController();
		
		$animalController->inserir($dados);		
		
		$dados['animal_id'] = $animalController->lastId();
		
		if(isset($_FILES['foto']) && $_FILES['foto']){
			$filedir = 'admin/app/webroot/imagens/'.$_FILES['foto']['name'];
			move_uploaded_file($_FILES['foto']['tmp_name'],$filedir);
			$dados['foto'] = $_FILES['foto']['name'];
			$animalController->foto($dados);
		}
		
		$dados['usuario_id'] = $_SESSION['usuario']['usuario_id'];
		
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
		
		return $this->adocaoModel->listar($dados);
		
	}
	
	public function foto($dados = array()){
		
		$this->adocaoModel->foto($dados);
		
	}
	
	public function lastId(){
		
		return $this->adocaoModel->lastId();
		
	}
}
