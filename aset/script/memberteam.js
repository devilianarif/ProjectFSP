//paging

const paginationContainer = document.querySelector('.pagination-anim');
const previousPage = document.getElementById('prev-page');
const nextPage = document.getElementById('nxt-page');

let currentPage = 1;

const totalNoOfPages = 10;

let isDebouncing = false;
const debounceTime = 500;

const debounce = (func, delay) => {
    let timeoutId;

    return (...args) => {
        clearTimeout(timeoutId);

        timeoutId = setTimeout(() => {
            func.apply(this, args);
        }, delay);
    };
};

const navigatePage = (bool) => {
    const container = paginationContainer.querySelector('div ul');
    const oldLiEle = container.querySelector('li');

    const newLiEle = document.createElement('li');
    newLiEle.textContent = currentPage;

    paginationContainer.setAttribute('data-to', bool ? 'next' : 'previous');

    bool ? container.appendChild(newLiEle) : container.insertBefore(newLiEle, oldLiEle);

    newLiEle.addEventListener('animationend', event => {
        container.removeChild(oldLiEle);
        paginationContainer.removeAttribute('data-to');
    }, {
        once: true
    });
}

previousPage.addEventListener('click', debounce(() => {
    currentPage = (currentPage - 1) >= 1 ? currentPage - 1 : totalNoOfPages;
    navigatePage(false);
}, debounceTime));

nextPage.addEventListener('click', debounce(() => {
    currentPage = (currentPage + 1) <= totalNoOfPages ? currentPage + 1 : 1;
    navigatePage(true);
}, debounceTime));

document.addEventListener("DOMContentLoaded", function() {
    // For Upload Games
    const popupload = document.getElementById('popupload');
    const overlay = document.getElementById('overlay');
    const closeButton = document.getElementById('closePopupload');
    const openButton = document.getElementById('openPopupload');

    // Function to show the pop-up
    function showPopupload() {
        popupload.classList.add('visible');
        overlay.classList.add('is-active'); // Activate overlay
    }

    // Function to hide the pop-up
    function hidePopupload() {
        popupload.classList.remove('visible');
        overlay.classList.remove('is-active'); // Deactivate overlay
    }

    // Event listener for the open button
    openButton.addEventListener('click', showPopupload);

    // Event listener for the close button
    closeButton.addEventListener('click', hidePopupload);

    // Optionally, you can also close the pop-up by clicking on the overlay
    overlay.addEventListener('click', hidePopupload);


    // For Upload Event
    const popuploadEvent = document.getElementById('popuploadEvent');
    const overlayEvent = document.getElementById('overlayEvent');
    const closeButtonEvent = document.getElementById('closePopuploadEvent');
    const openButtonEvent = document.getElementById('openPopuploadEvent');

    // Function to show the event pop-up
    function showPopuploadEvent() {
        popuploadEvent.classList.add('visible');
        overlayEvent.classList.add('is-active'); // Activate overlay for event
    }

    // Function to hide the event pop-up
    function hidePopuploadEvent() {
        popuploadEvent.classList.remove('visible');
        overlayEvent.classList.remove('is-active'); // Deactivate overlay for event
    }

    // Event listener for the event open button
    openButtonEvent.addEventListener('click', showPopuploadEvent);

    // Event listener for the event close button
    closeButtonEvent.addEventListener('click', hidePopuploadEvent);

    // Optionally, you can also close the event pop-up by clicking on the overlay
    overlayEvent.addEventListener('click', hidePopuploadEvent);
});



    $(function () {
 $(".menu-link").click(function () {
  $(".menu-link").removeClass("is-active");
  $(this).addClass("is-active");
 });
});

$(function () {
 $(".main-header-link").click(function () {
  $(".main-header-link").removeClass("is-active");
  $(this).addClass("is-active");
 });
});

const dropdowns = document.querySelectorAll(".dropdown");
dropdowns.forEach((dropdown) => {
 dropdown.addEventListener("click", (e) => {
  e.stopPropagation();
  dropdowns.forEach((c) => c.classList.remove("is-active"));
  dropdown.classList.add("is-active");
 });
});

$(".search-bar input")
 .focus(function () {
  $(".header").addClass("wide");
 })
 .blur(function () {
  $(".header").removeClass("wide");
 });

