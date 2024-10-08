<?php
require_once("parent.php");

class Game extends ParentClass{
	public function __construct(){
		parent::__construct();
	}

	public function getGame($cari="", $offset=null, $limit=null){
		$cari_persen = "%".$cari."%";

		if(is_null($limit)){
			$sql = "SELECT * from game WHERE name Like ?;";

			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("s", $cari_persen);
		} else{
			$sql = "SELECT * from game WHERE name Like ? Limit ?,?;";

			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("sii", $cari_persen, $offset, $limit);
		}
		$stmt->execute();
		$res = $stmt->get_result();

		return $res; 
	} 

	public function insertGame($name,$desc){
		$sql = "INSERT INTO game (name, description) VALUES (?, ?);";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("ss", $name, $desc);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}

	public function updateGame($name, $desc, $idgame)
	{
		$sql = "UPDATE game SET name=?, description=? WHERE game.idgame=?;";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("ssi", $name, $desc, $idgame);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}

	public function deleteTeam($idgame){
		$sql = "DELETE FROM game WHERE game.idgame = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("i", $idgame);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}
}

?>