<!DOCTYPE html>

<?php
	$conn = new mysqli("localhost", "root", "", "fspproject");
	if ($conn->connect_errno) {
    	die("Failed to connect to MySQL: " . $conn->connect_error);
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proposal Join Display</title>
</head>
<body>

<?php //TABLE DISPLAY
	//FUNCTIONS
	function querry($conn, $sql, $params = [], $param_types = ''){
		$stmt = $conn->prepare($sql);
		if ($params) {
        	$stmt->bind_param($param_types, ...$params);
    	}
		$stmt->execute();
		$res = $stmt->get_result();
		$stmt->close();
		return $res;
	}
//HERE

	//GAME
	echo "<table border='1'>
	<tr>
		<th colspan=5> Proposals </th>
	</tr>
	<tr> 
		<th>Member Name</th>
		<th>Team Name</th> 
		<th>Description</th>
		<th colspan=2>Status</th>
	</tr>";

	$sql = "SELECT idjoin_proposal, join_proposal.idmember, join_proposal.idteam, description, fname, username, lname, team.name, status FROM join_proposal INNER JOIN member ON join_proposal.idmember = member.idmember INNER JOIN team ON join_proposal.idteam = team.idteam ORDER BY idjoin_proposal DESC;"; //GET DATA

	$proposals = querry($conn, $sql);
	while($rows = $proposals->fetch_assoc()) {
		echo "<tr>";
		echo "<td>". $rows['fname'].' "'.$rows['username'].'" '.$rows['lname'] ."</td>";
		echo "<td>". $rows['name']. "</td>";
		echo "<td>". $rows['description']. "</td>";
//HERE
		if($rows['status'] == "waiting"){
		//APPROVE
		echo "<td> <form action=editProcess.php method='POST'>
			<input type='hidden' name='inputTable' value='proposal'>
			<input type='hidden' name='status' value= 'approved'>

			<input type='hidden' name='idteam' value='".$rows['idteam']."'>
			<input type='hidden' name='idmember' value= '".$rows['idmember']."'>
			<input type='hidden' name='desc' value= '".$rows['description']."'>

			<input type='hidden' name='idproposal' value= '".htmlspecialchars($rows['idjoin_proposal'])."'>
			<button type='submit'>Approve</button> </form> </td>";

		//REJECT
		echo "<td> <form action=editProcess.php method='POST'>
			<input type='hidden' name='inputTable' value='proposal'>
			<input type='hidden' name='status' value= 'rejected'>
			<input type='hidden' name='idproposal' value= '".htmlspecialchars($rows['idjoin_proposal'])."'>
			<button type='submit'>Reject</button> </form> </td>";

		} else{
			echo "<td colspan=2>". $rows['status']. "</td>";
		}
	}
	echo "</table>" ;

?>

<p><a href="adminMain.php">Back to Admin Page</a></p>
</body>
</html>