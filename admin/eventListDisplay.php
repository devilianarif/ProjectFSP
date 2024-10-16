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
	require_once('..\Class\event.php');
	include "..\Class\paging.php";
	$event =  new Event();
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
	<title>Admin Event List Display</title>
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
			echo $event->deleteEvent($_POST["idevent"]);
		} else if ($_POST["process"] == 'add'){
			if(!empty($_POST['name']) && !empty($_POST['date']) && !empty($_POST['desc'])){
				$eventCheck = $event->nameCheck($_POST['name'])->fetch_assoc();
				if(isset($eventCheck)){
					echo "Event name already used";
				} else{
					echo $event->insertEvent($_POST['name'], $_POST['date'], $_POST['desc']);
				}			
			} else{
				echo "Insert Failed";
			}
		} else if ($_POST["process"] == 'edit'){
			if(!empty($_POST['name']) && !empty($_POST['date']) && !empty($_POST['desc']) && !empty($_POST["idevent"])){

				$oldData = $event->getEvent(null, null, null, $_POST['idevent'])->fetch_assoc();
				$eventCheck = $event->nameCheck($_POST['name'])->fetch_assoc();
				if(isset($eventCheck) && $oldData['name'] != $eventCheck['name']){
					echo "Event name already used";
				} else{
					echo $event->updateEvent($_POST['name'], $_POST['date'], $_POST['desc'], $_POST["idevent"]);
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
		<th colspan=4>Events</th>

		<td> <form action='eventListDisplay.php?page=$page&cari=$cari' method='POST'>
		<input type='hidden' name='action' value= 'add'>
		<button type='submit'>Add Data</button> </form> </td>
	<tr> 
		<th>Event Name</th>
		<th>Date</th>
		<th>Description</th> 
		<th colspan=2>Action</th>
	</tr>";

	$events = $event->getEvent($cari, $offset, $limit);
	while($eventsRow = $events->fetch_assoc()) {
		echo "<tr>";
		echo "<td> <a href=eventDisplay.php?idevent=".htmlspecialchars($eventsRow['idevent']).">" . $eventsRow['name']. "</a></td>";
		echo "<td>". $eventsRow['date']."</td>";
		echo "<td>". $eventsRow['description']. "</td>";

		//UPDATE
		echo "<td> <form action='eventListDisplay.php?page=$page&cari=$cari' method='POST'>
			<input type='hidden' name='action' value= 'edit'>
			<input type='hidden' name='idevent' value= '".htmlspecialchars($eventsRow['idevent'])."'>
			<button type='submit'>Edit Data</button> </form> </td>";

		//DELETE
		echo "<td> <form action='eventListDisplay.php?page=$page&cari=$cari' method='POST'>
			<input type='hidden' name='idevent' value='".htmlspecialchars($eventsRow['idevent'])."'>
			<input type='hidden' name='process' value= 'delete'>
			<button type='submit'>Delete Data</button> </form> </td> </tr>";
	}
	echo "</table>" ;

	$res = $event->getEvent($cari);
	$totalData = $res -> num_rows;
	echo generate_page($cari, $totalData, $limit, $page); 

?>

<p><a href="index.php">Back to Admin Page</a></p>
<br>

<div>
	<?php
		$editName;
		$editDate;
		$editDesc;

		if(isset($_POST["action"])){
			if(isset($_POST["action"])){
			if($_POST["action"] == "add"){
				echo "<form action='eventListDisplay.php?page=$page&cari=$cari' method='POST' enctype='multipart/form-data'>";
				echo "<label>ADD EVENT TO TABLE</label>";
				echo "<input type='hidden' name='process' value= 'add'>";
			} else{
				echo "<form action='eventListDisplay.php?page=$page&cari=$cari' method='POST' enctype='multipart/form-data'>";
				echo "<label>EDIT SELECTED EVENT</label>";
				echo "<input type='hidden' name='process' value= 'edit'>";
				echo "<input type='hidden' name='idevent' value='".$_POST['idevent']."'>"; //ID EVENT

				$edited = $event->getEvent($cari, $offset, $limit, $_POST['idevent']);

				$edited = $edited->fetch_assoc();
				$editName = htmlspecialchars($edited["name"]);
				$editDate = htmlspecialchars($edited["date"]);
				$editDesc = htmlspecialchars($edited["description"]);
			}

			if($_POST["action"] == "add"){
				echo "<p><label>Event Name:</label> <input type='text' name='name' required></p>";
				echo "<p><label>Date:</label> <input type='date' name='date' required></p>";
				echo "<p><label>Description:</label> <input type='text' name='desc' required></p>";
			} else{
				echo "<p><label>Event Name:</label> <input type='text' name='name' value='".$editName."' required></p>";
				echo "<p><label>Date:</label> <input type='date' name='date' value='".$editDate."' required></p>"; 
				echo "<p><label>Description:</label> <input type='text' name='desc' value='".$editDesc."'' required></p>";
			}
			
			echo "<button type='submit'>Save</button></p>
			</form>";
		}}
	?>
</div>
</div>
</body>
</html>