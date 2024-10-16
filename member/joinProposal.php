<!DOCTYPE html>

<?php
	require_once('..\Class\member.php');
    $member = new member();
    session_start();

   	//CHECK PROFILE
   	if(isset($_SESSION['userid'])){
	    $res = $member->getMember(null,null,null,$_SESSION['userid']);
	    $loggedUser = $res->fetch_assoc();

	    if($loggedUser["profile"]!="member"){ header("location: ..\index.php"); }
   	} else{ header("location: ..\index.php"); }
?>

<?php
	require_once('..\Class\proposal.php');
	require_once('..\Class\teamMember.php');
	require_once('..\Class\Team.php');
	include "..\Class\paging.php";
	$prop =  new Proposal();
	$teamMember =  new teamMember();
	$team =  new Team();
	$limit = 5;
	$cari;
	$pageW; $pageA; $pageR;
	
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
	} else{
		$cari = "";
	}

	//WAITING
	if(!isset($_GET['pageW'])){
		$pageW = 1;
		$offsetW = 0;
	} else{
		$pageW = $_GET['pageW'];
		$offsetW = ($pageW-1) * $limit;
	}
	//APPROVED
	if(!isset($_GET['pageA'])){
		$pageA = 1;
		$offsetA = 0;
	} else{
		$pageA = $_GET['pageA'];
		$offsetA = ($pageA-1) * $limit;
	}
	//REJECTED
	if(!isset($_GET['pageR'])){
		$pageR = 1;
		$offsetR = 0;
	} else{
		$pageR = $_GET['pageR'];
		$offsetR = ($pageR-1) * $limit;
	}
?>
	
