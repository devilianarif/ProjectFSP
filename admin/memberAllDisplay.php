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
	include "..\Class\paging.php";
	$member =  new Member();
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
<div class="tempTop">
	<h1 style="color: #f8f9fa; margin: 0px; float: left;">INFORMATICS</h1>
</div>
<div class="content">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All Member Display</title>
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

<?php //TABLE DISPLAY
	echo "<table border='1'>
	<tr>
		<th colspan=3> All Members </th>
	</tr>
	<tr> 
		<th>Member Name</th>
		<th>Userame</th>
		<th>Profile</th> 
	</tr>";

	$members = $member->getMember($cari, $offset, $limit);

	while($memberRow = $members->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $memberRow['fname']." ".$memberRow['lname'] ."</td>";
		echo "<td>". $memberRow['username'] ."</td>";
		echo "<td>". $memberRow['profile']. "</td></tr>";
	}
	echo "</table>" ;

	$res = $member -> getMember($cari);
	$totalData = $res -> num_rows;
	echo generate_page($cari, $totalData, $limit, $page); 

?>

<p><a href="index.php">Back to Admin Page</a></p>
</div>
</body>
</html>