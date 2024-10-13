<!DOCTYPE html>

<?php
	require_once('..\Class\member.php');
    $member = new member();
    session_start();

   	//CHECK PROFILE
   	if(isset($_SESSION['userid'])){
	    $res = $member->getMember(null,null,null,$_SESSION['userid']);
	    $loggedUser = $res->fetch_assoc();

	    if($loggedUser["profile"]!="admin"){ header("location: ..\loginui.php"); }
   	} else{ header("location: ..\loginui.php"); }
?>

<?php
	require_once('..\Class\eventTeams.php');
	require_once('..\Class\event.php');
	require_once('..\Class\team.php');
	include "..\Class\paging.php";
	$eventTeam =  new EventTeam();
	$event=  new event();
	$limit = 5;
	$cari;
	$page;
	
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
	} else{
		$cari = "";
	}
	
	if(!isset($_GET['page'])){
		$page = 1;
		$offset = 0;
	} else{
		$page = $_GET['page'];
		$offset = ($page-1) * $limit;
	}
?>
	
<?php
	if(isset($_POST["process"])){
		if($_POST["process"] == 'delete'){
			echo $eventTeam->deleteEventTeam($_POST['idevent'], $_POST['idteam']);
		} else if ($_POST["process"] == 'add'){
			
			$userCheck = $eventTeam->getEventTeam($_POST['idevent'], null, null, $_POST['team'])->fetch_assoc();
			if(isset($userCheck)){
				echo "Team Already Added";
			}

			else{
				if(!empty($_POST['idevent']) && !empty($_POST['team'])){
					echo $eventTeam->insertEventTeam($_POST['idevent'], $_POST['team']);
				} else{
					echo "Add Failed";
				}
			}
		}
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
	
	$events = $event->getEvent($cari, $offset, $limit);
	$eventDet = $events->fetch_assoc();

	echo "<table border='1'>
	<tr>
		<th colspan=2>".$eventDet['name']."</th>

		<td> <form action='eventDisplay.php?idevent=".$_GET['idevent']."&page=$page&cari=$cari' method='POST'>
		<input type='hidden' name='action' value= 'add'>
		<button type='submit'>Tambah Team</button> </form> </td>
	</tr>
	<tr> 
		<th>Date</th>
		<th>Team</th> 
		<th>Aksi</th>
	</tr>";

	$events = $eventTeam->getEventTeam($_GET['idevent'], $cari, $offset, $limit);

	$index = 0;
	while($eventsRow = $events->fetch_assoc()) {
		echo "<tr>";
		if($index == 0){echo "<td rowspan=".$limit.">". $eventDet['date']."</td>";}
		echo "<td>". $eventsRow['name']. "</td>";
		$index += 1;

		//DELETE
		echo "<td> <form action='eventDisplay.php?idevent=".$_GET['idevent']."&page=$page&cari=$cari' method='POST'>
			<input type='hidden' name='idteam' value= '".htmlspecialchars($eventsRow['idteam'])."'>
			<input type='hidden' name='process' value= 'delete'>
			<input type='hidden' name='idevent' value= '".$_GET['idevent']."'>
			<button type='submit'>Keluarkan</button> </form> </td> </tr>";
	}
	echo "</table>" ;

	$res = $eventTeam->getEventTeam($_GET['idevent'], $cari);
	$totalData = $res -> num_rows;
	$special = "idevent=".$_GET['idevent'];
	echo generate_page($cari, $totalData, $limit, $page, $special); 

?>

<p><a href="eventListDisplay.php">Back to Event Page</a></p>
<br>

<div>
	<?php
		if(isset($_POST["action"])){
			echo "<form action='eventDisplay.php?idevent=".$_GET['idevent']."&page=$page&cari=$cari' method='POST' enctype='multipart/form-data'>";

			echo "<input type='hidden' name='idevent' value='".$_GET['idevent']."'>";
			echo "<input type='hidden' name='process' value= 'add'>";

			echo "<label>ADD TEAM TO EVENT</label>";

			echo "<p><label>Team: </label>";

			$team =  new Team();
			$teamQuerry = $team->getTeam(); //SHOW TEAM NAMES
			echo "<select name=team>";

			$addedTeamID = array(); //GET TEAMS THAT ARE ALREASY ADDED
			$addedTeam = $eventTeam->getEventTeam($_GET['idevent']);
			while($addedTeams = $addedTeam->fetch_assoc()){
				$addedTeamID[] = $addedTeams['idteam'];
			}
			
			while ($teams=$teamQuerry->fetch_assoc()) {
				if(!in_array($teams['idteam'], $addedTeamID)){ //IF IT HASNT BEEN ADDED ADD TO SELECT
					echo "<option value=".htmlspecialchars($teams['idteam']).">".htmlspecialchars($teams['teamname'])."</option>";
				}
			}
			echo "</select></p>";

			echo "<p><button type='submit'>Save</button></p>
			</form>";
		}
	?>
</div>


</body>
</html>