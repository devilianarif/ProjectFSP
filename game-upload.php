
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin-Game BLinc</title>
<link rel="stylesheet" href="aset/style/admin-game-upload.css">
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
     <a class="main-header-link is-active" href="#">Upload</a>
      <a class="main-header-link" href="game-event.php">Event</a>
    </div>

   </div>
  
   <div class="content-wrapper">
     <div class="tainer">
    <div class="bner">
        <img alt="Banner image" height="500" src="aset/image/ml.jpg" width="1200"/>
    </div>
  <div class="platons">
    <div id="openPopupload" class="platon">
       <svg
  width="24"
  height="24"
  viewBox="0 0 24 24"
  fill="none"
  xmlns="http://www.w3.org/2000/svg"
>
  <path
    d="M15.4695 11.2929C15.0789 10.9024 14.4458 10.9024 14.0553 11.2929C13.6647 11.6834 13.6647 12.3166 14.0553 12.7071C14.4458 13.0976 15.0789 13.0976 15.4695 12.7071C15.86 12.3166 15.86 11.6834 15.4695 11.2929Z"
    fill="currentColor"
  />
  <path
    d="M16.1766 9.17156C16.5671 8.78103 17.2003 8.78103 17.5908 9.17156C17.9813 9.56208 17.9813 10.1952 17.5908 10.5858C17.2003 10.9763 16.5671 10.9763 16.1766 10.5858C15.7861 10.1952 15.7861 9.56208 16.1766 9.17156Z"
    fill="currentColor"
  />
  <path
    d="M19.7121 11.2929C19.3216 10.9024 18.6885 10.9024 18.2979 11.2929C17.9074 11.6834 17.9074 12.3166 18.2979 12.7071C18.6885 13.0976 19.3216 13.0976 19.7121 12.7071C20.1027 12.3166 20.1027 11.6834 19.7121 11.2929Z"
    fill="currentColor"
  />
  <path
    d="M16.1766 13.4142C16.5671 13.0237 17.2003 13.0237 17.5908 13.4142C17.9813 13.8048 17.9813 14.4379 17.5908 14.8284C17.2003 15.219 16.5671 15.219 16.1766 14.8284C15.7861 14.4379 15.7861 13.8048 16.1766 13.4142Z"
    fill="currentColor"
  />
  <path d="M6 12iD3XhCQfYF5sf6FaMrzrGFxzrKJ4u85L" fill="currentColor" />
  <path
    fill-rule="evenodd"
    clip-rule="evenodd"
    d="M7 5C3.13401 5 0 8.13401 0 12C0 15.866 3.13401 19 7 19H17C20.866 19 24 15.866 24 12C24 8.13401 20.866 5 17 5H7ZM17 7H7C4.23858 7 2 9.23858 2 12C2 14.7614 4.23858 17 7 17H17C19.7614 17 22 14.7614 22 12C22 9.23858 19.7614 7 17 7Z"
    fill="currentColor"
  />
</svg>
        <h3>Upload Game</h3>
        
    </div>
    
    <div id="overlay" class="overlay-app"></div>
    <div class="popupload" id="popupload">
        <div class="pop-upload__title">Upload
            <svg class="close close-btn" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="closePopupload">
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
        <div  id="openPopuploadEvent" class="platon">
          <svg
  width="24"
  height="24"
  viewBox="0 0 24 24"
  fill="none"
  xmlns="http://www.w3.org/2000/svg"
>
  <path
    d="M16 7C15.4477 7 15 7.44772 15 8C15 8.55228 15.4477 9 16 9H19C19.5523 9 20 8.55228 20 8C20 7.44772 19.5523 7 19 7H16Z"
    fill="currentColor"
  />
  <path
    d="M15 12C15 11.4477 15.4477 11 16 11H19C19.5523 11 20 11.4477 20 12C20 12.5523 19.5523 13 19 13H16C15.4477 13 15 12.5523 15 12Z"
    fill="currentColor"
  />
  <path
    d="M16 15C15.4477 15 15 15.4477 15 16C15 16.5523 15.4477 17 16 17H19C19.5523 17 20 16.5523 20 16C20 15.4477 19.5523 15 19 15H16Z"
    fill="currentColor"
  />
  <path
    fill-rule="evenodd"
    clip-rule="evenodd"
    d="M3 3C1.34315 3 0 4.34315 0 6V18C0 19.6569 1.34315 21 3 21H21C22.6569 21 24 19.6569 24 18V6C24 4.34315 22.6569 3 21 3H3ZM21 5H13V19H21C21.5523 19 22 18.5523 22 18V6C22 5.44772 21.5523 5 21 5ZM3 5H11V19H3C2.44772 19 2 18.5523 2 18V6C2 5.44772 2.44772 5 3 5Z"
    fill="currentColor"
  />
</svg>
            <h3>Upload Event</h3>
          
        </div>
       
    </div>
</div>


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
                             <button class="buton next-btn">Next</button>
                
                    </div>
                </div>


                  <!-- Step 3 Form: Event Date -->
                <div class="slider-section">
                    <h2 class="text-h2">Event Date</h2>
                    <input class="Sinput" type="date">
                 <div class="button-grouping">
                        <button class="buton back-btn">Back</button>
                           <button class="buton submit-btn">Submit</button>
                    </div>
                </div>
            </div> <!-- End Slider -->
        </div> <!-- End Slider coninput -->
    </div> <!-- End coninput -->
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