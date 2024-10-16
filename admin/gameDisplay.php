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
	require_once('..\Class\game.php');
	include "..\Class\paging.php";
	$game =  new Game();
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
	<title>Admin Game Display</title>
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
			echo $game->deleteGame($_POST["idgame"]);
		} else if ($_POST["process"] == 'add'){		
			if(!empty($_POST['name']) && !empty($_POST['desc'])){
				$gameCheck = $game->nameCheck($_POST['name'])->fetch_assoc();
				if(isset($gameCheck)){
					echo "Game name already used";
				} else{
					echo $game->insertGame($_POST['name'], $_POST['desc']);
				}
			} else{
				echo "Insert Failed";
			}
		} else if ($_POST["process"] == 'edit'){
			if(!empty($_POST['name']) && !empty($_POST['desc']) && !empty($_POST['idgame'])){
				$oldData = $game->getGame(null, null, null, $_POST['idgame'])->fetch_assoc();
				$gameCheck = $game->nameCheck($_POST['name'])->fetch_assoc();
				if(isset($gameCheck)  && $oldData['name'] != $gameCheck['name']){
					echo "Game name already used";
				} else{
					echo $game->updateGame($_POST['name'], $_POST['desc'], $_POST["idgame"]);
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
		<th colspan=3>Games</th>
		<td> <form action='gameDisplay.php?page=$page&cari=$cari' method='POST'>
		<input type='hidden' name='action' value= 'add'>
		<button type='submit'>Add Data</button> </form> </td>
	</tr>
	<tr> 
		<th>Name</th> 
		<th>Description</th> 
		<th colspan=2>Action</th>
	</tr>";
	$games = $game->getGame($cari, $offset, $limit);
	while($gameRow = $games->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $gameRow['name']. "</td>";
		echo "<td>". $gameRow['description']. "</td>";

		//UPDATE
		echo "<td> <form action='gameDisplay.php?page=$page&cari=$cari' method='POST'>
			<input type='hidden' name='action' value= 'edit'>
			<input type='hidden' name='idgame' value='".htmlspecialchars($gameRow['idgame'])."'>
			<button type='submit'>Edit Data</button> </form> </td>";

		//DELETE
		echo "<td> <form action='gameDisplay.php?page=$page&cari=$cari' method='POST'>
			<input type='hidden' name='idgame' value='".htmlspecialchars($gameRow['idgame'])."'>
			<input type='hidden' name='process' value= 'delete'>
			<button type='submit'>Delete Data</button> </form> </td> </tr>";
	}
	echo "</table>" ;

	$res = $game->getGame($cari);
	$totalData = $res -> num_rows;
	echo generate_page($cari, $totalData, $limit, $page); 
?>

<p><a href="index.php">Back to Admin Page</a></p>
<br>

<div>
	<?php
		$editName;
		$editDesc;

		if(isset($_POST["action"])){
			if($_POST["action"] == "add"){
				echo "<form action='gameDisplay.php?page=$page&cari=$cari' method='POST' enctype='multipart/form-data'>";
				echo "<label>ADD GAME TO TABLE</label>";
				echo "<input type='hidden' name='process' value= 'add'>";
				echo "<p><label>Game Name:</label> <input type='text' name='name' required>";
				echo "<p><label>Game Description:</label> <input type='text' name='desc' required>";
			} else{
				echo "<form action='gameDisplay.php?page=$page&cari=$cari' method='POST' enctype='multipart/form-data'>";
				echo "<label>EDIT SELECTED GAME</label>";
				echo "<input type='hidden' name='process' value= 'edit'>";
				echo "<input type='hidden' name='idgame' value='".$_POST['idgame']."'>"; //ID GAME

				$editedGame = $game->getGame($cari, $offset, $limit, $_POST['idgame']); 
				$edited = $editedGame->fetch_assoc();
				$editName = htmlspecialchars($edited["name"]);
				$editDesc = htmlspecialchars($edited["description"]);
				echo "<p><label>Game Name:</label> <input type='text' name='name' value='".$editName."'' required>";
				echo "<p><label>Game Description:</label> <input type='text' name='desc' value='".$editDesc."'' required>";
			}
			echo "<button type='submit'>Save</button></p>
			</form>";
		}
	?>
</div>
</div>

</body>
</html>