<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin-Game  BLinc</title>
   <link rel="stylesheet" href="aset/style/admin-game.css">
<!--<link rel="stylesheet" href="./style.css">-->

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
   <a class="menu-link " href="Dasboard.php">Dasboard</a>
   <a class="menu-link notify" href="member.php">Member</a>
   <a class="menu-link" href="event.php">Tournament</a>
   <a class="menu-link is-active" href="game.php">Games</a>
  </div>
  <div class="search-bar">
   <input type="text" placeholder="Search">
  </div>
  <div class="header-profile">
   <div class="notification">
    <span class="notification-number">3</span>
       <a href="#">
    <svg viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
     <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0" />
    </svg></a>
   </div>
   <img class="profile-img" src="https://images.unsplash.com/photo-1600353068440-6361ef3a86e8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="">
  </div>
 </div>
 <div class="wrapper">
   <?php include 'leftside.php'; ?>
  <div class="main-container">
   <!-- buat alter ntar -->
   <div class="main-header">
    <a class="menu-link-main" href="#">Games</a>
    <div class="header-menu">
     <a class="main-header-link is-active" href="#">Home</a>
     <a class="main-header-link" href="game-upload.php">Upload</a>
    </div>

   </div>
  
   <div class="content-wrapper">
    <div class="content-wrapper-header">
<div class="gallery">
  <div class="mage"><img src="https://kodfun.github.io/Reels/ZoomRotate/1.png"></div>
  <div class="mage"><img src="https://kodfun.github.io/Reels/ZoomRotate/2.png"></div>
  <div class="mage"><img src="https://kodfun.github.io/Reels/ZoomRotate/3.png"></div>
  <div class="mage"><img src="https://kodfun.github.io/Reels/ZoomRotate/1.png"></div>
  <div class="mage"><img src="https://kodfun.github.io/Reels/ZoomRotate/2.png"></div>
</div>

</div>


  
    <div class="content-section">
     <div class="content-section-title">Terbaru</div>
     <div class="apps-card">
      <div class="app-card">
       <span>
      <img src="aset/image/fortnite.jpg" alt="img" style="border:1px solid #3291b8; margin-right: 10px;">
     
       </span>
       <div class="app-card__subtext">
        <h3>Fortnite</h3>
        Fortnite is a battle royale game where players battle to be the last one standing on an island, with a focus on building structures and an ever-changing environment. </div>
       <div class="app-card-buttons">
        <button class="content-button status-button">Update</button>
        <div class="menu"></div>
       </div>
      </div>
      <div class="app-card">
       <span>
       <img src="aset/image/pubg.jpg" alt="img" style="border:1px solid #3291b8; margin-right: 10px;">
       
       </span>
       <div class="app-card__subtext">
        <h3>PUBG</h3>
        PUBG (PlayerUnknown's Battlegrounds) is a battle royale game where players parachute onto an island, gather weapons, and fight to be the last one standing. </div>
       <div class="app-card-buttons">
        <button class="content-button status-button">Update</button>
        <div class="menu"></div>
       </div>
      </div>
      <div class="app-card">
       <span>
     <img src="aset/image/dota-2.jpg" alt="img" style="border:1px solid #3291b8; margin-right: 10px;">
   
       </span>
       <div class="app-card__subtext">
        <h3>Dota 2</h3>
          Dota 2 is a MOBA where two teams of five compete to destroy the enemy's Ancient using unique heroes and strategy.you can play together with your friend
       </div>
       <div class="app-card-buttons">
        <button class="content-button status-button">Update</button>
        <div class="menu"></div>
       </div>

      </div>
     </div>
    </div>


    <div class="content-section">
     <div class="content-section-title">News</div>
     <ul>
      <li class="lg-product">
       <div class="products">
     <img src="aset/image/dota-2.jpg" alt="img" style="border:1px solid #3291b8; margin-right: 10px;">
          Dota 2
       </div>
       <span class="status">
        <span class="status-circle green"></span>
        updated</span>
       <div class="button-wrapper">
        <button class="content-button status-button open">Open</button>
        <div class="menu">
         <button class="dropdown">
          <ul>
           <li><a href="#">detail</a></li>
           <li><a href="#">update</a></li>
           <li><a href="#">delete</a></li>
          </ul>
         </button>
        </div>
       </div>
      </li>
      <li class="lg-product">
       <div class="products">
     <img src="aset/image/far-cry-5.jpg" alt="img" style="border:1px solid #3291b8; margin-right: 10px;">
        Far Cry 5
       </div>

       <span class="status">
        <span class="status-circle"></span>
        Update Available</span>
       <div class="button-wrapper">
        <button class="content-button status-button">update now</button>
        <div class="pop-up">
         <div class="pop-up__title">Update This 
          <svg class="close" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
           <circle cx="12" cy="12" r="10" />
           <path d="M15 9l-6 6M9 9l6 6" />
          </svg>
         </div>
         <div class="pop-up__subtitle">klik ya untuk lanjut, gk ada harapan kembali  <a href="#">Learn more</a></div>
         <div class="checkbox-wrapper">
          <input type="checkbox" id="check1" class="checkbox">
          <label for="check1">delete all data</label>
         </div>
         <div class="checkbox-wrapper">
          <input type="checkbox" id="check2" class="checkbox">
          <label for="check2">Remove all project</label>
         </div>
         <div class="content-button-wrapper">
          <button class="content-button status-button open close">Cancel</button>
          <button class="content-button status-button">Continue</button>
         </div>
        </div>
        <div class="menu">
         <button class="dropdown">
          <ul>
   <li><a href="#">detail</a></li>
           <li><a href="#">update</a></li>
           <li><a href="#">delete</a></li>
          </ul>
         </button>
        </div>
       </div>
      </li>
      <li class="lg-product">
       <div class="products">
      <img src="aset/image/rdr-2.jpg" alt="img" style="border:1px solid #3291b8; margin-right: 10px;">
        RDR 2
       </div>
       <span class="status">
        <span class="status-circle green"></span>
        Updated</span>
       <div class="button-wrapper">
        <button class="content-button status-button open">Open</button>
        <div class="menu">
         <button class="dropdown">
          <ul>
   <li><a href="#">detail</a></li>
           <li><a href="#">update</a></li>
           <li><a href="#">delete</a></li>
          </ul>
         </button>
        </div>
       </div>
      </li>
     </ul>
    </div>



   </div>
  </div>
 </div>
 <div class="overlay-app"></div>
</div>
<!-- partial -->
    <script src='aset/script/jquery351.js'></script>
  <script  src="aset/script/script-maingame.js"></script>

</body>
</html>