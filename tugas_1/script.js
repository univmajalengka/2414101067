// Slider Logic for Ragunan Slider
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}

// Auto slide every 4 seconds
setInterval(() => {
    plusSlides(1);
}, 4000);

// Mobile menu toggle
function toggleMenu() {
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('open');
}

/* ================== WAHANA DRAG SCROLL ================== */
const wahanaList = document.querySelector(".wahana-list");
let isDown = false;
let startX;
let scrollLeft;

wahanaList.addEventListener("mousedown", (e) => {
    isDown = true;
    wahanaList.classList.add("active");
    startX = e.pageX - wahanaList.offsetLeft;
    scrollLeft = wahanaList.scrollLeft;
});
wahanaList.addEventListener("mouseleave", () => {
    isDown = false;
    wahanaList.classList.remove("active");
});
wahanaList.addEventListener("mouseup", () => {
    isDown = false;
    wahanaList.classList.remove("active");
});
wahanaList.addEventListener("mousemove", (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - wahanaList.offsetLeft;
    const walk = (x - startX) * 2; // scroll speed
    wahanaList.scrollLeft = scrollLeft - walk;
});

/* ================== WAHANA BUTTON SCROLL ================== */
function scrollWahana(direction) {
    const list = document.querySelector('.wahana-list');
    const scrollAmount = 270; // sesuaikan dengan width wahana + gap
    list.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
}

// Scroll Galeri
function scrollGaleri(direction) {
    const list = document.querySelector('.galeri-list');
    const scrollAmount = 270; // sesuaikan dengan width gambar + gap
    list.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
}

// Drag scroll Galeri
const galeriList = document.querySelector(".galeri-list");
let isDownGaleri = false;
let startXGaleri;
let scrollLeftGaleri;

galeriList.addEventListener("mousedown", (e) => {
    isDownGaleri = true;
    galeriList.classList.add("active");
    startXGaleri = e.pageX - galeriList.offsetLeft;
    scrollLeftGaleri = galeriList.scrollLeft;
});
galeriList.addEventListener("mouseleave", () => {
    isDownGaleri = false;
    galeriList.classList.remove("active");
});
galeriList.addEventListener("mouseup", () => {
    isDownGaleri = false;
    galeriList.classList.remove("active");
});
galeriList.addEventListener("mousemove", (e) => {
    if (!isDownGaleri) return;
    e.preventDefault();
    const x = e.pageX - galeriList.offsetLeft;
    const walk = (x - startXGaleri) * 2; // scroll speed
    galeriList.scrollLeft = scrollLeftGaleri - walk;
});
