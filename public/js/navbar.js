const menuBtn = document.getElementById("menuBtn");
const menuIcon = document.getElementById("menuIcon");
toggleMenu = () => {
  const nav = document.getElementById("nav");
  nav.classList.toggle("hidden");
  if (menuIcon.classList.contains("fa-bars")) {
    menuIcon.classList.replace("fa-bars", "fa-times");
  } else {
    menuIcon.classList.replace("fa-times", "fa-bars");
  }
};
menuBtn.addEventListener("click", toggleMenu);
