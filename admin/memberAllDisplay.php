<!DOCTYPE html>

<?php
	require_once("..\Class\member.php");
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All Member Display</title>
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
</body>
</html>