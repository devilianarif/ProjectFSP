<!DOCTYPE html>

<?php
	require_once('..\Class\member.php');
    $member = new member();
    session_start();

   	//CHECK PROFILE
   	if(isset($_SESSION['userid'])){
	    $res = $member->getMember(null,null,null,$_SESSION['userid']);
	    $loggedUser = $res->fetch_assoc();

	    if($loggedUser["profile"]!="admin"){ header("location: ..\index.php"); }
   	} else{ header("location: ..\index.php"); }
?>

<?php
require_once('..\Class\achievement.php');
require_once('..\Class\team.php');
include "..\Class/paging.php";

$achv = new Achievement();
$limit = 5;
$cari = isset($_GET['cari']) ? $_GET['cari'] : "";
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;
?>

<html>
<head>
<div class="tempTop">
	<h1 style="color: #f8f9fa; margin: 0px; float: left;">INFORMATICS</h1>
</div>
<div class="content">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Achievement Display</title>
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

<form method="GET" action="">
    <p><label>Team: </label>
    <?php
    $team = new Team();
    $teamQuery = $team->getTeam(); // Show team names

    $idteam = 0;
    if(isset($_GET['idteam'])){
    	$userUsil = $team->getTeam(null, null, null, $_GET['idteam'])->fetch_assoc();
		if(!isset($userUsil)){
			$firstTeam =  $team->getTeam(null, null, 1)->fetch_assoc();
    		$idteam = $firstTeam['idteam'];
    		header("location: ?idteam=".$idteam);
		} else{
			$idteam = $_GET['idteam'];
		}
    } else{
    	$firstTeam =  $team->getTeam(null, null, 1)->fetch_assoc();
    	$idteam = $firstTeam['idteam'];
    	header("location: ?idteam=".$idteam);
    }

    echo "<select name='idteam' onchange='this.form.submit()'>"; // Submit the form on change
    while ($teams = $teamQuery->fetch_assoc()) {
        // Check if this team is the one selected
        if($_GET['idteam'] == $teams['idteam']){
        	echo "<option value='" . htmlspecialchars($teams['idteam']) . "' selected>" . htmlspecialchars($teams['teamname']) . "</option>";
        } else{
        	echo "<option value='" . htmlspecialchars($teams['idteam']) . "'>" . htmlspecialchars($teams['teamname']) . "</option>";
        }
    }
    ?>
    </select></p>
</form>

<div>
<?php //TABLE DISPLAY
	echo "<table border='1'>
	<tr>
		<th colspan=4>Achievements</th>
	<tr> 
		<th>Achievement</th>
		<th>Date Recieved</th>
		<th>Team Name</th>
		<th>Description</th> 
	</tr>";

	$achievements = $achv->getAchv(null, $offset, $limit, null, $idteam);
	while($acvRow = $achievements->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $acvRow['achievementName']."</td>";
		echo "<td>". $acvRow['date']."</td>";
		echo "<td>". $acvRow['teamName']."</td>";
		echo "<td>". $acvRow['description']. "</td>";
	}
	echo "</table>" ;

	$res = $achv->getAchv(null, $offset, $limit, null, $cari);
	$totalData = $res -> num_rows;
	echo generate_page($cari, $totalData, $limit, $page); 
?>
</div>

<p><a href="index.php">Back to Admin Page</a></p>
</div>
</body>
</html>