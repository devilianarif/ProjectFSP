<!DOCTYPE html>

<?php
	require_once('class\game.php');
	include "class\paging.php";
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
	
<?php
	if(isset($_POST["process"])){
		if($_POST["process"] == 'delete'){
			echo $game->deleteGame($_POST["idgame"]);
		} else if ($_POST["process"] == 'add'){
			echo $game->insertGame($_POST['name'], $_POST['desc']);
		} else if ($_POST["process"] == 'edit'){
			echo $game->updateGame($_POST['name'], $_POST['desc'], $_POST["idgame"]);
		}
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Game Display</title>
</head>
<body>

<?php //TABLE DISPLAY
	echo "<table border='1'>
	<tr>
		<th colspan=3>Games</th>
		<td> <form action='gameDisplay.php?page=$page&cari=$cari' method='POST'>
		<input type='hidden' name='action' value= 'add'>
		<button type='submit'>Tambah Data</button> </form> </td>
	</tr>
	<tr> 
		<th>Name</th> 
		<th>Description</th> 
		<th colspan=2>Aksi</th>
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
			<input type='hidden' name='inputTable' value='game'>
			<input type='hidden' name='process' value= 'delete'>
			<button type='submit'>Hapus Data</button> </form> </td> </tr>";
	}
	echo "</table>" ;

	$res = $game->getGame($cari);
	$totalData = $res -> num_rows;
	echo generate_page($cari, $totalData, $limit, $page); 
?>

<p><a href="adminMain.php">Back to Admin Page</a></p>
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
			} else{
				echo "<form action='gameDisplay.php?page=$page&cari=$cari' method='POST' enctype='multipart/form-data'>";
				echo "<label>EDIT SELECTED GAME</label>";
				echo "<input type='hidden' name='process' value= 'edit'>";
				echo "<input type='hidden' name='idgame' value='".$_POST['idgame']."'>"; //ID GAME

				$editedGame = $game->getGame($cari, $offset, $limit, $_POST['idgame']); 
				$edited = $editedGame->fetch_assoc();
				$editName = htmlspecialchars($edited["name"]);
				$editDesc = htmlspecialchars($edited["description"]);
			}
					
			echo "<input type='hidden' name='inputTable' value='game'>"; //IDENTIFIER

			if($_POST["action"] == "add"){
				echo "<p><label>Game Name:</label> <input type='text' name='name' required>";
				echo "<p><label>Game Description:</label> <input type='text' name='desc'>";
			} else{
				echo "<p><label>Game Name:</label> <input type='text' name='name' value='".$editName."'' required>";
				echo "<p><label>Game Description:</label> <input type='text' name='desc' value='".$editDesc."''>";
			}
			
			echo "<button type='submit'>Save</button></p>
			</form>";
		}
	?>
</div>


</body>
</html>