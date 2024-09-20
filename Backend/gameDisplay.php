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
	<title>Admin Game Display</title>
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
		<th colspan=3>Games</th>
		<td> <form action='gameDisplay.php' method='POST'>
		<input type='hidden' name='action' value= 'add'>
		<button type='submit'>Tambah Data</button> </form> </td>
	</tr>
	<tr> 
		<th>Name</th> 
		<th>Description</th> 
		<th colspan=2>Aksi</th>
	</tr>";

	$sql = "SELECT * from game";	//SELECT ALL FROM GAME
	
	$games = querry($conn, $sql); 
	while($gameRow = $games->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $gameRow['name']. "</td>";
		echo "<td>". $gameRow['description']. "</td>";

		//UPDATE
		echo "<td> <form action='gameDisplay.php' method='POST'>
			<input type='hidden' name='action' value= 'edit'>
			<input type='hidden' name='idgame' value='".htmlspecialchars($gameRow['idgame'])."'>
			<button type='submit'>Edit Data</button> </form> </td>";

		//DELETE
		echo "<td> <form action='deleteProcess.php' method='POST'>
			<input type='hidden' name='idgame' value='".htmlspecialchars($gameRow['idgame'])."'>
			<input type='hidden' name='inputTable' value='game'>
			<button type='submit'>Hapus Data</button> </form> </td> </tr>";
	}
	echo "</table>" ;

?>

<p><a href="adminMain.php">Back to Admin Page</a></p>
<br>

<div>
	<?php
		$editName;
		$editDesc;

		if(isset($_POST["action"])){
			if($_POST["action"] == "add"){
				echo "<form action='insertProcess.php' method='POST' enctype='multipart/form-data'>";
				echo "<label>ADD GAME TO TABLE</label>";
			} else{
				echo "<form action='editProcess.php' method='POST' enctype='multipart/form-data'>";
				echo "<label>EDIT SELECTED GAME</label>";
				echo "<input type='hidden' name='idgame' value='".$_POST['idgame']."'>"; //ID GAME

				$sql = "SELECT * from game where game.idgame=?"; 
				$editedGame = querry($conn, $sql, [$_POST['idgame']], 'i');

				$edited = $editedGame->fetch_assoc();
				$editName = htmlspecialchars($edited["name"]);
				$editDesc = htmlspecialchars($edited["description"]);
			}
					
			echo "<input type='hidden' name='inputTable' value='game'>"; //IDENTIFIER

			if($_POST["action"] == "add"){
				echo "<p><label>Game Name:</label> <input type='text' name='name' required>";
				echo "<p><label>Game Description:</label> <input type='text' name='desc'>";
			} else{
				echo "<p><label>Game Name:</label> <input type='text' name='name' value='".$editName."'' required>";
				echo "<p><label>Game Description:</label> <input type='text' name='desc' value='".$editDesc."''>";
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