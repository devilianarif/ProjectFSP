
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin-Game BLinc</title>
<link rel="stylesheet" href="aset/style/admin-gameupload.css">
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
     <a class="main-header-link is-active" href="#">Upload</a>
    </div>

   </div>
  
   <div class="content-wrapper">
    <div class="content-wrapper-header">
   
  <button id="openPopupload" class="open-upload">Upload Games</button>

 <div id="overlay" class="overlay-app"></div>
 <div class="popupload" id="popupload">
    <div class="pop-upload__title">Upload
        <svg class="close close-btn" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle" id="closePopupload" >
            <circle cx="12" cy="12" r="10" />
            <path d="M15 9l-6 6M9 9l6 6" />
        </svg>
    </div>

    <div class="coninput">
        <!-- Progress Steps -->
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
        </div>

        <!-- Progress Bar -->
        <div class="progress-bar">
            <div class="progress" style="width: 33%;"></div>
        </div>

        <!-- Slider coninput -->
        <div class="slider-coninput">
            <div class="slider">
                <!-- Step 1 Form -->
                <div class="slider-section">
                    <h2 class="text-h2">Name Your Game</h2>
                    <input class="Sinput" type="text" placeholder="Enter a name">
                    <div class="button-grouping">
                        <button class="buton next-btn">Next</button>
                    </div>
                </div>

                <!-- Step 2 Form -->
                <div class="slider-section">
                    <h2 class="text-h2">Describe Your Game</h2>
                    <input class="Sinput" type="text" placeholder="Enter a description">
                    <div class="button-grouping">
                        <button class="buton back-btn">Back</button>
                        <button class="buton next-btn">Next</button>
                    </div>
                </div>

                <!-- Step 3 Form -->
                <div class="slider-section">
                    <div id="uploadArea" class="upload-area">
                        <!-- Header -->
                        <div class="upload-area__header">
                            <h1 class="upload-area__title">Upload your Image</h1>
                            <p class="upload-area__paragraph">
                                Only image files
                                <strong class="upload-area__tooltip">
                                    Like
                                    <span class="upload-area__tooltip-data"></span> <!-- Data handled by JS -->
                                </strong>
                            </p>
                        </div>
                        <!-- End Header -->

                        <!-- Drop Zone -->
                        <div id="dropZoon" class="upload-area__drop-zoon drop-zoon">
                            <span class="drop-zoon__icon">
                                <i class='bx bxs-file-image'></i>
                            </span>
                            <p class="drop-zoon__paragraph">Drop your file here or<br> Click to browse</p>
                            <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
                            <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
                            <input type="file" id="fileInput" class="drop-zoon__file-input" accept="image/*">
                        </div>
                        <!-- End Drop Zone -->

                        <!-- File Details -->
                        <div id="fileDetails" class="upload-area__file-details file-details">
                            <h3 class="file-details__title">Uploaded File</h3>
                            <div id="uploadedFile" class="uploaded-file">
                                <div class="uploaded-file__icon-container">
                                    <i class='bx bxs-file-blank uploaded-file__icon'></i>
                                 <span class="uploaded-file__icon-text" style="color: transparent;">
    <!-- Data handled by JS -->
</span>
                                </div>
                                <div id="uploadedFileInfo" class="uploaded-file__info">
                                    <span class="uploaded-file__name">Project 1</span>
                                    <span class="uploaded-file__counter">0%</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="button-grouping">
                            <button class="buton back-btn">Back</button>
                            <button class="buton submit-btn">Submit</button>
                        </div>
                    </div>
                </div> <!-- End Step 3 Form -->
            </div> <!-- End Slider -->
        </div> <!-- End Slider coninput -->
    </div> <!-- End coninput -->
</div>
<button id="openPopuploadEvent" class="open-upload">Upload Event</button>

