
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin-Game BLinc</title>
<link rel="stylesheet" href="aset/style/admin-gameedit.css">
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
   <a class="menu-link notify" href="member.php">Member</a>
   
   <a class="menu-link is-active" href="game.php">Games</a>
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
    <a class="menu-link-main" href="#">Games</a>
    <div class="header-menu">
     <a class="main-header-link" href="game.php">Home</a>
     <a class="main-header-link" href="game-upload.php">Upload</a>
       <a class="main-header-link" href="game-event.php">Event</a>
      <a class="main-header-link is-active" href="#">Edit Data Games</a>
    </div>

   </div>
  
   <div class="content-wrapper">
    <div class="content-wrapper-header">
    <h2>Edit Games</h2>
    </div>
       <div class="content-section">

       <div class="kontai">
   <div class="input-group" style="margin-top: 20px;">
    <div style="position: relative; width: calc(50% - 10px); margin-right: 20px;">
     <input id="name" placeholder=" " type="text"/>
     <label for="name">
      Name
     </label>
    </div>
    <div style="position: relative; width: calc(50% - 10px);">
     <input id="description" placeholder=" " type="text"/>
     <label for="description">
      Description
     </label>
    </div>
   </div>
   <div class="image-preview" onclick="document.getElementById('file-upload').click();">
    <label for="file-upload">
    <span class="hover-text">Click 2x load file</span> 
    </label>
    <input accept="image/*" id="file-upload" onchange="previewImage(event)" style="display: none;" type="file"/>
    <img alt="Image preview" height="400" id="image-preview" src="https://via.placeholder.com/600x400" width="600"/>
    <div class="progress-container">
     <div class="file-name" id="file-name">
     </div>
     <div class="progress-percentage" id="progress-percentage">
      0%
     </div>
     <div class="progress-bar">
      <div id="progress-bar-fill">
      </div>
     </div>
    </div>
   </div>

   <div class="submit-button">
    Submit
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
  <script  src="aset/script/script-gameedit.js"></script>
</body>
</html>
