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
		$_SESSION['sucesso'] = "Animal para Adoção cadastrado com sucesso!";
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
	
	public function get($adocao_id){
		
		return $this->adocaoModel->get($adocao_id);
		
	}
	
	public function foto($dados = array()){
		
		$this->adocaoModel->foto($dados);
		
	}
	
	public function adotar($adocao_id){
		
		$adocao = $this->get($adocao_id)->row;
		
		if($adocao){
		
			$html = "Olá, você escolheu adotar um animal em nosso site de adoção,o pet escolhido foi: ". $adocao['nome'] .", do local: ". $adocao['local'] .", na cidade: ". $adocao['cidade'] .", para continuar o processo, entre em contato no email: ". EMAIL . " para informações de entrega do pet!";
			
			mail($_SESSION['usuario']['email'],"Adoção de Animais",$html);		
		
			$this->adocaoModel->adotar($adocao_id);
			
			$_SESSION['sucesso'] = "Adoção iniciada! Após receber os dados em seu email entre em contato para agendarmos a entrega do pet!";
		
		}else{
			$_SESSION['erro'] = "Ocorreu um problema ao adotar este animal!";
		}
		
	}
	
	public function cancelaAdotar($adocao_id){
		
		
		$this->adocaoModel->cancelaAdotar($adocao_id);
		
		$_SESSION['sucesso'] = "Você cancelou sua adoção com sucesso!";
		
	}
	
	public function lastId(){
		
		return $this->adocaoModel->lastId();
		
	}
}
