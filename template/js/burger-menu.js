let burger = document.querySelector(".burger");
let menu = document.querySelector(".menu");
let body = document.querySelector("body");
let closeSidebar = document.querySelector(".close-sidebar");
let sidebar = document.querySelector(".sidebar");

burger.addEventListener("click", function () {
  burger.classList.toggle("active");
  menu.classList.toggle("active");
  body.classList.toggle("lock");
});
