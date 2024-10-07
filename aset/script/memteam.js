document.addEventListener("DOMContentLoaded", function() {
    const nextBtns = document.querySelectorAll(".next-btn");
    const backBtns = document.querySelectorAll(".back-btn");
    const submitBtn = document.querySelector(".submit-btn");
    const sliderSections = document.querySelectorAll(".slider-section");
    const progressBar = document.querySelector(".progress");
    const steps = document.querySelectorAll(".step");

    let currentStep = 0;

    // Function to update progress bar and steps
    function updateStep(step) {
        sliderSections.forEach((section, index) => {
            section.style.display = index === step ? "block" : "none";
        });

        steps.forEach((stepElem, index) => {
            stepElem.classList.toggle("active", index <= step);
        });

        progressBar.style.width = `${(step + 1) / steps.length * 100}%`;
    }

    // Event listener for next buttons
    nextBtns.forEach((button) => {
        button.addEventListener("click", function() {
            if (currentStep < sliderSections.length - 1) {
                currentStep++;
                updateStep(currentStep);
            }
        });
    });

    // Event listener for back buttons
    backBtns.forEach((button) => {
        button.addEventListener("click", function() {
            if (currentStep > 0) {
                currentStep--;
                updateStep(currentStep);
            }
        });
    });

    // Event listener for submit button
    submitBtn.addEventListener("click", function() {
        // Add your form submission logic here
        alert("Form Submitted!");
    });

    // Initialize the form by showing the first step
    updateStep(currentStep);
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