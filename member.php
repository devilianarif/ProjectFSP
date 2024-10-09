
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin-Game BLinc</title>
<link rel="stylesheet" href="aset/style/member2.css">
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
  <div class="content-section">
     <div class="content-section-title">List Member</div>
      <ul>
    <li class="lg-product">
       <div class="products">
     <img src="aset/image/dota-2.jpg" alt="img" style="border:1px solid #3291b8; margin-right: 10px;">
          Royyanzzzzzzz
       </div>
       <span class="status">
        <span class="status-circle green"></span>
        Full Name</span>
       <div class="button-wrapper">


          <div class="pop-up">
         <div class="pop-up__title">Update This 
          <svg class="close" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
           <circle cx="12" cy="12" r="10" />
           <path d="M15 9l-6 6M9 9l6 6" />
          </svg>
         </div>
         <div class="pop-up__subtitle">yakin anda ingin hapus ini ?</div>
         <div class="checkbox-wrapper">
          <input type="checkbox" id="check1" class="checkbox">
          <label for="check1">ya, saya yakin!</label>
         </div>
         <div class="content-button-wrapper">
          <button class="content-button status-button open close">Batal</button>
          <button class="content-button status-button">Lanjutkan!</button>
         </div>
        </div>
        <div class="menu">
         <button class="dropdown">
          <ul>
        
         <li class="status-button"><a href="#">delete</a></li>
          </ul>
         </button>
        </div>
       </div>
      </li>


  
 






</div>
<div class="content-section">
                            <div class="container">
                                <div class="pagination-component">
                                    <div class="pagination-anim">
                                        <button id="prev-page" aria-label="Previous Page" title="Go To Previous Page"></button>
                                        <div>
                                            <span>Page</span>
                                            <ul>
                                                <li>1</li>
                                            </ul>
                                            <span>of 10</span>
                                        </div>
                                        <button id="nxt-page" aria-label="Next Page" title="Go To Next Page"></button>
                                    </div>
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
