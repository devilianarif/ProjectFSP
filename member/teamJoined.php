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
	require_once('..\Class\teamMember.php');
	require_once('..\Class\Team.php');
	include "..\Class\paging.php";
	$teamMember =  new teamMember();
	$team =  new Team();
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
			echo $teamMember->deleteTeamMember($_SESSION['userid'], $_POST["idteam"]);
		} 
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Team Display</title>
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
<div class="content">
<?php //TABLE DISPLAY
	echo "<table border='1'>
	<tr>
		<th colspan=3>Team</th>
	</tr>
	<tr> 
		<th>Game</th> 
		<th>Name</th> 
		<th>Aksi</th>
	</tr>";

	$teamM = $teamMember->getTeamMember(null, $cari, $offset, $limit, $_SESSION['userid']);
	while($teamMemberRow = $teamM->fetch_assoc()) {
		$teams = $team->getTeam(null, null, 1, $teamMemberRow['idteam']);
		$teamRow = $teams->fetch_assoc();
		echo "<tr>";
		echo "<td>".htmlspecialchars($teamRow['gamename'])."</td>" ;
		//echo "<td> <a href=teamDetails.php?idteam=".htmlspecialchars($teamRow['idteam']).">" . $teamRow['teamname']. "</a></td>";
		echo "<td>".$teamRow['teamname']."</td>";

		//DELETE
		echo "<td> <form action='teamJoined.php?page=$page&cari=$cari' method='POST'>
			<input type='hidden' name='idteam' value= '".htmlspecialchars($teamRow['idteam'])."'>
			<input type='hidden' name='process' value= 'delete'>
			<button type='submit'>Keluar</button> </form> </td> </tr>";
	}
	echo "</table>" ;
	$res = $teamMember->getTeamMember($cari);
	$totalData = $res -> num_rows;
	echo generate_page($cari, $totalData, $limit, $page); 

?>

<p><a href="index.php">Back to Member Page</a></p>
<br>
</div>

</body>
</html>