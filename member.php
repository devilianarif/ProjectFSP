
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin-Game BLinc</title>
<link rel="stylesheet" href="aset/style/member.css">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="video-bg">
 <video width="320" height="240" autoplay loop muted>
  <source src="aset/video/back-highlight.mp4" type="video/mp4">

</video>
</div>
<div class="app">
 <div class="header">
  <div class="menu-circle"></div>
  <div class="header-menu">
   <a class="menu-link " href="dasboard.php">Dasboard</a>
   <a class="menu-link is-active" href="#">Member</a>
   <a class="menu-link " href="game.php">Games</a>
  </div>
  <div class="search-bar">
   <input type="text" placeholder="Search">
  </div>
  <div class="header-profile">
  <h3 style="color: white;">DevilianArif </h3>
   <img class="profile-img" src="https://images.unsplash.com/photo-1600353068440-6361ef3a86e8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="">
  </div>
 </div>
 <div class="wrapper">
   <?php include 'leftside.php'; ?>
  <div class="main-container">
   <!-- buat alter ntar -->
   <div class="main-header">
    <a class="menu-link-main" href="#">Member</a>
    <div class="header-menu">
     <a class="main-header-link is-active" href="#">Home</a>
     <a class="main-header-link " href="mem-team.php">Teams</a>
     <a class="main-header-link" href="mem-proposal.php">Proposals</a>
     <a class="main-header-link " href="mem-archie.php">Archievements</a>
    </div>

   </div>
  
   <div class="content-wrapper">
   
  <div class="tainer">
        <div class="hexagon">
            <span>75</span>
        </div>
        <div class="info">
            <div class="rank">Admin Mode</div>
            <div class="username">Devilianarif</div>
            <div class="gr-bar">
                <div class="gr"></div>
            </div>
            <div class="points">terdapat 50 dari 100 member aktif dalam tim</div>
        </div>
    </div>

  
 






</div>

   </div>
  </div>
 </div>
 <div class="overlay-app"></div>
</div>
<!-- partial -->
 <script src='aset/script/jquery351.js'></script>
 <script  src="aset/script/member.js"></script>
</body>
</html>
