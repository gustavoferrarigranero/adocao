<?php
class AdocaoModel{

	private $connection;

	public function __construct(){
		require_once("Connection.php");
		$this->connection = new Connection();
	}

	public function inserir($dados = array()){
		
		return $this->connection->query("INSERT INTO `adocoes` (`usuario_id`, `animal_id`, `local`, `cidade`, `status`) VALUES ('".$dados['usuario_id']."', '".$dados['animal_id']."', '".$dados['local']."', '".$dados['cidade']."', '".$dados['status']."');");
		
	}
	
	public function alterar($dados = array()){
		
		return $this->connection->query("UPDATE `adocoes` SET `usuario_id` = '".$dados['usuario_id']."',`animal_id` = '".$dados['animal_id']."',`local` = '".$dados['local']."',`cidade` = '".$dados['cidade']."',`status` = '".$dados['status']."'  WHERE adocao_id = ".(int)$dados['adocao_id'].";");
		
	}
	
	public function excluir($dados = array()){
		
		return $this->connection->query("DELETE FROM `adocoes` WHERE adocao_id = ".(int)$dados['adocao_id'].";");
		
	}
	
	public function get($adocao_id){
		
		return $this->connection->query("SELECT a.`adocao_id`,a.`usuario_id`,a.`local`,a.`cidade`, a.`status`,an.* FROM `adocoes` a INNER JOIN animais an ON an.animal_id=a.animal_id WHERE a.adocao_id = ".(int)$adocao_id);
		
	}
	
	public function listar($dados = array()){
		
		return $this->connection->query("SELECT a.`adocao_id`,a.`usuario_id`,a.`local`,a.`cidade`, a.`status`,an.* FROM `adocoes` a INNER JOIN animais an ON an.animal_id=a.animal_id");
		
	}
	
	public function isAdocao($animal_id){
		
		return $this->connection->query("SELECT a.`adocao_id`,a.`usuario_id`,a.`local`,a.`cidade`, a.`status`,an.* FROM `adocoes` a INNER JOIN animais an ON an.animal_id=a.animal_id  WHERE a.animal_id = ".(int)$animal_id."");
		
	}	
	
	public function adotar($adocao_id){
		
		$this->connection->query("UPDATE `adocoes` SET `status` = 1  WHERE adocao_id = ".(int)$adocao_id." ;");
		
	}
	
	public function cancelaAdotar($adocao_id){
		
		$this->connection->query("UPDATE `adocoes` SET `status` = 0  WHERE adocao_id = ".(int)$adocao_id." ;");
		
	}
	
	public function lastId(){
		
		return $this->connection->getLastId();
		
	}
}