<div id="overlayEvent" class="overlay-app"></div>
<div class="popupload" id="popuploadEvent">
    <div class="pop-upload__title">Upload Event
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
        </div>

        <!-- Progress Bar -->
        <div class="progress-bar">
            <div class="progress" style="width: 33%;"></div>
        </div>

        <!-- Slider coninput -->
        <div class="slider-coninput">
            <div class="slider">
                <!-- Step 1 Form: Event Name -->
                <div class="slider-section">
                    <h2 class="text-h2">Event Name</h2>
                    <input class="Sinput" type="text" placeholder="Enter event name">
                    <div class="button-grouping">
                    <button class="buton next-btn">Next</button>
                    </div>
                </div>

              

                <!-- Step 2 Form: Event Description -->
                <div class="slider-section">
                    <h2 class="text-h2">Event Description</h2>
                    <textarea class="Sinput" placeholder="Enter event description"></textarea>
                    <div class="button-grouping">
                        <button class="buton back-btn">Back</button>
                        <button class="buton submit-btn">Submit</button>
                    </div>
                </div>


                  <!-- Step 3 Form: Event Date -->
                <div class="slider-section">
                    <h2 class="text-h2">Event Date</h2>
                    <input class="Sinput" type="date">
                 <div class="button-grouping">
                        <button class="buton back-btn">Back</button>
                        <button class="buton next-btn">Next</button>
                    </div>
                </div>
            </div> <!-- End Slider -->
        </div> <!-- End Slider coninput -->
    </div> <!-- End coninput -->
</div>

    
    </div>


    <div class="content-section">
     <div class="content-section-title">History Events</div>
     <ul>
      <li class="lg-product">
       <div class="products">
     <img src="aset/image/dota-2.jpg" alt="img" style="border:1px solid #3291b8; margin-right: 10px;">
          Dota 2
       </div>
       <span class="status">
        <span class="status-circle green"></span>
        Completed</span>
       <div class="button-wrapper">
        <button class="content-button status-button open">Added</button>

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
      <li class="lg-product">
       <div class="products">
     <img src="aset/image/far-cry-5.jpg" alt="img" style="border:1px solid #3291b8; margin-right: 10px;">
        Far Cry 5
       </div>

       <span class="status">
        <span class="status-circle green"></span>
        Completed</span>
       <div class="button-wrapper">
        <button class="content-button status-button open">Added</button>


        <div class="menu">
         <button class="dropdown">
          <ul>

        
           <li class="status-button"><a href="#">delete</a></li>
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
        <span class="status-circle"></span>
        Ongoing</span>
       <div class="button-wrapper">
      <button class="content-button status-button open">Added</button>

        <div class="menu">
         <button class="dropdown">
          <ul>

          <li><a href="game-editevent.php">update</a></li>
         <li class="status-button"><a href="#">delete</a></li>
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
        <span class="status-circle"></span>
        Ongoing</span>
       <div class="button-wrapper">
      <button class="content-button status-button open">Added</button>

        <div class="menu">
         <button class="dropdown">
          <ul>

        <li><a href="game-editevent.php">update</a></li>
         <li class="status-button"><a href="#">delete</a></li>
          </ul>
         </button>
        </div>
       </div>
      </li>
       
    </div>


  <div class="content-section">
     <div class="content-section-title">History Games</div>
     <ul>
    <li class="lg-product">
       <div class="products">
     <img src="aset/image/dota-2.jpg" alt="img" style="border:1px solid #3291b8; margin-right: 10px;">
          Dota 2
       </div>
       <span class="status">
        <span class="status-circle green"></span>
        Completed</span>
       <div class="button-wrapper">
        <button class="content-button status-button open">Added</button>

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
      <li class="lg-product">
       <div class="products">
     <img src="aset/image/far-cry-5.jpg" alt="img" style="border:1px solid #3291b8; margin-right: 10px;">
        Far Cry 5
       </div>

       <span class="status">
        <span class="status-circle green"></span>
        Completed</span>
       <div class="button-wrapper">
        <button class="content-button status-button open">Added</button>


        <div class="menu">
         <button class="dropdown">
          <ul>

           <li class="status-button"><a href="#">delete</a></li>
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
        <span class="status-circle"></span>
        Ongoing</span>
       <div class="button-wrapper">
      <button class="content-button status-button open">Added</button>

        <div class="menu">
         <button class="dropdown">
          <ul>

          <li><a href="game-editgame.php">update</a></li>
         <li class="status-button"><a href="#">delete</a></li>
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
        <span class="status-circle"></span>
        Ongoing</span>
       <div class="button-wrapper">
      <button class="content-button status-button open">Added</button>

        <div class="menu">
         <button class="dropdown">
          <ul>

         <li><a href="game-editgame.php">update</a></li>
         <li class="status-button"><a href="#">delete</a></li>
          </ul>
         </button>
        </div>
       </div>
      </li>
       
    </div>


   </div>
  </div>
 </div>
 <div class="overlay-app"></div>
</div>
<!-- partial -->
 <script src='aset/script/jquery351.js'></script>
 <script  src="aset/script/script-gameupload.js"></script>
</body>
</html>
