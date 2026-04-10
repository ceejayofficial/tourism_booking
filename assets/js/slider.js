let index = 0;
const slides = document.querySelectorAll(".slide");

function showSlide() {

    const current = slides[index];

    index = (index + 1) % slides.length;

    const next = slides[index];

    // show next FIRST (prevents black screen)
    next.classList.remove("opacity-0");
    next.classList.add("opacity-100");

    // hide current after transition
    setTimeout(() => {
        current.classList.remove("opacity-100");
        current.classList.add("opacity-0");
    }, 1000);
}

setInterval(showSlide, 3000);