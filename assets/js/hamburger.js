
const menuBtn = document.getElementById("menuBtn");
const closeBtn = document.getElementById("closeBtn");
const mobileMenu = document.getElementById("mobileMenu");

menuBtn.addEventListener("click", () => {
    mobileMenu.style.width = "100%";
});

closeBtn.addEventListener("click", () => {
    mobileMenu.style.width = "0%";
});
