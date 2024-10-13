<?php
require_once("parent.php");

class Achievement extends ParentClass{
	public function __construct(){
		parent::__construct();
	}

	public function getAchv($cari="", $offset=null, $limit=null, $idachv=null, $idteam=null){
		$cari_persen = "%".$cari."%";

		if(!is_null($idachv)){ //SEARCH BY ACHIVEMENT
			$sql = "SELECT idachievement, achievement.idteam, achievement.name as achievementName, date, description, team.name as teamName 
				FROM achievement INNER JOIN team ON achievement.idteam = team.idteam WHERE achievement.idachievement=?";

			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("i", $idachv);

		} else if(!is_null($idteam)){ //SEARCH BY TEAM
			if(is_null($limit)){
				$sql = "SELECT idachievement, achievement.idteam, achievement.name as achievementName, date, description, team.name as teamName, team.idgame as gameID FROM achievement 
						INNER JOIN team ON achievement.idteam = team.idteam WHERE achievement.name Like ? AND achievement.idteam = ?;";

				$stmt = $this->conn->prepare($sql);
				$stmt -> bind_param("si", $cari_persen, $idteam);
			} else{
				$sql = "SELECT idachievement, achievement.idteam, achievement.name as achievementName, date, description, team.name as teamName, team.idgame as gameID FROM achievement 
						INNER JOIN team ON achievement.idteam = team.idteam WHERE achievement.name Like ? AND achievement.idteam = ? Limit ?,?;";

				$stmt = $this->conn->prepare($sql);
				$stmt -> bind_param("siii", $cari_persen, $idteam, $offset, $limit);
			}

		}else{
			if(is_null($limit)){
				$sql = "SELECT idachievement, achievement.idteam, achievement.name as achievementName, date, description, team.name as teamName, team.idgame as gameID FROM achievement 
						INNER JOIN team ON achievement.idteam = team.idteam WHERE achievement.name Like ?;";

				$stmt = $this->conn->prepare($sql);
				$stmt -> bind_param("s", $cari_persen);
			} else{
				$sql = "SELECT idachievement, achievement.idteam, achievement.name as achievementName, date, description, team.name as teamName, team.idgame as gameID FROM achievement 
						INNER JOIN team ON achievement.idteam = team.idteam WHERE achievement.name Like ? Limit ?,?;";

				$stmt = $this->conn->prepare($sql);
				$stmt -> bind_param("sii", $cari_persen, $offset, $limit);
			}
		}
		$stmt->execute();
		$res = $stmt->get_result();

		return $res; 
	} 

	public function getTeamAchv($idteam, $offset=null, $limit=null){ //WIP
		$sql = "SELECT idachievement, achievement.idteam, achievement.name as achievementName, date, description, team.name as teamName 
				FROM achievement INNER JOIN team ON achievement.idteam = team.idteam WHERE achievement.idteam=? Limit ?,?;";

		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("iii", $idteam, $offset, $limit);
		$stmt->execute();
		$res = $stmt->get_result();

		return $res; 
	}

	public function insertAchv($idteam, $name, $date, $desc){
		$sql = "INSERT INTO achievement (idteam, name, date, description) VALUES (?,?,?,?);";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("isss", $idteam, $name, $date, $desc);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}

	public function updateAchv($idteam, $name, $date, $desc, $idachv)
	{
		$sql = "UPDATE achievement SET idteam=?, name=?, date =?, description=? WHERE achievement.idachievement=?;";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("isssi", $idteam, $name, $date, $desc, $idachv);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}

	public function deleteAchv($idachv){
		$sql = "DELETE FROM achievement WHERE achievement.idachievement = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("i", $idachv);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}
}

?>