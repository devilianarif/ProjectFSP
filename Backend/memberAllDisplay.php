<!DOCTYPE html>

<?php
	$conn = new mysqli("localhost", "root", "", "fspproject");
	if ($conn->connect_errno) {
    	die("Failed to connect to MySQL: " . $conn->connect_error);
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All Member Display</title>
</head>
<body>

<?php //TABLE DISPLAY
	//FUNCTIONS
	function querry($conn, $sql, $params = [], $param_types = ''){
		$stmt = $conn->prepare($sql);
		if ($params) {
        	$stmt->bind_param($param_types, ...$params);
    	}
		$stmt->execute();
		$res = $stmt->get_result();
		$stmt->close();
		return $res;
	}


	//GAME
	echo "<table border='1'>
	<tr>
		<th colspan=3> All Members </th>
	</tr>
	<tr> 
		<th>Member Name</th>
		<th>Userame</th>
		<th>Profile</th> 
	</tr>";

	$sql = "SELECT * FROM member;"; //GET MEMBERS
	$members = querry($conn, $sql);
	while($memberRow = $members->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $memberRow['fname']." ".$memberRow['lname'] ."</td>";
		echo "<td>". $memberRow['username'] ."</td>";
		echo "<td>". $memberRow['profile']. "</td></tr>";
	}
	echo "</table>" ;

?>

<p><a href="adminMain.php">Back to Admin Page</a></p>
</body>
</html>