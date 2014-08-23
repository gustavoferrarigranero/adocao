<?php

final class Connection {

	private $link;

	public function __construct() {
		
		$hostname = "localhost" ; 
		$username = "root" ; 
		$password = "" ; 
		$database = "adocao" ;

		if (!$this->link = new mysqli($hostname, $username, $password,$database)) {

      		trigger_error('Error: Could not make a database link using ' . $username . '@' . $hostname);

		}



		

		$this->link->query("SET NAMES 'utf8'");

		$this->link->query("SET CHARACTER SET utf8");

		$this->link->query("SET CHARACTER_SET_CONNECTION=utf8");

		$this->link->query("SET SQL_MODE = ''");

  	}

		

  	public function query($sql) {

		if ($this->link) {

			$resource = $this->link->query($sql);

			if ($resource) {

				if (isset($resource->num_rows) && $resource->num_rows > 0) {

					$i = 0;

			

					$data = array();

			

					while ($result = $resource->fetch_assoc()) {

						$data[$i] = $result;

			

						$i++;

					}

					

					$resource->close();

					

					$query = new stdClass();

					$query->row = isset($data[0]) ? $data[0] : array();

					$query->rows = $data;

					$query->num_rows = $i;

					

					unset($data);

					

					return $query;	

				} else {
					return true;

				}

			} else {

				$query->num_rows = 0;
				trigger_error('Error: ' . mysql_error($this->link) . '<br />Error No: ' . mysql_errno($this->link) . '<br />' . $sql);

				exit();

			}

		}

  	}

	

	public function escape($value) {

		if ($this->link) {

			return mysqli_real_escape_string($this->link,$value);

		}

	}

	

  	public function countAffected() {

		if ($this->link) {

    		return mysqli_affected_rows($this->link);

		}

  	}



  	public function getLastId() {

		if ($this->link) {

    		return mysqli_insert_id($this->link);

		}

  	}	

	

	public function __destruct() {

		if ($this->link) {

			$this->link->close();

		}

	}

}