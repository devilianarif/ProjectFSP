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


	//EVENT DETAIL
	$sql = "SELECT name, date FROM event WHERE event.idevent = ?;"; //GET EVENT NAME
	$event = querry($conn, $sql, [$_GET['idevent']], 'i');
	$eventDet = $event->fetch_assoc();

	echo "<table border='1'>
	<tr>
		<th colspan=2>".$eventDet['name']."</th>

		<td> <form action='eventDisplay.php?idevent=".$_GET['idevent']."' method='POST'>
		<input type='hidden' name='action' value= 'add'>
		<button type='submit'>Tambah Team</button> </form> </td>
	</tr>
	<tr> 
		<th>Date</th>
		<th>Team</th> 
		<th>Aksi</th>
	</tr>";

	$sql = "SELECT idevent, event_teams.idteam, team.name FROM event_teams INNER JOIN team 
	ON event_teams.idteam = team.idteam WHERE event_teams.idevent=?;";	//SELECT JOINED TABLE

	$events = querry($conn, $sql, [$_GET['idevent']], 'i');

	$sql = "SELECT COUNT(*) as total FROM event_teams WHERE event_teams.idevent=?;";
	$totalQuerry = querry($conn, $sql  , [$_GET['idevent']], 'i');
	$total = $totalQuerry->fetch_assoc()["total"];

	$index = 0;
	while($eventsRow = $events->fetch_assoc()) {
		echo "<tr>";
		if($index == 0){echo "<td rowspan=".$total.">". $eventDet['date']."</td>";} //BUG HERE
		echo "<td>". $eventsRow['name']. "</td>";
		$index += 1;

		//DELETE
		echo "<td> <form action='deleteProcess.php' method='POST'>
			<input type='hidden' name='inputTable' value='eventParticipant'>
			<input type='hidden' name='idteam' value= '".htmlspecialchars($eventsRow['idteam'])."'>
			<input type='hidden' name='idevent' value= '".$_GET['idevent']."'>
			<button type='submit'>Keluarkan</button> </form> </td> </tr>";
	}
	echo "</table>" ;

?>

<p><a href="eventListDisplay.php">Back to Event Page</a></p>
<br>

<div>
	<?php
		if(isset($_POST["action"])){
			echo "<form action='insertProcess.php' method='POST' enctype='multipart/form-data'>";

			echo "<input type='hidden' name='idevent' value='".$_GET['idevent']."'>"; //ID EVENT
			echo "<input type='hidden' name='inputTable' value='eventParticipant'>"; //IDENTIFIER

			echo "<label>ADD TEAM TO EVENT</label>";

			echo "<p><label>Team: </label>";
			$teamQuerry = querry($conn, "SELECT idteam, name from team"); //SHOW TEAM NAMES
			echo "<select name=team>";
			while ($teams=$teamQuerry->fetch_assoc()) {
				echo "<option value=".htmlspecialchars($teams['idteam']).">".htmlspecialchars($teams['name'])."</option>";
			}
			echo "</select></p>";

			echo "<p><button type='submit'>Save</button></p>
			</form>";

			/* close connection */
			$conn->close(); 
		}
	?>
</div>


</body>
</html>