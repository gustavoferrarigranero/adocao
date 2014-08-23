<?php
class AnimalModel{

	private $connection;

	public function __construct(){
		require_once("Connection.php");
		$this->connection = new Connection();
	}

	public function inserir($dados = array()){
		
		return $this->connection->query("INSERT INTO `animal` (`nome`, `descricao`, `peso`, `pelagem`, `tamanho`, `tipo`) VALUES ('".$dados['nome']."', '".$dados['descricao']."', '".$dados['peso']."', '".$dados['pelagem']."', '".$dados['tamanho']."', '".$dados['tipo']."');");
		
	}
	
	public function alterar($dados = array()){
		
		return $this->connection->query("UPDATE `animal` SET `nome` = '".$dados['nome']."',`descricao` = '".$dados['descricao']."',`peso` = '".$dados['peso']."',`pelagem` = '".$dados['pelagem']."',`tamanho` = '".$dados['tamanho']."',`tipo` = '".$dados['tipo']."' WHERE animal_id = ".(int)$dados['animal_id'].";");
		
	}
	
	public function excluir($dados = array()){
		
		return $this->connection->query("DELETE FROM `animal` WHERE animal_id = ".(int)$dados['animal_id'].";");
		
	}
	
	public function listar($dados = array()){
		
		return $this->connection->query("SELECT * FROM `animal`");
		
	}
	
	public function foto($dados = array()){
		
		return $this->connection->query("UPDATE `animal` SET `foto` = '".$this->connection->escape($dados['foto'])."'  WHERE animal_id = ".(int)$dados['animal_id'].";");
		
	}
	
	public function lastId(){
		
		return $this->connection->getLastId();
		
	}
}
