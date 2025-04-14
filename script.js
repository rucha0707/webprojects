const navlinks = document.querySelector("navlinks");

window.addEventListener("scroll", function () {
  navlinks.classList.toggle("sticky", window.scrollY > 0);
});