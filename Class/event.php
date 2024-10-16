<?php
require_once("parent.php");

class Event extends ParentClass{
	public function __construct(){
		parent::__construct();
	}

	public function getEvent($cari="", $offset=null, $limit=null, $idevent=null){
		$cari_persen = "%".$cari."%";

		if($idevent != null){
			$sql = "SELECT * from event WHERE idevent = ?;";

			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("i", $idevent);
		} else{
			if(is_null($limit)){
				$sql = "SELECT * FROM event WHERE name Like ?;";

				$stmt = $this->conn->prepare($sql);
				$stmt -> bind_param("s", $cari_persen);
			} else{
				$sql = "SELECT * FROM event WHERE name Like ? Limit ?,?;";

				$stmt = $this->conn->prepare($sql);
				$stmt -> bind_param("sii", $cari_persen, $offset, $limit);
			}
		}
		$stmt->execute();
		$res = $stmt->get_result();

		return $res; 
	} 

	public function nameCheck($name=null){
		$sql = "SELECT * from event WHERE name = ?;";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("s", $name);
		$stmt->execute();
		$res = $stmt->get_result();
		
		return $res; 
	} 
	
	public function insertEvent($name, $date, $desc){
		$sql = "INSERT INTO event (name, date, description) VALUES (?,?,?);";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("sss", $name, $date, $desc);
		
		$stmt->execute();
	}

	public function updateEvent($name, $date, $desc, $idevent)
	{
		$sql = "UPDATE event SET name=?, date=?, description=? WHERE event.idevent=?;";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("sssi", $name, $date, $desc, $idevent);
		
		$stmt->execute();
	}

	public function deleteEvent($idevent){
		$sql = "DELETE FROM event WHERE event.idevent = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("i", $idevent);
		
		$stmt->execute();
	}
}

?>