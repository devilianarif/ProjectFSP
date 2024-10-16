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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN PAGE</title>
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
<div class="content">
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
		<br>
		<li><a href="..\index.php">Return Home Page</a></li>
		<li><a href="..\loginui.php">Logout</a></li>
	</ul>
</p>
</div>
</body>
</html>