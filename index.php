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
	    	echo '<p><a href="loginui.php">Logout<a></p>';
		} else{
			echo '<p><a href="loginui.php">Login<a></p>';
		}
	?>
	
	</div>
</body>
</html>