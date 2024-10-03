<?php
require_once("data.php");

class ParentClass
{
	protected $conn
	function __construct()
	{
		$this->$conn = new mysqli("SERVER_NAME", "USER_NAME", "PASSWORD", "DB_NAME");
		if ($conn->connect_errno) {
    		die("Failed to connect to MySQL: " . $conn->connect_error);
		}
	}


	function decryptAES($data, $key)
	{
	    $method = 'AES-128-ECB'; // Definisikan metode dan kunci
	    $key = substr($key, 0, 16); // Kunci harus 16 byte untuk AES-128
	    $decodedData = base64_decode($data); // Mendekode data yang dienkripsi dari format base64  
	    $decrypted = openssl_decrypt($decodedData, $method, $key, OPENSSL_RAW_DATA); // Melakukan dekripsi menggunakan OpenSSL
	    return $decrypted;  // Kembalikan data yang sudah didekripsi
	}
}

?>