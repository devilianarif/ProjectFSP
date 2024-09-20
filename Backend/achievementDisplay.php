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
	<title>Admin Event Display</title>
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
		<th colspan=5>Achievements</th>

		<td> <form action='achievementDisplay.php' method='POST'>
		<input type='hidden' name='action' value= 'add'>
		<button type='submit'>Tambah Data</button> </form> </td>
	<tr> 
		<th>Achievement</th>
		<th>Date Recieved</th>
		<th>Team Name</th>
		<th>Description</th> 
		<th colspan=2>Aksi</th>
	</tr>";

	$sql = "SELECT idachievement, achievement.idteam, achievement.name as achievementName, date, description, team.name as teamName FROM achievement 
	INNER JOIN team ON achievement.idteam = team.idteam;"; //GET ACHIV NAME

	$achievements = querry($conn, $sql);
	while($acvRow = $achievements->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $acvRow['achievementName']."</td>";
		echo "<td>". $acvRow['date']."</td>";
		echo "<td>". $acvRow['teamName']."</td>";
		echo "<td>". $acvRow['description']. "</td>";

		//UPDATE
		echo "<td> <form action='achievementDisplay.php' method='POST'>
			<input type='hidden' name='action' value= 'edit'>
			<input type='hidden' name='idachv' value= '".htmlspecialchars($acvRow['idachievement'])."'>
			<button type='submit'>Edit Data</button> </form> </td>";

		//DELETE
		echo "<td> <form action='deleteProcess.php' method='POST'>
			<input type='hidden' name='idachv' value='".htmlspecialchars($acvRow['idachievement'])."'>
			<input type='hidden' name='inputTable' value='achievement'>
			<button type='submit'>Hapus Data</button> </form> </td> </tr>";
	}
	echo "</table>" ;

?>

<p><a href="adminMain.php">Back to Admin Page</a></p>
<br>

<div>
	<?php
		$editName;
		$editDate;
		$editTeam;
		$editDesc;

		if(isset($_POST["action"])){
			if(isset($_POST["action"])){
			if($_POST["action"] == "add"){
				echo "<form action='insertProcess.php' method='POST' enctype='multipart/form-data'>";
				echo "<label>ADD ACHIEVEMENT TO TABLE</label>";
			} else{
				echo "<form action='editProcess.php' method='POST' enctype='multipart/form-data'>";
				echo "<label>EDIT SELECTED ACHIEVEMENT</label>";
				echo "<input type='hidden' name='idachv' value='".$_POST['idachv']."'>"; //ID ACHIEVEMENT

				$sql = "SELECT idachievement, achievement.idteam, achievement.name as achievementName, date, description, team.name as teamName 
				FROM achievement INNER JOIN team ON achievement.idteam = team.idteam WHERE achievement.idachievement=?;"; 
				$editedGame = querry($conn, $sql, [$_POST['idachv']], 'i');

				$edited = $editedGame->fetch_assoc();
				$editName = htmlspecialchars($edited["achievementName"]);
				$editDate = htmlspecialchars($edited["date"]);
				$editTeam = htmlspecialchars($edited["teamName"]);
				$editDesc = htmlspecialchars($edited["description"]);
			}
					
			echo "<input type='hidden' name='inputTable' value='achievement'>"; //IDENTIFIER

			if($_POST["action"] == "add"){
				echo "<p><label>Achievement Name:</label> <input type='text' name='name' required></p>";
				echo "<p><label>Date Recieved:</label> <input type='date' name='date' required></p>";
			} else{
				echo "<p><label>Achievement Name:</label> <input type='text' name='name' value='".$editName."' required></p>";
				echo "<p><label>Date Recieved:</label> <input type='date' name='date' value='".$editDate."' required></p>"; 
			}

			echo "<p><label>Team: </label>";
			$teamQuerry = querry($conn, "SELECT idteam, name from team"); //SHOW team NAMES
			echo "<select name=team>";

			while ($teams=$teamQuerry->fetch_assoc()) {
				if($editIDteam == htmlspecialchars($teams['idteam'])){
					echo "<option value=".htmlspecialchars($teams['idteam'])." selected>".htmlspecialchars($teams['name'])."</option>";
				} else{
					echo "<option value=".htmlspecialchars($teams['idteam']).">".htmlspecialchars($teams['name'])."</option>";
				}	
			} 
			echo "</select></p>";

			if($_POST["action"] == "add"){
				echo "<p><label>Description:</label> <input type='text' name='desc'></p>";
			} else{
				echo "<p><label>Description:</label> <input type='text' name='desc' value='".$editDesc."''></p>";
			}
			
			echo "<button type='submit'>Save</button></p>
			</form>";

			/* close connection */
			$conn->close(); 
		}}
	?>
</div>
</body>
</html>