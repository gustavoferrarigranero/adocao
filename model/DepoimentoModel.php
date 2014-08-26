<?php
class DepoimentoModel{

	private $connection;

	public function __construct(){
		require_once("Connection.php");
		$this->connection = new Connection();
	}

	public function inserir($dados = array()){
		
		return $this->connection->query("INSERT INTO `depoimentos` (`usuario_id`, `animal_id`, `texto`,`like`,`deslike`) VALUES ('".$dados['usuario_id']."', '".$dados['animal_id']."', '".$dados['texto']."', '".$dados['like']."', '".$dados['deslike']."');");
		
	}
	
	public function alterar($dados = array()){
		
		return $this->connection->query("UPDATE `depoimentos` SET `usuario_id` = '".$dados['usuario_id']."',`animal_id` = '".$dados['animal_id']."',`texto` = '".$dados['texto']."',`like` = '".$dados['like']."',`deslike` = '".$dados['deslike']."'  WHERE depoimento_id = ".(int)$dados['depoimento_id'].";");
		
	}
	
	public function excluir($dados = array()){
		
		return $this->connection->query("DELETE FROM `depoimentos` WHERE depoimento_id = ".(int)$dados['depoimento_id'].";");
		
	}
	
	public function get($depoimento_id){
		
		return $this->connection->query("SELECT d.`depoimento_id`,d.`usuario_id`,d.`texto`,d.`like`,d.`deslike`,u.nome  FROM `depoimentos` d INNER JOIN usuarios u ON d.usuario_id=u.usuario_id WHERE d.depoimento_id = ".(int)$depoimento_id);
		
	}
	
	public function listar($dados = array()){
		
		return $this->connection->query("SELECT d.`depoimento_id`,d.`usuario_id`,d.`texto`,d.`like`,d.`deslike`,u.nome  FROM `depoimentos` d INNER JOIN usuarios u ON d.usuario_id=u.usuario_id");
		
	}	
	
	public function like($depoimento_id){
		
		$this->connection->query("UPDATE `depoimentos` SET `like` = (COALESCE(`like`,0)+1)  WHERE depoimento_id = ".(int)$depoimento_id." ;");
		
	}
	
	public function deslike($depoimento_id){
		
		$this->connection->query("UPDATE `depoimentos` SET `deslike` = (COALESCE(`deslike`,0)+1)  WHERE depoimento_id = ".(int)$depoimento_id." ;");
		
	}
	
	public function lastId(){
		
		return $this->connection->getLastId();
		
	}
}