$(document).click(function (e) {
 var container = $(".status-button");
 var dd = $(".dropdown");
 if (!container.is(e.target) && container.has(e.target).length === 0) {
  dd.removeClass("is-active");
 }
});

$(function () {
 $(".dropdown").on("click", function (e) {
  $(".content-wrapper").addClass("overlay");
  e.stopPropagation();
 });
 $(document).on("click", function (e) {
  if ($(e.target).is(".dropdown") === false) {
   $(".content-wrapper").removeClass("overlay");
  }
 });
});

$(function () {
 $(".status-button:not(.open)").on("click", function (e) {
  $(".overlay-app").addClass("is-active");
 });
 $(".pop-up .close").click(function () {
  $(".overlay-app").removeClass("is-active");
 });
});

$(".status-button:not(.open)").click(function () {
 $(".pop-up").addClass("visible");
});

$(".pop-up .close").click(function () {
 $(".pop-up").removeClass("visible");
});



//for upload games
  const nextBtns = document.querySelectorAll('.next-btn');
    const backBtns = document.querySelectorAll('.back-btn');
    const progress = document.querySelector('.progress');
    const steps = document.querySelectorAll('.step');
    const slider = document.querySelector('.slider');
    
    let currentStep = 0;

    // Next button functionality
    nextBtns.forEach((btn, index) => {
      btn.addEventListener('click', () => {
        if (currentStep < steps.length - 1) {
          currentStep++;
          slider.style.transform = `translateX(-${currentStep * 100}%)`;
          progress.style.width = `${(currentStep + 1) * 33}%`;
          steps[currentStep].classList.add('active');
          if (currentStep > 0) {
            steps[currentStep - 1].classList.remove('active');
          }
        }
      });
    });

    // Back button functionality
    backBtns.forEach((btn, index) => {
      btn.addEventListener('click', () => {
        if (currentStep > 0) {
          steps[currentStep].classList.remove('active');
          currentStep--;
          slider.style.transform = `translateX(-${currentStep * 100}%)`;
          progress.style.width = `${(currentStep + 1) * 33}%`;
          steps[currentStep].classList.add('active');
        }
      });
    });
   
const closeBtn = document.querySelector('.close-btn'); // Seleksi tombol silang

// Fungsi untuk reset form dan kembali ke step awal
closeBtn.addEventListener('click', () => {
  currentStep = 0; // Kembali ke step awal
  slider.style.transform = `translateX(0%)`; // Reset slider ke posisi awal
  progress.style.width = '33%'; // Reset progress bar
  
  // Menghapus kelas active dari semua step
  steps.forEach((step, index) => {
    if (index === 0) {
      step.classList.add('active'); // Tetap aktif di step pertama
    } else {
      step.classList.remove('active'); // Nonaktifkan step lainnya
    }
  });

  // Reset semua input fields
  const inputs = document.querySelectorAll('.Sinput'); // Seleksi semua input dengan class .Sinput
  inputs.forEach(input => {
    input.value = ''; // Kosongkan nilai input
  });

  // Reset textarea jika ada
  const textareas = document.querySelectorAll('textarea'); // Seleksi semua textarea
  textareas.forEach(textarea => {
    textarea.value = ''; // Kosongkan nilai textarea
  });
});



// Untuk Upload Event
const nextBtnsEvent = document.querySelectorAll('#popuploadEvent .next-btn');
const backBtnsEvent = document.querySelectorAll('#popuploadEvent .back-btn');
const progressEvent = document.querySelector('#popuploadEvent .progress');
const stepsEvent = document.querySelectorAll('#popuploadEvent .step');
const sliderEvent = document.querySelector('#popuploadEvent .slider');

let currentStepEvent = 0;


nextBtnsEvent.forEach((btn, index) => {
  btn.addEventListener('click', () => {
    if (currentStepEvent < stepsEvent.length - 1) {
      currentStepEvent++;
      sliderEvent.style.transform = `translateX(-${currentStepEvent * 100}%)`;
      progressEvent.style.width = `${(currentStepEvent + 1) * 33}%`;
      stepsEvent[currentStepEvent].classList.add('active');
      if (currentStepEvent > 0) {
        stepsEvent[currentStepEvent - 1].classList.remove('active');
      }
    }
  });
});

