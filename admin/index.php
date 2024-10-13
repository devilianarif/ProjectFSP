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

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN PAGE</title>
</head>
<body>
<p><h1>ADMIN PANEL</h1></p>
<?php
		echo"<p>Welcome, ".$loggedUser["username"]."</p>"
?>
<p>
	<ul>
		<li><a href="memberAllDisplay.php">Member Display</a></li>
		<li><a href="teamDisplay.php">Team Display</a></li>
		<li><a href="gameDisplay.php">Game Display</a></li>
		<li><a href="eventListDisplay.php">Event Display</a></li>
		<li><a href="achievementDisplay.php">Achivement Display</a></li>
		<li><a href="joinProposalDisplay.php">Join Proposal</a></li>
		<li><a href="teamAchv.php">teamAchv</a></li>

		<li><a href="..\loginui.php">Return to Login</a></li> <!-- IMPLEMENT LOGOUT -->
		<li><a href="..\index.php">Return Home Page</a></li>
	</ul>
</p>
</body>
</html>