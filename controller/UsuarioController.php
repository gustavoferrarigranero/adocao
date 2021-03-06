<?php
class UsuarioController{

	private $usuarioModel;

	public function __construct(){
		require_once("model/UsuarioModel.php");
		$this->usuarioModel = new UsuarioModel();
	}

	public function inserir($dados = array()){
		if(!$this->usuarioModel->verificaEmail($dados['email'])){
			$dados['dataNascimento'] = date("Y/m/d",strtotime($dados['dataNascimento']));
			$this->usuarioModel->inserir($dados);
			$_SESSION['sucesso'] = "Usuário cadastrado com sucesso, faça seu login!";
		}else{
			$_SESSION['erro'] = "Email ja cadastrado!";
		}
		
	}
	
	public function alterar($dados = array()){
		
		if($this->usuarioModel->alterar($dados)){
			$_SESSION['sucesso'] = "Dados alterados com sucesso!";
			$_SESSION['usuario'] = $this->usuarioModel->retornaUsuario($_SESSION['usuario']['usuario_id'])->row;
		}
	}
	
	public function excluir($dados = array()){
		
		$id = $dados['id'];
		$this->usuarioModel->excluir($id);
		
	}
	
	public function listar($dados = array()){
		
		$this->usuarioModel->listar($dados);
		
	}
	
	public function retornaUsuario($id){
		
		$this->usuarioModel->retornaUsuario($id);
		
	}
	
	public function verificaLogin($dados = array()){
		$login = $this->usuarioModel->verificaLogin($dados);
		if($login){
			$_SESSION['sucesso'] = $login;
		}else{
			$_SESSION['erro'] = "Dados inválidos!";
		}
		
	}
	
	public function foto($dados = array()){
		
		$this->usuarioModel->foto($dados);
		
	}
	
	public function lastId(){
		
		return $this->usuarioModel->lastId();
		
	}
}