// Back
backBtnsEvent.forEach((btn, index) => {
  btn.addEventListener('click', () => {
    if (currentStepEvent > 0) {
      stepsEvent[currentStepEvent].classList.remove('active');
      currentStepEvent--;
      sliderEvent.style.transform = `translateX(-${currentStepEvent * 100}%)`;
      progressEvent.style.width = `${(currentStepEvent + 1) * 33}%`;
      stepsEvent[currentStepEvent].classList.add('active');
    }
  });
});

//  Submit
const submitBtnEvent = document.querySelector('#popuploadEvent .submit-btn');
submitBtnEvent.addEventListener('click', () => {
  // Tambahkan logika submit di sini
  alert("Event has been submitted!");
});

// Fungsi untuk reset form dan kembali ke step awal ketika tombol Close diklik
const closeBtnEvent = document.querySelector('#popuploadEvent .close'); // Seleksi tombol silang
closeBtnEvent.addEventListener('click', () => {
  currentStepEvent = 0; // Kembali ke step awal
  sliderEvent.style.transform = `translateX(0%)`; // Reset slider ke posisi awal
  progressEvent.style.width = '33%'; // Reset progress bar
  stepsEvent.forEach((step, index) => {
    if (index === 0) {
      step.classList.add('active'); // Tetap aktif di step pertama
    } else {
      step.classList.remove('active'); // Nonaktifkan step lainnya
    }
  });
  // Reset semua input fields
  const inputs = document.querySelectorAll('.Sinput'); // Seleksi semua input dengan class .Sinput
  inputs.forEach(input => {
    input.value = ''; // Kosongkan nilai input
  });

  // Reset textarea jika ada
  const textareas = document.querySelectorAll('textarea'); // Seleksi semua textarea
  textareas.forEach(textarea => {
    textarea.value = ''; // Kosongkan nilai textarea
  });
});




// Select Upload-Area
const uploadArea = document.querySelector('#uploadArea')

// Select Drop-Zoon Area
const dropZoon = document.querySelector('#dropZoon');

// Loading Text
const loadingText = document.querySelector('#loadingText');

// Slect File Input 
const fileInput = document.querySelector('#fileInput');

// Select Preview Image
const previewImage = document.querySelector('#previewImage');

// File-Details Area
const fileDetails = document.querySelector('#fileDetails');

// Uploaded File
const uploadedFile = document.querySelector('#uploadedFile');

// Uploaded File Info
const uploadedFileInfo = document.querySelector('#uploadedFileInfo');

// Uploaded File  Name
const uploadedFileName = document.querySelector('.uploaded-file__name');

// Uploaded File Icon
const uploadedFileIconText = document.querySelector('.uploaded-file__icon-text');

// Uploaded File Counter
const uploadedFileCounter = document.querySelector('.uploaded-file__counter');

// ToolTip Data
const toolTipData = document.querySelector('.upload-area__tooltip-data');

// Images Types
const imagesTypes = [
  "jpeg",
  "png",
  "svg",
  "gif"
];

// Append Images Types Array Inisde Tooltip Data
toolTipData.innerHTML = [...imagesTypes].join(', .');

// When (drop-zoon) has (dragover) Event 
dropZoon.addEventListener('dragover', function (event) {
  // Prevent Default Behavior 
  event.preventDefault();

  // Add Class (drop-zoon--over) On (drop-zoon)
  dropZoon.classList.add('drop-zoon--over');
});

// When (drop-zoon) has (dragleave) Event 
dropZoon.addEventListener('dragleave', function (event) {
  // Remove Class (drop-zoon--over) from (drop-zoon)
  dropZoon.classList.remove('drop-zoon--over');
});

// When (drop-zoon) has (drop) Event 
dropZoon.addEventListener('drop', function (event) {
  // Prevent Default Behavior 
  event.preventDefault();

  // Remove Class (drop-zoon--over) from (drop-zoon)
  dropZoon.classList.remove('drop-zoon--over');

  // Select The Dropped File
  const file = event.dataTransfer.files[0];

  // Call Function uploadFile(), And Send To Her The Dropped File :)
  uploadFile(file);
});

