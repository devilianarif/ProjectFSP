<!DOCTYPE html>

<?php //BUGGY
require_once('..\Class\achievement.php');
require_once('..\Class\team.php');
include "..\Class/paging.php";

$achv = new Achievement();
$limit = 5;
$cari = isset($_GET['cari']) ? $_GET['cari'] : "";
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Process any POST requests
if (isset($_POST["process"])) {
    if ($_POST["process"] == 'delete') {
        echo $achv->deleteAchv($_POST["idachv"]);
    } else if ($_POST["process"] == 'add') {
        echo $achv->insertAchv($_POST['team'], $_POST['name'], $_POST['date'], $_POST['desc']);
    } else if ($_POST["process"] == 'edit') {
        echo $achv->updateAchv($_POST['team'], $_POST['name'], $_POST['date'], $_POST['desc'], $_POST["idachv"]);
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

<form method="GET" action="">
    <p><label>Team: </label>
    <?php
    $team = new Team();
    $teamQuery = $team->getTeam(); // Show team names
    echo "<select name='idteam' onchange='this.form.submit()'>"; // Submit the form on change

    if(isset($_GET['idteam'])){
    	$idteam = $_GET["idteam"];
    } else{
    	$firstTeam =  $team->getTeam(null, null, 1, $idteam)->fetch_assoc();
    	$idteam = $firstTeam['idteam'];
    }


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

	$achievements = $achv->getTeamAchv($idteam, $offset, $limit);
	while($acvRow = $achievements->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $acvRow['achievementName']."</td>";
		echo "<td>". $acvRow['date']."</td>";
		echo "<td>". $acvRow['teamName']."</td>";
		echo "<td>". $acvRow['description']. "</td>";
	}
	echo "</table>" ;

	$res = $achv->getTeamAchv($cari);
	$totalData = $res -> num_rows;
	echo generate_page($cari, $totalData, $limit, $page); 
?>
</div>

<p><a href="index.php">Back to Admin Page</a></p>
</body>
</html>