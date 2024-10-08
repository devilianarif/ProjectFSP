<?php
require_once("parent.php");

class EventTeam extends ParentClass{
	public function __construct(){
		parent::__construct();
	}

	public function getEventTeam($idevent, $cari="", $offset=null, $limit=null){
		$cari_persen = "%".$cari."%";

		if(is_null($limit)){
			$sql = "SELECT idevent, event_teams.idteam, team.name FROM event_teams INNER JOIN team 
					ON event_teams.idteam = team.idteam WHERE event_teams.idevent=? AND name Like ?;";

			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("is", $idevent, $cari_persen);
		} else{
			$sql = "SELECT idevent, event_teams.idteam, team.name FROM event_teams INNER JOIN team 
					ON event_teams.idteam = team.idteam WHERE event_teams.idevent=? AND name Like ? Limit ?,?;";

			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("isii", $idevent, $cari_persen, $offset, $limit);
		}
		$stmt->execute();
		$res = $stmt->get_result();

		return $res; 
	} 

	public function insertEventTeam($idevent, $idteam){
		$sql = "INSERT INTO event_teams (idevent, idteam) VALUES (?,?);";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("ii", $idevent, $idteam);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}

	public function updateEventTeam($idteam, $idevent)
	{
		$sql = "UPDATE event_teams SET idteam=?  WHERE event_teams.idevent=?; ";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("ii", $idteam, $idevent);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}

	public function deleteEventTeam($idevent, $idteam){
		$sql = "DELETE FROM event_teams WHERE event_teams.idevent = ? AND event_teams.idteam = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("ii", $idevent, $idteam);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}
}

?>