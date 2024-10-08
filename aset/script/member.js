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

    // For handling steps navigation in the pop-up form
    const nextBtns = document.querySelectorAll('#popuploadEvent .next-btn');
    const backBtns = document.querySelectorAll('#popuploadEvent .back-btn');
    const progress = document.querySelector('#popuploadEvent .progress');
    const steps = document.querySelectorAll('#popuploadEvent .step');
    const slider = document.querySelector('#popuploadEvent .slider');

    let currentStep = 0;
  // Next button functionality
    nextBtns.forEach((btn, index) => {
      btn.addEventListener('click', () => {
        if (currentStep < steps.length - 1) {
          currentStep++;
          slider.style.transform = `translateX(-${currentStep * 100}%)`;
          progress.style.width = `${(currentStep + 1) * 20}%`;
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
          progress.style.width = `${(currentStep + 1) * 20}%`;
          steps[currentStep].classList.add('active');
        }
      });
    });
   
    // Submit button functionality
    const submitBtn = document.querySelector('#popuploadEvent .submit-btn');
    submitBtn.addEventListener('click', () => {
      alert("Event has been submitted!");
      hidePopuploadEvent(); // Optionally hide the pop-up after submission
    });

    // Function to reset form and return to the initial step
    closeButtonEvent.addEventListener('click', () => {
      currentStep = 0; // Reset to the first step
      slider.style.transform = `translateX(0%)`; // Reset slider position
      progress.style.width = '50%'; // Reset progress bar
      steps.forEach((step, index) => {
        if (index === 0) {
          step.classList.add('active'); // Keep the first step active
        } else {
          step.classList.remove('active'); // Deactivate other steps
        }
      });
    });
});


document.addEventListener("DOMContentLoaded", function() {
    const overlayArchiement = document.getElementById('overlayArchiement');
    const buttons = document.querySelectorAll('.archie-btn');

    // Menangani klik pada tombol Archiement
    buttons.forEach(button => {
        const popupId = button.getAttribute('data-popup');

        button.addEventListener('click', () => {
            const popupload = document.getElementById(`popuploadArchie-${popupId}`);
            if (popupload) {
                popupload.classList.add('visible'); // Tampilkan pop-up yang sesuai
                overlayArchiement.classList.add('is-active'); // Aktifkan overlay untuk Archiement
                
                // Mendapatkan elemen tombol tutup untuk pop-up yang dibuka
                const closeButtonArchie = popupload.querySelector('.close');
                
                // Menutup pop-up Archiement ketika tombol tutup diklik
                closeButtonArchie.addEventListener('click', () => {
                    popupload.classList.remove('visible'); // Sembunyikan pop-up
                    overlayArchiement.classList.remove('is-active'); // Nonaktifkan overlay untuk Archiement
                });
            }
        });
    });

    // Menutup pop-up Archiement ketika mengklik overlay
    overlayArchiement.addEventListener('click', () => {
        const visiblePopups = document.querySelectorAll('.popupload.visible');
        visiblePopups.forEach(popupload => {
            popupload.classList.remove('visible'); // Sembunyikan pop-up
        });
        overlayArchiement.classList.remove('is-active'); // Nonaktifkan overlay untuk Archiement
    });
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

