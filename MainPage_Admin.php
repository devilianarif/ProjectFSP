<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		img {
  			max-width: 100%;
  			height: auto;
		}
		ul{
			list-style-type: none;
			margin: 0;
			padding: 0;
		}
		#sidebarUni{
			height: 100vh;
			width: 5vw;
			position: fixed;
			padding: 0;
			margin: 0;
			left: 0;
			top: 0;
			background-color: blue;
			line-height: 0;
		}
		.sidebar{
			height: 95vh !important;
			position: absolute !important;
			top: 5vw !important;
		}
		.sidebarContainer{
			background-color: transparent !important;
		}
		#logo{
			width: 100%;
			height: auto;
		}
		#topbar{
			height: 5vw;
			width: 100vw;
			position: fixed;
			left: 0;
			top: 0;
			background-color: green;
		}
		#profile{
			position: absolute;
			height: 80%;
			width: 15vw;
			right: 0;
			top: 0;
			background-color: red;
			top: 10%;
			right: 1%;
		}


	</style>
</head>
<body>
	<div id="topbar">
		<div id="profile"></div>
	</div>

	<div id="sidebarUni"></div>
	<div id="sidebarUni" class="sidebar">
		<ul>
			<li><a><img src="https://picsum.photos/200"></a></li>
			<li><a><img src="https://picsum.photos/200"></a></li>
			<li><a><img src="https://picsum.photos/200"></a></li>
			<li><a><img src="https://picsum.photos/200"></a></li>
		</ul>
	</div>
	<div id="sidebarUni" class="sidebarContainer">
		<img id="logo" src="https://picsum.photos/200">
	</div>
</body>
</html>