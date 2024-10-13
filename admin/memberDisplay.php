<!DOCTYPE html>

<?php
	require_once('class\teamMember.php');
	require_once('class\team.php');
	include "class\paging.php";
	$teamMember = new teamMember();
	$limit = 2;
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

<?php //BELUM KEGANTI
	if(isset($_POST["process"])){ 
		if($_POST["process"] == 'delete'){
			echo $teamMember->deleteTeamMembe( $_POST["idteam"], $_POST["idmember"]);
		} else if ($_POST["process"] == 'edit'){
			echo $achv->updateTeamMembe($_POST['idteam'], $_POST['idmember'], $_POST['desc'], $_POST["idteam"], $_POST["idmember"]);
		}
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
	$team = new Team();
	$teams = $team->getTeam("", $offset, $limit, $_GET['idteam']);
	$team = $teams->fetch_assoc();

	echo "<table border='1'>
	<tr>
		<th colspan=4>".$team['teamname']."</th>
	</tr>
	<tr> 
		<th>Member Name</th>
		<th>Description</th> 
		<th colspan=2>Aksi</th>
	</tr>";

	$members = $teamMember->getTeamMember( $_GET['idteam'], $cari, $offset, $limit);
	while($memberRow = $members->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $memberRow['fname'].' "'.$memberRow['username'].'" '.$memberRow['lname'] ."</td>";
		echo "<td>". $memberRow['description']. "</td>";

		//UPDATE
		echo "<td> <form action='memberDisplay.php?idteam=".$_GET['idteam']."' method='POST'>
			<input type='hidden' name='action' value= 'edit'>
			<input type='hidden' name='idmember' value= '".htmlspecialchars($memberRow['idmember'])."'>
			<button type='submit'>Edit Data</button> </form> </td>";

		//DELETE
		echo "<td> <form action='deleteProcess.php' method='POST'>
			<input type='hidden' name='idmember' value= '".htmlspecialchars($memberRow['idmember'])."'>
			<input type='hidden' name='team' value= '".$_GET['idteam']."'>
			<input type='hidden' name='inputTable' value='member'>
			<button type='submit'>Keluarkan</button> </form> </td> </tr>";
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
			echo "<input type='hidden' name='inputTable' value='member'>"; //IDENTIFIER

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


</body>
</html>