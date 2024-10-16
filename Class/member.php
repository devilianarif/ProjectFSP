<?php
require_once("parent.php");

class Member extends ParentClass{
	public function __construct(){
		parent::__construct();
	}

	public function getMember($cari="", $offset=null, $limit=null, $idmember=null){
		$cari_persen = "%".$cari."%";

		if(!is_null($idmember)){
			$sql = "SELECT * FROM member WHERE idmember = ?;";

			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("i", $idmember);
		} else {
			if(is_null($limit)){
				$sql = "SELECT * FROM member WHERE username Like ?;";

				$stmt = $this->conn->prepare($sql);
				$stmt -> bind_param("s", $cari_persen);
			} else{
				$sql = "SELECT * FROM member WHERE username Like ? Limit ?,?;";

				$stmt = $this->conn->prepare($sql); 
				$stmt -> bind_param("sii", $cari_persen, $offset, $limit);
			}
		}
		$stmt->execute();
		$res = $stmt->get_result();

		return $res; 
	} 

	public function insertMember($fname, $lname, $username, $password){
		$sql = "SELECT username FROM member WHERE username=?";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("s", $username);
		$stmt->execute();
		$user = $stmt->get_result()->fetch_assoc();
		$pesan = "pesan";

		if(!isset($user)){
			$encryptedPassword = base64_encode(openssl_encrypt($password, 'AES-128-ECB', "Devilianarif0757", OPENSSL_RAW_DATA));

			$sql = "INSERT INTO member (fname, lname, username, password, profile) VALUES (?,?,?,?, 'member');";
			$stmt = $this->conn->prepare($sql);
			$stmt -> bind_param("ssss", $fname, $lname, $username, $encryptedPassword);

			if($stmt->execute()){
				$pesan = "registrasi_sukses";
			}else{
				$pesan = "gagal";
			}
		} else{
			$pesan = "username_terpakai";
		}
		return $pesan;
	}

	public function updateMember($fname, $lname, $username, $password, $idmember){
		$sql = "UPDATE member SET fname=?, lname =?, username=?, password=? WHERE member.idmember=?;";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("ssssi", $fname, $lname, $username, $password, $idmember);
		
		$stmt->execute();
	}

	public function deleteMember($idmember){
		$sql = "DELETE FROM member WHERE idmember=?;";
		$stmt = $this->conn->prepare($sql);
		$stmt -> bind_param("i", $idmember);
		
		$stmt->execute();
	}

	public function login($username, $password) {
        $encryptedPassword = base64_encode(openssl_encrypt($password, 'AES-128-ECB', "Devilianarif0757", OPENSSL_RAW_DATA));

        $sql = "SELECT * FROM member WHERE username=? AND password =?";
        $stmt = $this->conn->prepare($sql);
        $stmt -> bind_param("ss", $username, $encryptedPassword);
        
        $stmt->execute();
        $res = $stmt->get_result();
        
        $logged = $res->fetch_assoc(); 
        $idLogged = $logged['idmember'];
        
        return $idLogged;
    }
}

?>