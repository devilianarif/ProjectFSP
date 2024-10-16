<?php
require_once("parent.php");
require_once("teamMember.php");

class Proposal extends ParentClass{
	public function __construct(){
		parent::__construct();
	}

	public function getProposal($cari="", $offset=null, $limit=null, $idmember=null, $status=null){
		$cari_persen = "%".$cari."%";

		if(!is_null($idmember)){ //SEARCH BY ID
			if(is_null($limit)){
				$sql = "SELECT idjoin_proposal, join_proposal.idmember, join_proposal.idteam, description, fname, username, lname, team.name, status FROM join_proposal INNER JOIN member ON join_proposal.idmember = member.idmember INNER JOIN team ON join_proposal.idteam = team.idteam WHERE join_proposal.idmember = ? AND team.name Like ? AND status = ? ORDER BY idjoin_proposal DESC;";

				$stmt = $this->conn->prepare($sql);
				$stmt -> bind_param("iss", $idmember, $cari_persen, $status);
			} else{
				$sql = "SELECT idjoin_proposal, join_proposal.idmember, join_proposal.idteam, description, fname, username, lname, team.name, status FROM join_proposal INNER JOIN member ON join_proposal.idmember = member.idmember INNER JOIN team ON join_proposal.idteam = team.idteam WHERE join_proposal.idmember = ? AND team.name Like ? AND status = ? ORDER BY idjoin_proposal DESC Limit ?,?;";

				$stmt = $this->conn->prepare($sql);
				$stmt -> bind_param("issii", $idmember, $cari_persen, $status, $offset, $limit);
			}

		} else if($status == 'waiting' ||  $status == 'approved' || $status == 'rejected') { //SEARCH BY STATUS			
			if(is_null($limit)){
				$sql = "SELECT idjoin_proposal, join_proposal.idmember, join_proposal.idteam, description, fname, username, lname, team.name, status FROM join_proposal INNER JOIN member ON join_proposal.idmember = member.idmember INNER JOIN team ON join_proposal.idteam = team.idteam WHERE username Like ? AND status = ? ORDER BY idjoin_proposal DESC;";

				$stmt = $this->conn->prepare($sql);
				$stmt -> bind_param("ss", $cari_persen, $status);
			} else{
				$sql = "SELECT idjoin_proposal, join_proposal.idmember, join_proposal.idteam, description, fname, username, lname, team.name, status FROM join_proposal INNER JOIN member ON join_proposal.idmember = member.idmember INNER JOIN team ON join_proposal.idteam = team.idteam WHERE username Like ? AND status = ? ORDER BY idjoin_proposal DESC Limit ?,?;";

				$stmt = $this->conn->prepare($sql);
				$stmt -> bind_param("ssii", $cari_persen, $status, $offset, $limit);
			}

		}else{
			if(is_null($limit)){
				$sql = "SELECT idjoin_proposal, join_proposal.idmember, join_proposal.idteam, description, fname, username, lname, team.name, status FROM join_proposal INNER JOIN member ON join_proposal.idmember = member.idmember INNER JOIN team ON join_proposal.idteam = team.idteam WHERE username Like ? ORDER BY idjoin_proposal DESC;";

				$stmt = $this->conn->prepare($sql);
				$stmt -> bind_param("s", $cari_persen);
			} else{
				$sql = "SELECT idjoin_proposal, join_proposal.idmember, join_proposal.idteam, description, fname, username, lname, team.name, status FROM join_proposal INNER JOIN member ON join_proposal.idmember = member.idmember INNER JOIN team ON join_proposal.idteam = team.idteam WHERE username Like ? ORDER BY idjoin_proposal DESC Limit ?,? ;";

				$stmt = $this->conn->prepare($sql);
				$stmt -> bind_param("sii", $cari_persen, $offset, $limit);
			}
		}
		$stmt->execute();
		$res = $stmt->get_result();
		return $res; 
	} 

	public function insertProposal($idmember, $idteam, $desc){
		$sql = "INSERT INTO join_proposal (idmember, idteam, description, status) VALUES (?,?,?,'waiting');";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("iis", $idmember, $idteam, $desc);
		
		$stmt->execute();
	}

	public function updateProposal($status, $idproposal, $idteam, $idmember, $description)
	{
		$message = "";
		$teamMember =  new teamMember();
		$check = $teamMember->getTeamMember($idteam, null, null, null, $idmember)->fetch_assoc();
		if(isset($check) && $status == "approved"){
			$status = "rejected";

			$sql = "UPDATE join_proposal SET status=? WHERE join_proposal.idjoin_proposal = ?;";
			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("si", $status, $idproposal);
			$message = "Member was already in the team, proposal rejected";
		} else{
			$sql = "UPDATE join_proposal SET status=? WHERE join_proposal.idjoin_proposal = ?;";
			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("si", $status, $idproposal);

			//INSERT THE APPROVED INTO TEAM MEMBER
			if($status == "approved"){
				echo $teamMember->insertTeamMember($idteam, $idmember, $description);
			}
		}
		$stmt->execute();
		$res = $stmt->get_result();

		return $message;
	}

	public function deleteProposal($idproposal){
		$sql = "DELETE FROM join_proposal WHERE idjoin_proposal = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("i", $idproposal);
		
		$stmt->execute();
	}
}

?>