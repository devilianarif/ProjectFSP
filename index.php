<!DOCTYPE html>

<?php
	require_once('Class\member.php');
    $member = new member();
    session_start();
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOME PAGE</title>
</head>
<body>
	<p><h1>HOME PAGE</h1></p>
	<?php
		if(isset($_SESSION['userid'])){
			$res = $member->getMember(null,null,null,$_SESSION['userid']);
	    	$loggedUser = $res->fetch_assoc();

	    	if($loggedUser["profile"]=="admin"){ 
	    		echo '<p><a href="admin\index.php">Admin Page</a></p>';
	    	} else if($loggedUser["profile"]=="member"){
	    		echo '<p><a href="member\index.php">Member Page</a></p>';
	    	}
		}
	?>
	<p><a href="loginui.php">Login Page</a></p> <!--IMPLEMENT LOGOUT-->
</body>
</html>