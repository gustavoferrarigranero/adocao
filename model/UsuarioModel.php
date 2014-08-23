<?php
class UsuarioModel{

	private $connection;

	public function __construct(){
		require_once("Connection.php");
		$this->connection = new Connection();
	}

	public function inserir($dados = array()){
		
		return $this->connection->query("INSERT INTO `usuarios` (`nome`, `cpf`, `rg`, `dataNascimento`, `endereco`, `bairro`, `cidade`, `estado`, `cep`, `telefone`, `celular`, `email`,`senha`, `status`) VALUES ('".$this->connection->escape($dados['nome'])."', '".$this->connection->escape($dados['cpf'])."', '".$this->connection->escape($dados['rg'])."', '".$this->connection->escape($dados['dataNascimento'])."', '".$this->connection->escape($dados['endereco'])."', '".$this->connection->escape($dados['bairro'])."', '".$this->connection->escape($dados['cidade'])."', '".$this->connection->escape($dados['estado'])."', '".$this->connection->escape($dados['cep'])."', '".$this->connection->escape($dados['telefone'])."', '".$this->connection->escape($dados['celular'])."', '".$this->connection->escape($dados['email'])."', '".$this->connection->escape($dados['senha'])."', '".(int)$dados['status']."');");
		
	}
	
	public function alterar($dados = array()){
		
		return $this->connection->query("UPDATE `usuarios` SET `nome` = '".$this->connection->escape($dados['nome'])."', `cpf` = '".$this->connection->escape($dados['cpf'])."', `rg` = '".$this->connection->escape($dados['rg'])."', `dataNascimento` = '".$this->connection->escape($dados['dataNascimento'])."', `endereco` = '".$this->connection->escape($dados['endereco'])."', `bairro` = '".$this->connection->escape($dados['bairro'])."', `cidade` = '".$this->connection->escape($dados['cidade'])."', `estado` = '".$this->connection->escape($dados['estado'])."', `cep` = '".$this->connection->escape($dados['cep'])."', `telefone` = '".$this->connection->escape($dados['telefone'])."', `celular` = '".$this->connection->escape($dados['celular'])."', `email` = '".$this->connection->escape($dados['email'])."', `senha` = '".$this->connection->escape($dados['senha'])."', `status` = '".(int)$dados['status']."' WHERE id = ".(int)$dados['id'].";");
		
	}
	
	public function excluir($dados = array()){
		
		return $this->connection->query("DELETE FROM `usuarios` WHERE id = ".(int)$dados['id'].";");
		
	}
	
	public function listar($dados = array()){
		
		return $this->connection->query("SELECT * FROM `usuarios`");
		
	}
	
	public function verificaEmail($email){

		return $this->connection->query("SELECT * FROM `usuarios` WHERE email = '".$this->connection->escape($email)."'")->num_rows;
		
	}
	
	public function verificaLogin($dados){

		$dados = $this->connection->query("SELECT * FROM `usuarios` WHERE email = '".$this->connection->escape($dados['email'])."' AND senha = '".$this->connection->escape($dados['senha'])."' LIMIT 1") ;
		if($dados->num_rows){
			return $dados->row;
		}else{
			return false;
		}
		
	}
	
	public function retornaUsuario($id){
		
		return $dados = $this->connection->query("SELECT * FROM `usuarios` WHERE id = '".(int)$id."' LIMIT 1") ;
		
	}
	
	public function lastId(){
		
		return $this->connection->getLastId();
		
	}
}
