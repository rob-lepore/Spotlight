var topNavigation = document.querySelector('.top-navigation');
var navigationLinks = document.querySelectorAll('.top-links');
var activeLink = document.querySelector('a.active')
var slide = document.querySelector(".active-link");

function slideToLink(e){
    removeActiveClass();
    setActiveSlide(e.target);
    e.target.classList.add("active")
}

function removeActiveClass(){
    activeLink = document.querySelector('a.active');
    activeLink.classList.remove("active");
}

function setActiveSlide(target){
    console.log(target.offsetLeft)
    console.log(target.offsetWidth)
    slide.style.left = `${target.offsetLeft}px`;
    slide.style.width = `${target.offsetWidth}px`;
}

function engage_slidebar(){
    navigationLinks.forEach(links => {
        links.addEventListener("click", slideToLink);
    })

    setActiveSlide(activeLink);
}


engage_slidebar()

addEventListener("resize", (event) => {
    var activeLink = document.querySelector('a.active')
    setActiveSlide(activeLink);
});