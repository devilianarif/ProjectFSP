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
	require_once('..\Class\teamMember.php');
	require_once('..\Class\team.php');
	include "..\Class\paging.php";
	$teamMember = new teamMember();
	$team = new Team();
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

	if(isset($_GET['idteam'])){ //STOP TOUCHING THE URL, GET IS FOR YOUR CONVENIENCE 
		$userUsil = $team->getTeam(null, null, null, $_GET['idteam'])->fetch_assoc();
		if(!isset($userUsil)){
			header("location: teamDisplay.php");
		}
	} else{
		header("location: teamDisplay.php");
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Member Display</title>
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
		if($_POST["process"] == 'delete'){
			echo $teamMember->deleteTeamMember($_POST["idmember"], $_GET['idteam']);
		} else if ($_POST["process"] == 'edit'){
			if(!empty($_POST['desc']) && !empty($_POST['idmember']) && !empty($_GET['idteam'])){
				echo $teamMember->updateTeamMember($_POST['desc'], $_POST["idmember"], $_GET['idteam']);
			} else{
				echo "Edit Failed";
			}
		}
	}
?>
<div class="content">
<?php //TABLE DISPLAY
	$teams = $team->getTeam("", $offset, $limit, $_GET['idteam']);
	$team = $teams->fetch_assoc();

	echo "<table border='1'>
	<tr>
		<th colspan=4>".$team['teamname']."</th>
	</tr>
	<tr> 
		<th>Member Name</th>
		<th>Description</th> 
		<th colspan=2>Action</th>
	</tr>";

	$members = $teamMember->getTeamMember( $_GET['idteam'], $cari, $offset, $limit);
	while($memberRow = $members->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $memberRow['fname'].' "'.$memberRow['username'].'" '.$memberRow['lname'] ."</td>";
		echo "<td>". $memberRow['description']. "</td>";

		//UPDATE
		echo "<td> <form action='memberDisplay.php?idteam=".$_GET['idteam']."&page=$page&cari=$cari' method='POST'>
			<input type='hidden' name='action' value= 'edit'>
			<input type='hidden' name='idmember' value= '".htmlspecialchars($memberRow['idmember'])."'>
			<button type='submit'>Edit Data</button> </form> </td>";

		//DELETE
		echo "<td> <form action='memberDisplay.php?idteam=".$_GET['idteam']."&page=$page&cari=$cari' method='POST'>
			<input type='hidden' name='process' value= 'delete'>
			<input type='hidden' name='idmember' value= '".htmlspecialchars($memberRow['idmember'])."'>
			<button type='submit'>Remove</button> </form> </td> </tr>";
	}
	echo "</table>" ;

	$res = $teamMember->getTeamMember($_GET['idteam'], $cari);
	$totalData = $res -> num_rows;
	$special = "idteam=".$_GET['idteam'];
	echo generate_page($cari, $totalData, $limit, $page, $special); 

?>

<p><a href="teamDisplay.php">Back to Team Page</a></p>
<br>

<div>
	<?php
		$editName;
		$editDesc;

		if(isset($_POST["action"])){
			echo "<form action='memberDisplay.php?idteam=".$_GET['idteam']."&page=$page&cari=$cari' method='POST' enctype='multipart/form-data'>";

			echo "<input type='hidden' name='idmember' value='".$_POST['idmember']."'>"; //ID MEMBER
			echo "<input type='hidden' name='idteam' value='".$_GET['idteam']."'>"; //ID TEAM
			echo "<input type='hidden' name='process' value= 'edit'>";

			$member = $teamMember->getTeamMember( $_GET['idteam'], $cari, $offset, $limit, $_POST['idmember']);
			$edited = $member->fetch_assoc();
			echo "<label>EDIT ". $edited['fname'].' "'.$edited['username'].'" '.$edited['lname'] ."</label>";
			$editDesc = htmlspecialchars($edited["description"]);

			echo "<p><label>Description:</label> <input type='text' name='desc' value='".$editDesc."'' required>";
			
			echo "<button type='submit'>Save</button></p>
			</form>";
		}
	?>
</div>

</div>
</body>
</html>