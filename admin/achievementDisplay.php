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
	require_once('..\Class\achievement.php');
	require_once('..\Class\team.php');
	include "..\Class\paging.php";
	$achv =  new Achievement();
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
			echo $achv->deleteAchv($_POST["idachv"]);
		} else if($_POST["process"] == 'add'){
			if(!empty($_POST['team']) && !empty($_POST['name']) && !empty($_POST['date']) && !empty($_POST['desc'])){
				echo $achv->insertAchv($_POST['team'], $_POST['name'], $_POST['date'], $_POST['desc']);
			} else{
				echo "Insert Failed";
			}
			
		} else if($_POST["process"] == 'edit'){
			if(!empty($_POST['team']) && !empty( $_POST['name']) && !empty($_POST['date']) && !empty($_POST['desc']) && !empty($_POST["idachv"])){
				echo $achv->updateAchv($_POST['team'], $_POST['name'], $_POST['date'], $_POST['desc'], $_POST["idachv"]);
			} else{
				echo "Edit Failed";
			}
		}
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Achievement Display</title>
</head>
<body>



<?php //TABLE DISPLAY
	echo "<table border='1'>
	<tr>
		<th colspan=5>Achievements</th>

		<td> <form action='achievementDisplay.php?page=$page&cari=$cari' method='POST'>
		<input type='hidden' name='action' value= 'add'>
		<button type='submit'>Tambah Data</button> </form> </td>
	<tr> 
		<th>Achievement</th>
		<th>Date Recieved</th>
		<th>Team Name</th>
		<th>Description</th> 
		<th colspan=2>Aksi</th>
	</tr>";

	$achievements = $achv->getAchv($cari, $offset, $limit);
	while($acvRow = $achievements->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $acvRow['achievementName']."</td>";
		echo "<td>". $acvRow['date']."</td>";
		echo "<td>". $acvRow['teamName']."</td>";
		echo "<td>". $acvRow['description']. "</td>";

		//UPDATE
		echo "<td> <form action='achievementDisplay.php?page=$page&cari=$cari' method='POST'>
			<input type='hidden' name='action' value= 'edit'>
			<input type='hidden' name='idachv' value= '".htmlspecialchars($acvRow['idachievement'])."'>
			<button type='submit'>Edit Data</button> </form> </td>";

		//DELETE
		echo "<td> <form action='achievementDisplay.php?page=$page&cari=$cari' method='POST'>
			<input type='hidden' name='idachv' value='".htmlspecialchars($acvRow['idachievement'])."'>
			<input type='hidden' name='process' value= 'delete'>
			<input type='hidden' name='inputTable' value='achievement'>
			<button type='submit'>Hapus Data</button> </form> </td> </tr>";
	}
	echo "</table>" ;

	$res = $achv->getAchv($cari);
	$totalData = $res -> num_rows;
	echo generate_page($cari, $totalData, $limit, $page); 
?>

<p><a href="index.php">Back to Admin Page</a></p>
<br>

<div>
	<?php
		$editName;
		$editDate;
		$editTeam;
		$editDesc;
		$editIDteam;

		if(isset($_POST["action"])){
			if(isset($_POST["action"])){
				$editIDteam = null;
				if($_POST["action"] == "add"){
					echo "<form action='achievementDisplay.php?page=$page&cari=$cari' method='POST' enctype='multipart/form-data'>"; //INSERT
					echo "<input type='hidden' name='process' value= 'add'>";
					echo "<label>ADD ACHIEVEMENT TO TABLE</label>";
				} else{
					echo "<form action='achievementDisplay.php?page=$page&cari=$cari' method='POST' enctype='multipart/form-data'>"; //EDIT
					echo "<input type='hidden' name='process' value= 'edit'>";
					echo "<label>EDIT SELECTED ACHIEVEMENT</label>";
					echo "<input type='hidden' name='idachv' value='".$_POST['idachv']."'>"; //ID ACHIEVEMENT

					$editedGame = $achv->getAchv($cari, $offset, $limit, $_POST['idachv']);

					$edited = $editedGame->fetch_assoc();
					$editName = htmlspecialchars($edited["achievementName"]);
					$editDate = htmlspecialchars($edited["date"]);
					$editTeam = htmlspecialchars($edited["teamName"]);
					$editDesc = htmlspecialchars($edited["description"]);
					$editIDteam = $edited["idteam"];
				}

				if($_POST["action"] == "add"){
					echo "<p><label>Achievement Name:</label> <input type='text' name='name' required></p>";
					echo "<p><label>Date Recieved:</label> <input type='date' name='date' required></p>";
				} else{
					echo "<p><label>Achievement Name:</label> <input type='text' name='name' value='".$editName."' required></p>";
					echo "<p><label>Date Recieved:</label> <input type='date' name='date' value='".$editDate."' required></p>"; 
				}

				echo "<p><label>Team: </label>";

				$team =  new Team();
				$teamQuerry = $team->getTeam(); //SHOW team NAMES
				echo "<select name=team>";

				while ($teams=$teamQuerry->fetch_assoc()) {
					if($editIDteam == htmlspecialchars($teams['idteam'])){
						echo "<option value=".htmlspecialchars($teams['idteam'])." selected>".htmlspecialchars($teams['teamname'])."</option>";
					} else{
						echo "<option value=".htmlspecialchars($teams['idteam']).">".htmlspecialchars($teams['teamname'])."</option>";
					}	
				} 
				echo "</select></p>";

				if($_POST["action"] == "add"){
					echo "<p><label>Description:</label> <input type='text' name='desc' required></p>";
				} else{
					echo "<p><label>Description:</label> <input type='text' name='desc' value='".$editDesc."'' required></p>";
				}
				
				echo "<button type='submit'>Save</button></p>
				</form>";
			}
		}
	?>
</div>
</body>
</html>