
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
     <a class="main-header-link" href="game.php">Home</a>
     <a class="main-header-link" href="game-upload.php">Upload</a>
       <a class="main-header-link" href="game-event.php">Event</a>
      <a class="main-header-link is-active" href="#">Edit Data Event</a>
    </div>

   </div>
  
   <div class="content-wrapper">
    <div class="content-wrapper-header">
    <h2>Edit Event</h2>
    </div>
       <div class="content-section">
<div class="kontai">
   <div class="input-group" style="margin-top: 20px;">
      <div style="position: relative; width: calc(100% + 10px);">
         <input id="name" placeholder=" " type="text" style="width: 100%;"/>
         <label for="name">
            Name
         </label>
      </div>
   </div>
   <div class="textarea-group" style="relative; width: calc(100% + 10px);">
      <textarea id="additional-info" placeholder=" " rows="5" style="width: 100%;"></textarea>
      <label for="additional-info">
         Additional Information
      </label>
   </div>
   <div class="date-group" style="relative; width: calc(100% + 10px);">
      <input id="date" onblur="(this.type='text')" onfocus="(this.type='date')" placeholder=" " type="text" style="width: 100%;"/>
      <label for="date">
         Date
      </label>
   </div>
   <div class="submit-button" style="width: 700px;">
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
