<?php //Connection & Function
	$conn = new mysqli("localhost", "root", "", "fspproject");
	if ($conn->connect_errno) {
    	die("Failed to connect to MySQL: " . $conn->connect_error);
	}

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
?>

<?php
	//Check if which table isset
	if (isset($_POST['inputTable'])) {
    	$inputTable = $_POST['inputTable'];
	} else {
    	echo "inputTable is not set.";
	}


	//TEAM
	if($inputTable == "team"){
		$sql = "INSERT INTO team (idgame, name) VALUES (?, ?);";
		querry($conn, $sql, [$_POST['game'], $_POST['name']], "is");
		header("Location: teamDisplay.php"); //SEND EM BACK

	//GAME
	} else if($inputTable == "game"){
		$sql = "INSERT INTO game (name, description) VALUES (?, ?);";
		querry($conn, $sql, [$_POST['name'], $_POST['desc']], "ss");
		header("Location: gameDisplay.php"); //SEND EM BACK

	//MEMBER TEAM
	} else if($inputTable == "member"){
		$sql = "INSERT INTO team_members (idteam, idmember, description) VALUES (?,?,?);";
		querry($conn, $sql, [$_POST['idteam'], $_POST['idmember'], $_POST['desc']], "iis");
		header("Location: memberDisplay.php?idteam=".$_POST['idteam']); //SEND EM BACK 

	//ACHIEVEMENT
	} else if($inputTable == "achievement"){
		$sql = "INSERT INTO achievement (idteam, name, date, description) VALUES (?,?,?,?);";
		querry($conn, $sql, [$_POST['team'], $_POST['name'], $_POST['date'], $_POST['desc']], "isss");
		header("Location: achievementDisplay.php"); //SEND EM BACK

	//EVENTLIST
	} else if($inputTable == "eventList"){
		$sql = "INSERT INTO event (name, date, description) VALUES (?,?,?);";
		querry($conn, $sql, [$_POST['name'], $_POST['date'], $_POST['desc']], "sss");
		header("Location: eventListDisplay.php"); //SEND EM BACK

	//EVENT PARTICIPANT 
	} else if($inputTable == "eventParticipant"){
		$sql = "INSERT INTO event_teams (idevent, idteam) VALUES (?,?);";
		querry($conn, $sql, [$_POST['idevent'], $_POST['team']], "ii");
		header("Location: eventDisplay.php?idevent=".$_POST['idevent']); //SEND EM BACK

	//PROPOSAL
	} else if($inputTable == "proposal"){
		$sql = "INSERT INTO join_proposal (idmember, idteam, description, status) VALUES (?,?,?,'waiting');";
		querry($conn, $sql, [$_POST['idmember'], $_POST['idteam'], $_POST['desc']], "iis");
		header("Location: joinProposalDisplay.php"); //SEND EM BACK

	//ALL MEMBER
	} else if($inputTable == "memberAll"){
		$sql = "INSERT INTO member (fname, lname, username, password, profile) VALUES (?,?,?,?, 'member');";
		querry($conn, $sql, [$_POST['fname'], $_POST['lname'], $_POST['username'], $_POST['password']], "ssss");
		header("Location: eventDisplay.php?idevent=".$_POST['idevent']); //SEND EM BACK

	} 
	
?>