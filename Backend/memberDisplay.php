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
	<title>Admin Member Display</title>
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
	$sql = "SELECT name FROM team WHERE team.idteam = ?;"; //GET TEAM NAME
	$team = querry($conn, $sql, [$_GET['idteam']], 'i');
	$name = $team->fetch_assoc();

	echo "<table border='1'>
	<tr>
		<th colspan=4>".$name['name']."</th>
	</tr>
	<tr> 
		<th>Member Name</th>
		<th>Description</th> 
		<th colspan=2>Aksi</th>
	</tr>";

	$sql = "SELECT team_members.idteam, team_members.idmember, description, fname, lname, username 
	FROM team_members INNER JOIN member ON team_members.idmember = member.idmember WHERE team_members.idteam = ?;";	//SELECT JOINED TABLE

	$members = querry($conn, $sql, [$_GET['idteam']], 'i');
	while($memberRow = $members->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $memberRow['fname'].' "'.$memberRow['username'].'" '.$memberRow['lname'] ."</td>";
		echo "<td>". $memberRow['description']. "</td>";

		//UPDATE
		echo "<td> <form action='memberDisplay.php?idteam=".$_GET['idteam']."' method='POST'>
			<input type='hidden' name='action' value= 'edit'>
			<input type='hidden' name='idmember' value= '".htmlspecialchars($memberRow['idmember'])."'>
			<button type='submit'>Edit Data</button> </form> </td>";

		//DELETE
		echo "<td> <form action='deleteProcess.php' method='POST'>
			<input type='hidden' name='idmember' value= '".htmlspecialchars($memberRow['idmember'])."'>
			<input type='hidden' name='team' value= '".$_GET['idteam']."'>
			<input type='hidden' name='inputTable' value='member'>
			<button type='submit'>Keluarkan</button> </form> </td> </tr>";
	}
	echo "</table>" ;

?>

<p><a href="teamDisplay.php">Back to Team Page</a></p>
<br>

<div>
	<?php
		$editName;
		$editDesc;

		if(isset($_POST["action"])){
			echo "<form action='editProcess.php' method='POST' enctype='multipart/form-data'>";

			echo "<input type='hidden' name='idmember' value='".$_POST['idmember']."'>"; //ID MEMBER
			echo "<input type='hidden' name='idteam' value='".$_GET['idteam']."'>"; //ID TEAM
			echo "<input type='hidden' name='inputTable' value='member'>"; //IDENTIFIER

			$sql = "SELECT description, fname, lname, username 
			FROM team_members INNER JOIN member ON team_members.idmember = member.idmember WHERE team_members.idmember = ?;";	//SELECT JOINED TABLE

			$member = querry($conn, $sql, [$_POST['idmember']], 'i');
			$edited = $member->fetch_assoc();
			echo "<label>EDIT ". $edited['fname'].' "'.$edited['username'].'" '.$edited['lname'] ."</label>";
			$editDesc = htmlspecialchars($edited["description"]);

			echo "<p><label>Description:</label> <input type='text' name='desc' value='".$editDesc."'' required>";
			
			echo "<button type='submit'>Save</button></p>
			</form>";

			/* close connection */
			$conn->close(); 
		}
	?>
</div>


</body>
</html>