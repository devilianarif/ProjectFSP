<?php 
    require_once('class\achievement.php');
    require_once('class\teamMember.php');
    require_once('class\team.php');
    require_once('class\game.php');
    include 'class\paging.php';
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin-Game BLinc</title>
<link rel="stylesheet" href="aset/style/mem-archie.css">
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
     <a class="main-header-link" href="member.php">Home</a>
     <a class="main-header-link " href="mem-team.php">Teams</a>
     <a class="main-header-link" href="mem-proposal.php">Proposals</a>
     <a class="main-header-link is-active "href="#.php">Archievements</a>
    </div>

   </div>
  
   <div class="content-wrapper">
    <div class="content-wrapper-header">
   <div class="stats-container">
        <div class="stat-item">
            <img src="https://storage.googleapis.com/a1aa/image/S98nYfiVkN2AXSP9Y6D4slOhEVb8QnEG8uieDhgewSeHlQROB.jpg" alt="User icon">
            <h2>16+</h2>
            <p>SPECIALISTS</p>
        </div>
        <div class="stat-item">
            <img src="https://storage.googleapis.com/a1aa/image/efp54idRfrHvkodCF4Y07D2H2e2VH0Ne6b6oFSJOv0hGMhicC.jpg" alt="Happy clients icon">
            <h2>1256+</h2>
            <p>HAPPY CLIENTS</p>
        </div>
        <div class="stat-item">
            <img src="https://storage.googleapis.com/a1aa/image/siLZCRUtK6pwPNzSb2Al5D5GHqtiTtDHU9sQGbJ3F6kYCF5E.jpg" alt="Briefcase icon">
            <h2>27+</h2>
            <p>SUCCESSFUL CASES</p>
        </div>
    </div>
  </div>
  <div class="content-section">
     <button id="openPopuploadEvent" class="open-upload">Create New Archiement</button>

<div id="overlayEvent"></div>
<div class="popupload" id="popuploadEvent">
    <div class="pop-upload__title">Create Archiement
        <svg class="close" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle" id="closePopuploadEvent">
            <circle cx="12" cy="12" r="10" />
            <path d="M15 9l-6 6M9 9l6 6" />
        </svg>
    </div>

    <div class="coninput">
        <!-- Progress Steps (if needed) -->
        <div class="steps">
            <div class="step active">
                <div class="circle">1</div>
                <span>Step 1</span>
            </div>
            <div class="step">
                <div class="circle">2</div>
                <span>Step 2</span>
            </div>

              <div class="step">
                <div class="circle">3</div>
                <span>Step 3</span>
            </div>

              <div class="step">
                <div class="circle">4</div>
                <span>Step 4</span>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="progress-bar">
            <div class="progress" style="width: 33%;"></div>
        </div>

        <form>
        <!-- Slider coninput -- PROGRESS -->
        <div class="slider-coninput">
            <div class="slider">
                <!-- Step 1 Form: team Name -->
                <div class="slider-section">
                    <h2 class="text-h2">Name Your Archiement</h2>
                    <input name="name" class="Sinput" type="text" placeholder="Enter a name" required>
                    <div class="button-grouping">
                    <button class="buton next-btn">Next</button>
                    </div>
                </div>
  
    <div class="slider-section">
                  <h2 class="text-h2">Describe Your Archiement</h2>
                    <input name="desc" class="Sinput" type="text" placeholder="Enter a description" required>
                    <div class="button-grouping">
                            <button class="buton back-btn">Back</button>
                    <button class="buton next-btn">Next</button>
                    </div>
                </div>
   <div class="slider-section">
                   <h2 class="text-h2">Input Date</h2>
                    <input name="date" class="Sinput" type="date" required>
                    <div class="button-grouping">
                            <button class="buton back-btn">Back</button>
                    <button class="buton next-btn">Next</button>
                    </div>
                </div>


                  <!-- Step 2 Form: Event  -->
                <div class="slider-section">
                    <h2 class="text-h2">Select Team</h2>
                  <div class="select">
                        <select name="team">
                            <option value="1">Game1</option>
                            <option value="2">Game2</option>
                            <option value="3">Game3</option>
                        </select>
                    </div>
                 <div class="button-grouping">
                        <button class="buton back-btn">Back</button>
                           <button type="submit" class="buton submit-btn">Submit</button>
                    </div>
                </div>
            </div> <!-- End Slider -->
        </div> <!-- End Slider coninput -->
    </form>
    </div> <!-- End coninput -->
