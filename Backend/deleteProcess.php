<?php //Connection & Function
	include 'connection.php';

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
    	header("Location: adminMain.php");
	}

	//DELETE TEAM
	if ($inputTable == "team") { 
    	$sql = "DELETE FROM team WHERE team.idteam = ?";
    	querry($conn, $sql, [$_POST['idteam']], 'i');
    	header("Location: teamDisplay.php"); //SEND EM BACK

    //DELETE GAME
	} else if ($inputTable == "game") { 
    	$sql = "DELETE FROM game WHERE game.idgame = ?";
    	querry($conn, $sql, [$_POST['idgame']], 'i');
    	header("Location: gameDisplay.php"); //SEND EM BACK

    //DELETE MEMBER
	} else if ($inputTable == "member") { 
    	$sql = "DELETE FROM team_members WHERE team_members.idmember = ? AND team_members.idteam = ?";
    	querry($conn, $sql, [$_POST['idmember'], $_POST['team']], 'ii');
    	header("Location: memberDisplay.php?idteam=".$_POST['team']); //SEND EM BACK

    //DELETE ACHIEVEMENT
	} else if ($inputTable == "achievement") { 
    	$sql = "DELETE FROM achievement WHERE achievement.idachievement = ?";
    	querry($conn, $sql, [$_POST['idachv']], 'i');
    	header("Location: achievementDisplay.php"); //SEND EM BACK

    //DELETE EVENT
    } else if ($inputTable == "eventList") { 
    	$sql = "DELETE FROM event WHERE event.idevent = ?";
    	querry($conn, $sql, [$_POST['idevent']], 'i');
    	header("Location: eventListDisplay.php"); //SEND EM BACK

    //DELETE EVENT PARTICIPANT
    } else if ($inputTable == "eventParticipant") { 
    	$sql = "DELETE FROM event_teams WHERE event_teams.idevent = ? AND event_teams.idteam = ?";
    	querry($conn, $sql, [$_POST['idevent'],$_POST['idteam']], 'ii');
    	header("Location: eventDisplay.php?idevent=".$_POST['idevent']); //SEND EM BACK

    }


	
?>
