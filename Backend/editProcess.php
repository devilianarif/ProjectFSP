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
		$sql = "UPDATE team SET idgame=?, name=? WHERE team.idteam=?;";
		querry($conn, $sql, [$_POST['game'], $_POST['name'], $_POST['idteam']], "isi");
		header("Location: teamDisplay.php"); //SEND EM BACK

	//GAME
	} else if($inputTable == "game"){
		$sql = "UPDATE game SET name=?, description=? WHERE game.idgame=?;";
		querry($conn, $sql, [$_POST['name'], $_POST['desc'], $_POST['idgame']], "ssi");
		header("Location: gameDisplay.php"); //SEND EM BACK

	//MEMBER TEAM
	} else if($inputTable == "member"){
		$sql = "UPDATE team_members SET description=? WHERE team_members.idmember=? AND team_members.idteam=?;";
		querry($conn, $sql, [$_POST['desc'], $_POST['idmember'], $_POST['idteam']], "sii");
		header("Location: memberDisplay.php?idteam=".$_POST['idteam']); //SEND EM BACK

	//ACHIEVEMENT
	} else if($inputTable == "achievement"){
		$sql = "UPDATE achievement SET idteam=?, name=?, date =?, description=? WHERE achievement.idachievement=?;";
		querry($conn, $sql, [$_POST['team'], $_POST['name'], $_POST['date'], $_POST['desc'], $_POST['idachv']], "isssi");
		header("Location: achievementDisplay.php"); //SEND EM BACK

	//EVENTLIST
	} else if($inputTable == "eventList"){
		$sql = "UPDATE event SET name=?, date=?, description=? WHERE event.idevent=?;";
		querry($conn, $sql, [$_POST['name'], $_POST['date'], $_POST['desc'], $_POST['idevent']], "sssi");
		header("Location: eventListDisplay.php"); //SEND EM BACK

	//EVENT PARTICIPANT 
	} else if($inputTable == "eventParticipant"){
		$sql = "UPDATE event_teams SET idteam=?  WHERE event_teams.idevent=?; ";
		querry($conn, $sql, [$_POST['idteam'], $_POST['idevent']], "ii");
		header("Location: eventDisplay.php?idevent=".$_POST['idevent']); //SEND EM BACK

	//PROPOSAL
	} else if($inputTable == "proposal"){
		$sql = "UPDATE join_proposal SET status=? WHERE join_proposal.idjoin_proposal = ?;";
		querry($conn, $sql, [$_POST['status'], $_POST['idproposal']], "si");

		if($_POST['status'] == "approved"){ //TRY TO FIND A WAY TO JUST THROW TO INSERTPROCESS
			$sql = "INSERT INTO team_members (idteam, idmember, description) VALUES (?,?,?);";
			querry($conn, $sql, [$_POST['idteam'], $_POST['idmember'], $_POST['desc']], "iis"); 
		} 
		header("Location: joinProposalDisplay.php"); //SEND EM BACK	

	//ALL MEMBER
	} else if($inputTable == "memberAll"){
		$sql = "UPDATE member SET fname=?, lname =?, username=?, password=? WHERE member.idmember=?";
		querry($conn, $sql, [$_POST['fname'], $_POST['lname'], $_POST['username'], $_POST['password'], $_POST['idmember']], "ssssi");
		header("Location: eventDisplay.php?idevent=".$_POST['idevent']); //SEND EM BACK

	} 
	
?>