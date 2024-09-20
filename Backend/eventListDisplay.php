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
	<title>Admin Event List Display</title>
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
		<th colspan=4>Events</th>

		<td> <form action='eventListDisplay.php' method='POST'>
		<input type='hidden' name='action' value= 'add'>
		<button type='submit'>Tambah Data</button> </form> </td>
	<tr> 
		<th>Event Name</th>
		<th>Date</th>
		<th>Description</th> 
		<th colspan=2>Aksi</th>
	</tr>";

	$sql = "SELECT * FROM event;"; //GET EVENTS

	$events = querry($conn, $sql);
	while($eventsRow = $events->fetch_assoc()) {
		echo "<tr>";
		echo "<td> <a href=eventDisplay.php?idevent=".htmlspecialchars($eventsRow['idevent']).">" . $eventsRow['name']. "</a></td>";
		echo "<td>". $eventsRow['date']."</td>";
		echo "<td>". $eventsRow['description']. "</td>";

		//UPDATE
		echo "<td> <form action='eventListDisplay.php' method='POST'>
			<input type='hidden' name='action' value= 'edit'>
			<input type='hidden' name='idevent' value= '".htmlspecialchars($eventsRow['idevent'])."'>
			<button type='submit'>Edit Data</button> </form> </td>";

		//DELETE
		echo "<td> <form action='deleteProcess.php' method='POST'>
			<input type='hidden' name='inputTable' value='eventList'>
			<input type='hidden' name='idevent' value='".htmlspecialchars($eventsRow['idevent'])."'>
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
		$editDesc;

		if(isset($_POST["action"])){
			if(isset($_POST["action"])){
			if($_POST["action"] == "add"){
				echo "<form action='insertProcess.php' method='POST' enctype='multipart/form-data'>";
				echo "<label>ADD EVENT TO TABLE</label>";
			} else{
				echo "<form action='editProcess.php' method='POST' enctype='multipart/form-data'>";
				echo "<label>EDIT SELECTED EVENT</label>";
				echo "<input type='hidden' name='idevent' value='".$_POST['idevent']."'>"; //ID EVENT

				$sql = "SELECT * FROM event WHERE event.idevent=?;"; 
				$edited = querry($conn, $sql, [$_POST['idevent']], 'i');

				$edited = $edited->fetch_assoc();
				$editName = htmlspecialchars($edited["name"]);
				$editDate = htmlspecialchars($edited["date"]);
				$editDesc = htmlspecialchars($edited["description"]);
			}
					
			echo "<input type='hidden' name='inputTable' value='eventList'>"; //IDENTIFIER

			if($_POST["action"] == "add"){
				echo "<p><label>Event Name:</label> <input type='text' name='name' required></p>";
				echo "<p><label>Date:</label> <input type='date' name='date' required></p>";
				echo "<p><label>Description:</label> <input type='text' name='desc'></p>";
			} else{
				echo "<p><label>Event Name:</label> <input type='text' name='name' value='".$editName."' required></p>";
				echo "<p><label>Date:</label> <input type='date' name='date' value='".$editDate."' required></p>"; 
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