<!DOCTYPE html>

<?php
	require_once('..\Class\member.php');
    $member = new member();
    session_start();

   	//CHECK PROFILE
   	if(isset($_SESSION['userid'])){
	    $res = $member->getMember(null,null,null,$_SESSION['userid']);
	    $loggedUser = $res->fetch_assoc();

	    if($loggedUser["profile"]!="member"){ header("location: ..\loginui.php"); }
   	} else{ header("location: ..\loginui.php"); }
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MEMBER PAGE</title>
</head>
<body>
	<p><h1>MEMBER PAGE</h1></p>
	<?php
		echo"<p>Welcome, ".$loggedUser["username"]."</p>"
	?>
	<p><a href="..\loginui.php">Return to Login</a></p> <!-- IMPLEMENT LOGOUT -->
	<p><a href="..\index.php">Return Home Page</a></p>
</body>
</html>