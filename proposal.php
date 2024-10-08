<?php
require_once("parent.php");

class Proposal extends ParentClass{
	public function __construct(){
		parent::__construct();
	}

	public function getProposal($cari="", $offset=null, $limit=null){ //NOT YET
		$cari_persen = "%".$cari."%";

		if(is_null($limit)){
			$sql = "SELECT idjoin_proposal, join_proposal.idmember, join_proposal.idteam, description, fname, username, lname, team.name, status FROM join_proposal INNER JOIN member ON join_proposal.idmember = member.idmember INNER JOIN team ON join_proposal.idteam = team.idteam ORDER BY idjoin_proposal DESC WHERE username Like ?;";

			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("s", $cari_persen);
		} else{
			$sql = "SELECT idjoin_proposal, join_proposal.idmember, join_proposal.idteam, description, fname, username, lname, team.name, status FROM join_proposal INNER JOIN member ON join_proposal.idmember = member.idmember INNER JOIN team ON join_proposal.idteam = team.idteam ORDER BY idjoin_proposal DESC WHERE username Like ? Limit ?,?;";

			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("sii", $cari_persen, $offset, $limit);
		}
		$stmt->execute();
		$res = $stmt->get_result();

		return $res; 
	} 

	public function insertProposal($idmember, $idteam, $desc, $status){
		$sql = "INSERT INTO join_proposal (idmember, idteam, description, status) VALUES (?,?,?,'waiting');";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("iiss", $idmember, $idteam, $desc, $status);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}

	public function updateProposal($status, $idproposal, $idteam, $idmember, $description)
	{
		$sql = "UPDATE join_proposal SET status=? WHERE join_proposal.idjoin_proposal = ?;";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("si", $status, $idproposal);
		
		$stmt->execute();
		$res = $stmt->get_result();

		//INSERT THE APPROVED INTO TEAM MEMBER
		if($status == "approved"){ //TRY TO FIND A WAY TO JUST THROW TO INSERTPROCESS
			$sql = "INSERT INTO team_members (idteam, idmember, description) VALUES (?,?,?);";
			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("iis", $idteam, $idmember, $description);
		
			$stmt->execute();
			$res = $stmt->get_result();
		}
	}

	public function deleteProposal($idproposal){
		$sql = "DELETE FROM join_proposal WHERE idjoin_proposal = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("i", $idproposal);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}
}

?>