// When (drop-zoon) has (click) Event 
dropZoon.addEventListener('click', function (event) {
  // Click The (fileInput)
  fileInput.click();
});

// When (fileInput) has (change) Event 
fileInput.addEventListener('change', function (event) {
  // Select The Chosen File
  const file = event.target.files[0];

  // Call Function uploadFile(), And Send To Her The Chosen File :)
  uploadFile(file);
});

// Upload File Function
function uploadFile(file) {
  // FileReader()
  const fileReader = new FileReader();
  // File Type 
  const fileType = file.type;
  // File Size 
  const fileSize = file.size;

  // If File Is Passed from the (File Validation) Function
  if (fileValidate(fileType, fileSize)) {
    // Add Class (drop-zoon--Uploaded) on (drop-zoon)
    dropZoon.classList.add('drop-zoon--Uploaded');

    // Show Loading-text
    loadingText.style.display = "block";
    // Hide Preview Image
    previewImage.style.display = 'none';

    // Remove Class (uploaded-file--open) From (uploadedFile)
    uploadedFile.classList.remove('uploaded-file--open');
    // Remove Class (uploaded-file__info--active) from (uploadedFileInfo)
    uploadedFileInfo.classList.remove('uploaded-file__info--active');

    // After File Reader Loaded 
    fileReader.addEventListener('load', function () {
      // After Half Second 
      setTimeout(function () {
        // Add Class (upload-area--open) On (uploadArea)
        uploadArea.classList.add('upload-area--open');

        // Hide Loading-text (please-wait) Element
        loadingText.style.display = "none";
        // Show Preview Image
        previewImage.style.display = 'block';

        // Add Class (file-details--open) On (fileDetails)
        fileDetails.classList.add('file-details--open');
        // Add Class (uploaded-file--open) On (uploadedFile)
        uploadedFile.classList.add('uploaded-file--open');
        // Add Class (uploaded-file__info--active) On (uploadedFileInfo)
        uploadedFileInfo.classList.add('uploaded-file__info--active');
      }, 500); // 0.5s

      // Add The (fileReader) Result Inside (previewImage) Source
      previewImage.setAttribute('src', fileReader.result);

      // Add File Name Inside Uploaded File Name
      uploadedFileName.innerHTML = file.name;

      // Call Function progressMove();
      progressMove();
    });

    // Read (file) As Data Url 
    fileReader.readAsDataURL(file);
  } else { // Else

    this; // (this) Represent The fileValidate(fileType, fileSize) Function

  };
};

// Progress Counter Increase Function
function progressMove() {
  // Counter Start
  let counter = 0;

  // After 600ms 
  setTimeout(() => {
    // Every 100ms
    let counterIncrease = setInterval(() => {
      // If (counter) is equle 100 
      if (counter === 100) {
        // Stop (Counter Increase)
        clearInterval(counterIncrease);
      } else { // Else
        // plus 10 on counter
        counter = counter + 10;
        // add (counter) vlaue inisde (uploadedFileCounter)
        uploadedFileCounter.innerHTML = `${counter}%`
      }
    }, 100);
  }, 600);
};


// Simple File Validate Function
function fileValidate(fileType, fileSize) {
  // File Type Validation
  let isImage = imagesTypes.filter((type) => fileType.indexOf(`image/${type}`) !== -1);

  // If The Uploaded File Type Is 'jpeg'
  if (isImage[0] === 'jpeg') {
    // Add Inisde (uploadedFileIconText) The (jpg) Value
    uploadedFileIconText.innerHTML = 'jpg';
  } else { // else
    // Add Inisde (uploadedFileIconText) The Uploaded File Type 
    uploadedFileIconText.innerHTML = isImage[0];
  };

  // If The Uploaded File Is An Image
  if (isImage.length !== 0) {
    // Check, If File Size Is 2MB or Less
    if (fileSize <= 2000000) { // 2MB :)
      return true;
    } else { // Else File Size
      return alert('Please Your File Should be 2 Megabytes or Less');
    };
  } else { // Else File Type 
    return alert('Please make sure to upload An Image File Type');
  };
};

// :)
