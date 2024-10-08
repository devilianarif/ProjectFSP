<?php

class Member extends ParentClass{
	public function __construct(){
		parent::__construct();
	}

	public function getMember($cari="", $offset=null, $limit=null){
		$cari_persen = "%".$cari."%";

		if(is_null($limit)){
			$sql = "SELECT * FROM member WHERE username Like ?;";

			$stmt = $this->mysqli->prepare($sql);
			$stmt -> bind_param("s", $cari_persen);
		} else{
			$sql = "SELECT * FROM member WHERE username Like ? Limit ?,?;";

			$stmt = $mysqli->prepare($sql);
			$stmt -> bind_param("sii", $cari_persen, $offset, $limit);
		}
		$stmt->execute();
		$res = $stmt->get_result();

		return $res; 
	} 

	public function insertMember($fname, $lname, $username, $password){
		$sql = "INSERT INTO member (fname, lname, username, password, profile) VALUES (?,?,?,?, 'member');";
		$stmt = $this->mysqli->prepare($sql);
		$stmt -> bind_param("ssss", $fname, $lname, $username, $password);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}

	public function updateMember($fname, $lname, $username, $password, $idmember)
	{
		$sql = "UPDATE member SET fname=?, lname =?, username=?, password=? WHERE member.idmember=?;";
		$stmt = $this->mysqli->prepare($sql);
		$stmt -> bind_param("ssssi", $fname, $lname, $username, $password, $idmember);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}

	public function deleteMember($idmember){
		$sql = "DELETE FROM member WHERE idmember=?;";
		$stmt = $this->mysqli->prepare($sql);
		$stmt -> bind_param("i", $idmember);
		
		$stmt->execute();
		$res = $stmt->get_result();
	}
}

?>
