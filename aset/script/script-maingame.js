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


  const cardsContainer = document.querySelector(".kontai");

cardsContainer.addEventListener("click", (e) => {
  const target = e.target.closest(".card");

  if (!target) return;

  cardsContainer.querySelectorAll(".card").forEach((card) => {
    card.classList.remove("active");
  });

  target.classList.add("active");
});
