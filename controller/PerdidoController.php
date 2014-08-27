<?php
class PerdidoController{

	private $perdidoModel;

	public function __construct(){
		require_once("model/PerdidoModel.php");
		$this->perdidoModel = new PerdidoModel();
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
		
		$this->perdidoModel->inserir($dados);
		$_SESSION['sucesso'] = "Animal para Adoção cadastrado com sucesso!";
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
		
		return $this->perdidoModel->listar($dados);
		
	}
	
	public function isAdocao($animal_id){
		
		return $this->perdidoModel->isAdocao($animal_id);
		
	}
	
	public function get($perdido_id){
		
		return $this->perdidoModel->get($perdido_id);
		
	}
	
	public function foto($dados = array()){
		
		$this->perdidoModel->foto($dados);
		
	}
	
	public function avisar($perdido_id){
		
		$perdido = $this->get($perdido_id)->row;
		
		if($perdido){
		
			$html = "Olá, para informar que o animal ".$perdido['nome']." foi encontrado envie osdetalhes sobre ele no email: ". EMAIL . " para mais informações!";
			
			mail($_SESSION['usuario']['email'],"Animal Encontrado",$html);		
		
			$this->perdidoModel->avisar($perdido_id);
			
			$_SESSION['sucesso'] = "Aviso de animal encontrado enviado! Após receber os dados em seu email entre em contato para continuarmos o processo!";
		
		}else{
			$_SESSION['erro'] = "Ocorreu um problema ao avisar sobre este animal!";
		}
		
	}
	
	public function cancelaAvisar($perdido_id){
		
		
		$this->perdidoModel->cancelaAvisar($perdido_id);
		
		$_SESSION['sucesso'] = "Você cancelou o aviso de animal encontrado!";
		
	}
	
	public function lastId(){
		
		return $this->perdidoModel->lastId();
		
	}
}