<?php
	$unavailableTeamID = array(); //GET TEAMS THAT ARE ALREASY ADDED
	$joinedTeam = $teamMember->getTeamMember(null, null, null, null, $_SESSION['userid']);
	$waitingProp = $prop->getProposal(null, null, null, $_SESSION['userid'], "waiting");

	while($joinedTeams = $joinedTeam->fetch_assoc()){ //GET ALL TEAM USER HAS JOINED
		$unavailableTeamID[] = $joinedTeams['idteam'];
	}
	while($waitProp = $waitingProp->fetch_assoc()){ //GET ALL WAITING PROP TO PREVENT SPAM
		$unavailableTeamID[] = $waitProp['idteam'];
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proposal Join Display</title>
	<style type="text/css">
		body{ 
			font-family: "Arial"; 
			margin: 0px;
		}
		.tempTop{
			background-color: #00193d;
			height: 50px;
			width: 100%;
			text-align: center;
			vertical-align: middle;
			line-height: 50px;
			padding-left: 5%; 
		}
		.content{
			margin: 10px;
		}
	</style>
</head>
<body>
<div class="tempTop">
	<h1 style="color: #f8f9fa; margin: 0px; float: left;">INFORMATICS</h1>
</div>
<?php
	if(isset($_POST["process"])){
		if ($_POST["process"] == 'add'){
			if(!empty($_SESSION['userid']) && !empty($_POST["idteam"]) && !empty($_POST["description"])){
				
				if(!in_array($_POST["idteam"], $unavailableTeamID)){
					echo $prop->insertProposal($_SESSION['userid'], $_POST["idteam"], $_POST["description"]);
				} else{
					echo "You are already in that team/applying for that team";
				}
			} else{
				echo "Add Failed";
			}
		} else if($_POST["process"] == 'delete'){
			echo $prop->deleteProposal($_POST["idproposal"]);
		}
	} 
?>

<div class="content">
<?php //TABLE DISPLAY WAITING
	echo '<table border="1" style="width:50%">
	<tr>
		<th colspan=4> "Waiting" Proposals </th>
		<td> <form action="?pageW='.$pageW.'&pageA='.$pageA.'&pageR='.$pageR.'&cari='.$cari.'" method="POST">
		<input type="hidden" name="action" value= "add">
		<button type="submit">Add Data</button> </form> </td>
	</tr>
	<tr> 
		<th>Member Name</th>
		<th>Team Name</th> 
		<th>Description</th>
		<th>Status</th>
		<th>Action</th>
	</tr>';

	$proposals = $prop->getProposal($cari, $offsetW, $limit, $_SESSION['userid'], "waiting");
	while($rows = $proposals->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $rows['fname'].' "'.$rows['username'].'" '.$rows['lname'] ."</td>";
		echo "<td>". $rows['name']. "</td>";
		echo "<td>". $rows['description']. "</td>";
		echo "<td>". $rows['status']. "</td>";

		//DELETE
		echo "<td> <form action='?pageW=$pageW&pageA=$pageA&pageR=$pageR&cari=$cari' method='POST'>
			<input type='hidden' name='idproposal' value='".htmlspecialchars($rows['idjoin_proposal'])."'>
			<input type='hidden' name='process' value= 'delete'>
			<button type='submit'>Cancel</button> </form> </td> </tr>";
	}
	echo "</table>" ;

	$res = $prop->getProposal($cari, null, null, $_SESSION['userid'], "waiting");
	$totalDataW = $res -> num_rows;
	echo bunchProposal($cari, $totalDataW, $limit, $pageW, $pageW, $pageA, $pageR, "W");

	if(isset($_POST["action"])){
		if($_POST["action"] == "add"){
			echo "<br><br>";
			echo "<form action='?pageW=$pageW&pageA=$pageA&pageR=$pageR&cari=$cari' method='POST' enctype='multipart/form-data'>";
			echo "<label>ADD PROPOSAL</label>";
			echo "<input type='hidden' name='process' value= 'add'>";

			$teamQuerry = $team->getTeam();
			echo "<p><label>Team: </label>";
			echo "<select name=idteam>";
			while ($teams=$teamQuerry->fetch_assoc()) {
				if(!in_array($teams['idteam'], $unavailableTeamID)){ //IF IT HASNT BEEN ADDED ADD TO SELECT
					echo "<option value=".htmlspecialchars($teams['idteam']).">".htmlspecialchars($teams['teamname'])."</option>";
				}
			}
			echo "</select></p>";

			echo "<p><label>Description:</label> <input type='text' name='description' required>";
			echo "<button type='submit'>Save</button></p>
			</form>";
		}
	}
?>
	<br><br>
<?php //TABLE DISPLAY APPROVED
	echo '<table border="1" style="width:50%">
	<tr>
		<th colspan=5> "Approved" Proposals </th>
	</tr>
	<tr> 
		<th>Member Name</th>
		<th>Team Name</th> 
		<th>Description</th>
		<th colspan=2>Status</th>
	</tr>';

	$proposals = $prop->getProposal($cari, $offsetA, $limit, $_SESSION['userid'], "approved");
	while($rows = $proposals->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $rows['fname'].' "'.$rows['username'].'" '.$rows['lname'] ."</td>";
		echo "<td>". $rows['name']. "</td>";
		echo "<td>". $rows['description']. "</td>";
		echo "<td colspan=2>". $rows['status']. "</td>";
	}
	echo "</table>" ;

	$res = $prop->getProposal($cari, null, null, $_SESSION['userid'], "approved");
	$totalDataA = $res -> num_rows;
	echo bunchProposal($cari, $totalDataA, $limit, $pageA, $pageW, $pageA, $pageR, "A");
?>
	<br><br>
<?php //TABLE DISPLAY REJECTED
	echo '<table border="1" style="width:50%">
	<tr>
		<th colspan=5> "Rejected" Proposals </th>
	</tr>
	<tr> 
		<th>Member Name</th>
		<th>Team Name</th> 
		<th>Description</th>
		<th colspan=2>Status</th>
	</tr>';

	$proposals = $prop->getProposal($cari, $offsetR, $limit, $_SESSION['userid'], "rejected");
	while($rows = $proposals->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $rows['fname'].' "'.$rows['username'].'" '.$rows['lname'] ."</td>";
		echo "<td>". $rows['name']. "</td>";
		echo "<td>". $rows['description']. "</td>";
		echo "<td colspan=2>". $rows['status']. "</td>";
	}
	echo "</table>" ;

	$res = $prop->getProposal($cari, null, null, $_SESSION['userid'], "rejected");
	$totalDataR = $res -> num_rows;
	echo bunchProposal($cari, $totalDataR, $limit, $pageR, $pageW, $pageA, $pageR, "R");
?>

<p><a href="index.php">Back to Member Page</a></p>
</div>
</body>
</html>