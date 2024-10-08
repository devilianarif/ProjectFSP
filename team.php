<?php
require_once("parent.php");

class Team extends ParentClass{
	public function __construct(){
		parent::__construct();
	}

	public function getTeam($cari="", $offset=null, $limit=null){
		$cari_persen = "%".$cari."%";

		if(is_null($limit)){
			$sql = "SELECT idteam, team.idgame, team.name as teamname, game.name as gamename 
			from team INNER JOIN game ON team.idgame = game.idgame WHERE teamname Like ?;";

			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("s", $cari_persen);
		} else{
			$sql = "SELECT idteam, team.idgame, team.name as teamname, game.name as gamename 
			from team INNER JOIN game ON team.idgame = game.idgame WHERE teamname Like ? Limit ?,?;";

			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("sii", $cari_persen, $offset, $limit);
		}
		$stmt->execute();
		$res = $stmt->get_result();

		return $res; 
	} 

	public function insertTeam($idgame, $name){
		$sql = "INSERT INTO team (idgame, name) VALUES (?, ?);";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("is", $idgame, $name);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}

	public function updateTeam($idgame, $name, $idteam)
	{
		$sql = "UPDATE team SET idgame=?, name=? WHERE team.idteam=?;";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("isi", $idgame, $name, $idteam);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}

	public function deleteTeam($idteam){
		$sql = "DELETE FROM team WHERE team.idteam = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("i", $idteam);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}
}

?>