</div>


  <div class="content-section">
     <div class="content-section-title">Last Update Archiement</div>
      <ul>


<?php 
    $achv =  new Achievement();
    $limit = 5;
    $cari = "";
    
    if(!isset($_GET['page'])){
        $page = 1;
        $offset = 0;
    } else{
        $page = $_GET['page'];
        $offset = $page * $limit;
    }

    //LIST ACHV 
    $achievements = $achv->getAchv($cari, $offset, $limit);
    $index = 0;
    while($achvRow = $achievements->fetch_assoc()){
        $tm = new teamMember();
        $teamMembers = $tm->getTeamMember($achvRow['idteam'], "", $offset, $limit);
        $totalMembers = $teamMembers->num_rows;
        $tmString = "";
        $i = 0;

        while($teamMembersRow = $teamMembers->fetch_assoc()){
            $i++;
            $tmString .= $teamMembersRow['username'];
            if($i < $totalMembers){
                $tmString .= ", ";
            }
        }

        $g = new game();
        $game = $g->getGame("", $offset, $limit, $achvRow['gameID']);
        $teamGame = $game->fetch_assoc();


        echo' <li class="lg-product">
        <div class="products"> 
        <img src="aset/image/dota-2.jpg" alt="img" style="border:1px solid #3291b8; margin-right: 10px;"> 
        '.$achvRow['achievementName'].'
        </div>
        <span class="status">
        <span class="status-circle green"></span>   
        '.$achvRow['date'].'</span>
       <div class="button-wrapper">
       <button class="archie-btn content-button" data-popup="'.$index.'">View</button>

        <div id="overlayArchiement"></div>
        <!-- Archie Pop-up for Post 1 -->
        <div class="popupload" id="popuploadArchie-'.$index.'">
            <div class="pop-upload__title"> '.$achvRow['achievementName'].'
                <svg class="close" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M15 9l-6 6M9 9l6 6" />
                </svg>
            </div>
            <div class="content">
           
         <div class="card">
           <div class="title">
            '.$achvRow['description'].'
           </div>
           <div class="pg-numbers">
            <span>
             4
            </span>
            <span>
             10
            </span>
           </div>
           <div class="pg-bar">
            <div class="pg">
            </div>
           </div>
           <div class="description">
            You are 6 stars away from the next rank
           </div>
           <div class="details">
            <div class="detail-item">
             <strong>
              Team Name:
             </strong>
             '.$achvRow['teamName'].'
            </div>
            <div class="detail-item">
             <strong>
              Members:
             </strong>

             '.$tmString.'

            </div>
            <div class="detail-item">
             <strong>
              Date:
             </strong>
              '.$achvRow['date'].'
            </div>
           </div>
           <div class="game-box">
            <img alt="Game Image" height="80" src="https://storage.googleapis.com/a1aa/image/Oj06EwoHNezUaakYebXJPJ0qgEAGtWjaGr0FKDhLvpjs8eInA.jpg" width="80"/>
            <div class="game-info">
             <div class="game-title">
              '.$teamGame['name'].'
             </div>
             <div class="game-description">
              '.$teamGame['description'].'
             </div>
            </div>
           </div>
          </div>

          <!-- POPUP-->

            </div>
        </div>
        
                                        <div class="pop-up">
                                            <div class="pop-up__title">Update This
                                                <svg class="close" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <path d="M15 9l-6 6M9 9l6 6"></path>
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
                                ';
          $index++;
    }
?>

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
  </div>
 </div>
 <div class="overlay-app"></div>
</div>
<!-- partial -->
 <script src='aset/script/jquery351.js'></script>
 <script  src="aset/script/mem-archie.js"></script>
</body>
</html>
