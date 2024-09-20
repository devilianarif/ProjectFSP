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
	<title>Admin Team Display</title>
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


	//TEAM	
	echo "<table border='1'>
	<tr>
		<th colspan=3>Team</th>

		<td> <form action='teamDisplay.php' method='POST'>
		<input type='hidden' name='action' value= 'add'>
		<button type='submit'>Tambah Data</button> </form> </td>

	</tr>
	<tr> 
		<th>Game</th> 
		<th>Name</th> 
		<th colspan=2>Aksi</th>
	</tr>";

	$sql = "SELECT idteam, team.idgame, team.name as teamname, game.name as gamename 
	from team INNER JOIN game ON team.idgame = game.idgame;";	//SELECT JOINED TABLE
	
	$teams = querry($conn, $sql); 
	while($teamRow = $teams->fetch_assoc()) {
	echo "<tr>";
		echo "<td>".htmlspecialchars($teamRow['gamename'])."</td>" ;
		echo "<td> <a href=memberDisplay.php?idteam=".htmlspecialchars($teamRow['idteam']).">" . $teamRow['teamname']. "</a></td>";

		//UPDATE
		echo "<td> <form action='teamDisplay.php' method='POST'>
			<input type='hidden' name='action' value= 'edit'>
			<input type='hidden' name='idteam' value= '".htmlspecialchars($teamRow['idteam'])."'>
			<button type='submit'>Edit Data</button> </form> </td>";

		//DELETE
		echo "<td> <form action='deleteProcess.php' method='POST'>
			<input type='hidden' name='idteam' value= '".htmlspecialchars($teamRow['idteam'])."'>
			<input type='hidden' name='inputTable' value='team'>
			<button type='submit'>Hapus Data</button> </form> </td> </tr>";
	}
	echo "</table>" ;

?>

<p><a href="adminMain.php">Back to Admin Page</a></p>
<br>

<div>
	<?php
		$editName;
		$editIDGame;

		if(isset($_POST["action"])){			
			if($_POST["action"] == "add"){
				echo "<form action='insertProcess.php' method='POST' enctype='multipart/form-data'>";
				echo "<label>ADD TEAM TO TABLE</label>";
			} else{
				echo "<form action='editProcess.php' method='POST' enctype='multipart/form-data'>";
				echo "<label>EDIT SELECTED TEAM</label>";
				echo "<input type='hidden' name='idteam' value='".$_POST['idteam']."'>"; //ID TEAM

				$sql = "SELECT * from team where team.idteam=?"; 
				$editedTeam = querry($conn, $sql, [$_POST['idteam']], 'i');

				$edited = $editedTeam->fetch_assoc();
				$editName = htmlspecialchars($edited["name"]);
				$editIDGame = htmlspecialchars($edited["idgame"]);
			}
					
			echo "<input type='hidden' name='inputTable' value='team'>"; //IDENTIFIER

			echo "<p><label>Game: </label></p>";
			$gameQuerry = querry($conn, "SELECT * from game"); //SHOW GAME NAMES
			echo "<select name=game>";

			while ($games=$gameQuerry->fetch_assoc()) {
				if($editIDGame == htmlspecialchars($games['idgame'])){
					echo "<option value=".htmlspecialchars($games['idgame'])." selected>".htmlspecialchars($games['name'])."</option>";
				} else{
					echo "<option value=".htmlspecialchars($games['idgame']).">".htmlspecialchars($games['name'])."</option>";
				}	
			}
			echo "</select></p>";
			
			if($_POST["action"] == "add"){
				echo "<p><label>Team Name:</label> <input type='text' name='name' required>";
			} else{
				echo "<p><label>Team Name:</label> <input type='text' name='name' value='".$editName."'' required>";
			}
			
			echo "<button type='submit'>Save</button></p>
			</form>";

			/* close connection */
			$conn->close(); 
		}
	?>
</div>


</body>
</html>