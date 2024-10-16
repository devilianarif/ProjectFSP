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
	require_once('..\Class\proposal.php');
	include "..\Class\paging.php";
	$prop =  new Proposal();
	$limit = 5;
	$cari;
	$pageW; $pageA; $pageR;
	
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
	} else{
		$cari = "";
	}

	//WAITING
	if(!isset($_GET['pageW'])){
		$pageW = 1;
		$offsetW = 0;
	} else{
		$pageW = $_GET['pageW'];
		$offsetW = ($pageW-1) * $limit;
	}
	//APPROVED
	if(!isset($_GET['pageA'])){
		$pageA = 1;
		$offsetA = 0;
	} else{
		$pageA = $_GET['pageA'];
		$offsetA = ($pageA-1) * $limit;
	}
	//REJECTED
	if(!isset($_GET['pageR'])){
		$pageR = 1;
		$offsetR = 0;
	} else{
		$pageR = $_GET['pageR'];
		$offsetR = ($pageR-1) * $limit;
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proposal Join Display</title>
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
		if ($_POST["process"] == 'edit'){
			echo $prop->updateProposal($_POST['status'], $_POST['idproposal'], $_POST["idteam"], $_POST["idmember"], $_POST["description"]);
		}
	}
?>
<div class="content">
<?php //TABLE DISPLAY WAITING
	echo '<table border="1" style="width:50%">
	<tr>
		<th colspan=5> "Waiting" Proposals </th>
	</tr>
	<tr> 
		<th>Member Name</th>
		<th>Team Name</th> 
		<th>Description</th>
		<th colspan=2>Status</th>
	</tr>';

	$proposals = $prop->getProposal($cari, $offsetW, $limit, null, "waiting");
	while($rows = $proposals->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $rows['fname'].' "'.$rows['username'].'" '.$rows['lname'] ."</td>";
		echo "<td>". $rows['name']. "</td>";
		echo "<td>". $rows['description']. "</td>";

		//APPROVE
		echo"<form action=?pageW=$pageW&pageA=$pageA&pageR=$pageR&cari=$cari method='POST'>
			<input type='hidden' name='idteam' value='".$rows['idteam']."'>
			<input type='hidden' name='idmember' value= '".$rows['idmember']."'>
			<input type='hidden' name='description' value= '".$rows['description']."'>
			<input type='hidden' name='idproposal' value= '".$rows['idjoin_proposal']."'>
			<input type='hidden' name='process' value= 'edit'>
			<td> <input type='hidden' name='status' value= 'approved'>
			<button type='submit'>Approve</button> </form> </td>";

		//REJECT
		echo"<form action=?pageW=$pageW&pageA=$pageA&pageR=$pageR&cari=$cari method='POST'>
			<input type='hidden' name='idteam' value='".$rows['idteam']."'>
			<input type='hidden' name='idmember' value= '".$rows['idmember']."'>
			<input type='hidden' name='description' value= '".$rows['description']."'>
			<input type='hidden' name='idproposal' value= '".$rows['idjoin_proposal']."'>
			<input type='hidden' name='process' value= 'edit'>
			<td> <input type='hidden' name='status' value= 'rejected'>
			<button type='submit'>Reject</button> </form> </td>";
	}
	echo "</table>" ;

	$res = $prop->getProposal($cari, null, null, null, "waiting");
	$totalDataW = $res -> num_rows;
	echo bunchProposal($cari, $totalDataW, $limit, $pageW, $pageW, $pageA, $pageR, "W");
?>
	<br><br>
<?php //TABLE DISPLAY APPROVED
	echo '<table border="1" style="width:50%">
	<tr>
		<th colspan=5> "Approved" Proposals </th>
	</tr>
	<tr> 
		<th>Member Name</th>
		<th>Team Name</th> 
		<th>Description</th>
		<th colspan=2>Status</th>
	</tr>';

	$proposals = $prop->getProposal($cari, $offsetA, $limit, null, "approved");
	while($rows = $proposals->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $rows['fname'].' "'.$rows['username'].'" '.$rows['lname'] ."</td>";
		echo "<td>". $rows['name']. "</td>";
		echo "<td>". $rows['description']. "</td>";
		echo "<td colspan=2>". $rows['status']. "</td>";
	}
	echo "</table>" ;

	$res = $prop->getProposal($cari, null, null, null, "approved");
	$totalDataA = $res -> num_rows;
	echo bunchProposal($cari, $totalDataA, $limit, $pageA, $pageW, $pageA, $pageR, "A");
?>
	<br><br>
<?php //TABLE DISPLAY REJECTED
	echo '<table border="1" style="width:50%">
	<tr>
		<th colspan=5> "Rejected" Proposals </th>
	</tr>
	<tr> 
		<th>Member Name</th>
		<th>Team Name</th> 
		<th>Description</th>
		<th colspan=2>Status</th>
	</tr>';

	$proposals = $prop->getProposal($cari, $offsetR, $limit, null, "rejected");
	while($rows = $proposals->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $rows['fname'].' "'.$rows['username'].'" '.$rows['lname'] ."</td>";
		echo "<td>". $rows['name']. "</td>";
		echo "<td>". $rows['description']. "</td>";
		echo "<td colspan=2>". $rows['status']. "</td>";
	}
	echo "</table>" ;

	$res = $prop->getProposal($cari, null, null, null, "rejected");
	$totalDataR = $res -> num_rows;
	echo bunchProposal($cari, $totalDataR, $limit, $pageR, $pageW, $pageA, $pageR, "R");
?>

<p><a href="index.php">Back to Admin Page</a></p>
</div>
</body>
</html>