<?php
class PerdidoModel{

	private $connection;

	public function __construct(){
		require_once("Connection.php");
		$this->connection = new Connection();
	}

	public function inserir($dados = array()){
		
		return $this->connection->query("INSERT INTO `perdidos` (`usuario_id`, `animal_id`, `local`, `cidade`, `status`) VALUES ('".$dados['usuario_id']."', '".$dados['animal_id']."', '".$dados['local']."', '".$dados['cidade']."', '".$dados['status']."');");
		
	}
	
	public function alterar($dados = array()){
		
		return $this->connection->query("UPDATE `perdidos` SET `usuario_id` = '".$dados['usuario_id']."',`animal_id` = '".$dados['animal_id']."',`local` = '".$dados['local']."',`cidade` = '".$dados['cidade']."',`status` = '".$dados['status']."'  WHERE perdido_id = ".(int)$dados['perdido_id'].";");
		
	}
	
	public function excluir($dados = array()){
		
		return $this->connection->query("DELETE FROM `perdidos` WHERE perdido_id = ".(int)$dados['perdido_id'].";");
		
	}
	
	public function listar($dados = array()){
		
		return $this->connection->query("SELECT * FROM `perdidos`");
		
	}	
	
	public function lastId(){
		
		return $this->connection->getLastId();
		
	}
}
