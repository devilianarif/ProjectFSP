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
	require_once('..\Class\team.php');
	require_once('..\Class\game.php');
	include "..\Class\paging.php";
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
<?php
	if(isset($_POST["process"])){
		if($_POST["process"] == 'delete'){
			echo $team->deleteTeam($_POST["idteam"]);
		} else if ($_POST["process"] == 'add'){
			if(!empty($_POST['game']) && !empty($_POST['name'])){
				$teamCheck = $team->nameCheck($_POST['name'])->fetch_assoc();
				if(isset($teamCheck)){
					echo "Team name already used";
				} else{
					echo $team->insertTeam($_POST['game'], $_POST['name']);
				}
			} else{
				echo "Add Failed";
			}
		} else if ($_POST["process"] == 'edit'){
			if(!empty($_POST['game']) && !empty($_POST['name']) && !empty($_POST['idteam'])){
				
				$oldData = $team->getTeam(null, null, null, $_POST['idteam'])->fetch_assoc();
				$teamCheck = $team->nameCheck($_POST['name'])->fetch_assoc();
				if(isset($teamCheck) && $oldData['teamname'] != $teamCheck['name']){
					echo "Team name already used";
				} else{
					echo $team->updateTeam($_POST['game'], $_POST['name'], $_POST["idteam"]);
				}

			} else{
				echo "Edit Failed";
			}
		}
	}
?>
<div class="content">
<?php //TABLE DISPLAY
	echo "<table border='1'>
	<tr>
		<th colspan=3>Team</th>

		<td> <form action='teamDisplay.php?page=$page&cari=$cari' method='POST'>
		<input type='hidden' name='action' value= 'add'>
		<button type='submit'>Add Data</button> </form> </td>

	</tr>
	<tr> 
		<th>Game</th> 
		<th>Name</th> 
		<th colspan=2>Action</th>
	</tr>";

	$teams = $team->getTeam($cari, $offset, $limit);
	while($teamRow = $teams->fetch_assoc()) {
	echo "<tr>";
		echo "<td>".htmlspecialchars($teamRow['gamename'])."</td>" ;
		echo "<td> <a href=memberDisplay.php?idteam=".htmlspecialchars($teamRow['idteam']).">" . $teamRow['teamname']. "</a></td>";

		//UPDATE
		echo "<td> <form action='teamDisplay.php?page=$page&cari=$cari' method='POST'>
			<input type='hidden' name='action' value= 'edit'>
			<input type='hidden' name='idteam' value= '".htmlspecialchars($teamRow['idteam'])."'>
			<button type='submit'>Edit Data</button> </form> </td>";

		//DELETE
		echo "<td> <form action='teamDisplay.php?page=$page&cari=$cari' method='POST'>
			<input type='hidden' name='idteam' value= '".htmlspecialchars($teamRow['idteam'])."'>
			<input type='hidden' name='process' value= 'delete'>
			<button type='submit'>Delete Data</button> </form> </td> </tr>";
	}
	echo "</table>" ;
	$res = $team->getTeam($cari);
	$totalData = $res -> num_rows;
	echo generate_page($cari, $totalData, $limit, $page); 

?>

<p><a href="index.php">Back to Admin Page</a></p>
<br>

<div>
	<?php
		$editName;
		$editIDGame;

		if(isset($_POST["action"])){			
			if($_POST["action"] == "add"){
				echo "<form action='teamDisplay.php?page=$page&cari=$cari' method='POST' enctype='multipart/form-data'>";
				echo "<label>ADD TEAM TO TABLE</label>";
				echo "<input type='hidden' name='process' value= 'add'>";
			} else{
				echo "<form action='teamDisplay.php?page=$page&cari=$cari' method='POST' enctype='multipart/form-data'>";
				echo "<label>EDIT SELECTED TEAM</label>";
				echo "<input type='hidden' name='process' value= 'edit'>";
				echo "<input type='hidden' name='idteam' value='".$_POST['idteam']."'>"; //ID TEAM

				$editTeam = $team->getTeam($cari, $offset, $limit, $_POST['idteam']);
				$edited = $editTeam->fetch_assoc();
				$editName = htmlspecialchars($edited["teamname"]);
				$editIDGame = htmlspecialchars($edited["idgame"]);
			}
					
			echo "<p><label>Game: </label></p>";
			$game = new Game();
			$games = $game->getGame();

			echo "<select name=game>";

			while($gameRow = $games->fetch_assoc()) {
				if($editIDGame == htmlspecialchars($gameRow['idgame'])){
					echo "<option value=".htmlspecialchars($gameRow['idgame'])." selected>".htmlspecialchars($gameRow['name'])."</option>";
				} else{
					echo "<option value=".htmlspecialchars($gameRow['idgame']).">".htmlspecialchars($gameRow['name'])."</option>";
				}	
			}
			echo "</select></p>";
			
			if($_POST["action"] == "add"){
				echo "<p><label>Team Name:</label> <input type='text' name='name' required>";
			} else{
				echo "<p><label>Team Name:</label> <input type='text' name='name' value='".$editName."'' required>";
			}
			
			echo "<button type='submit'>Save</button></p>
			</form>";
		}
	?>
</div>
</div>

</body>
</html>