<?php
require_once("parent.php");

class teamMember extends ParentClass{
	public function __construct(){
		parent::__construct();
	}

	public function getTeamMember($idteam, $cari="", $offset=null, $limit=null){
		$cari_persen = "%".$cari."%";

		if(is_null($limit)){
			$sql = "SELECT team_members.idteam, team_members.idmember, description, fname, lname, username 
			FROM team_members INNER JOIN member ON team_members.idmember = member.idmember 
			WHERE team_members.idteam = ? AND username LIKE ?;";

			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("is", $idteam, $cari_persen);
		} else{
			$sql = "SELECT team_members.idteam, team_members.idmember, description, fname, lname, username 
			FROM team_members INNER JOIN member ON team_members.idmember = member.idmember 
			WHERE team_members.idteam = ? AND username LIKE ? Limit ?,?;";

			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("isii", $idteam, $cari_persen, $offset, $limit);
		}
		$stmt->execute();
		$res = $stmt->get_result();

		return $res; 
	} 

	public function insertTeamMember($idteam, $idmember, $desc){
		$sql = "INSERT INTO team_members (idteam, idmember, description) VALUES (?,?,?);";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("iis", $idteam, $idmember, $desc);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}

	public function updateTeamMember($desc, $idmember, $idteam)
	{
		$sql = "UPDATE team_members SET description=? WHERE team_members.idmember=? AND team_members.idteam=?;";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("sii", $desc, $idmember, $idteam);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}

	public function deleteTeamMember($idmember, $idteam){
		$sql = "DELETE FROM team_members WHERE team_members.idmember = ? AND team_members.idteam = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("ii", $idmember, $idteam);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}
}

?>