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
	
	public function get($perdido_id){
		
		return $this->connection->query("SELECT a.`perdido_id`,a.`usuario_id`,a.`local`,a.`cidade`, a.`status`,an.* FROM `perdidos` a INNER JOIN animais an ON an.animal_id=a.animal_id WHERE a.perdido_id = ".(int)$perdido_id);
		
	}
	
	public function listar($dados = array()){
		
		return $this->connection->query("SELECT a.`perdido_id`,a.`usuario_id`,a.`local`,a.`cidade`, a.`status`,an.* FROM `perdidos` a INNER JOIN animais an ON an.animal_id=a.animal_id");
		
	}	
	
	public function avisar($perdido_id){
		
		$this->connection->query("UPDATE `perdidos` SET `status` = 1  WHERE perdido_id = ".(int)$perdido_id." ;");
		
	}
	
	public function cancelaAvisar($perdido_id){
		
		$this->connection->query("UPDATE `perdidos` SET `status` = 0  WHERE perdido_id = ".(int)$perdido_id." ;");
		
	}
	
	public function lastId(){
		
		return $this->connection->getLastId();
		
	}
}
