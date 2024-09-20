	<?php
	$conn = new mysqli("localhost", "root", "", "fspproject");
	if ($conn->connect_errno) {
    	die("Failed to connect to MySQL: " . $conn->connect_error);
	}

	// Fungsi untuk dekripsi password
	function decryptAES($data, $key)
{
    // Definisikan metode dan kunci
    $method = 'AES-128-ECB';
    $key = substr($key, 0, 16); // Kunci harus 16 byte untuk AES-128
    // Mendekode data yang dienkripsi dari format base64
    $decodedData = base64_decode($data);
    // Melakukan dekripsi menggunakan OpenSSL
    $decrypted = openssl_decrypt($decodedData, $method, $key, OPENSSL_RAW_DATA);
    // Kembalikan data yang sudah didekripsi
    return $decrypted;
	}
	?>
