(function(){
    var topNavigation = document.querySelector('.top-navigation');
    var navigationLinks = document.querySelectorAll('.top-links');
    var activeLink = document.querySelector('a.active')
    var slide = document.querySelector(".active-link");

    navigationLinks.forEach(links => {
        links.addEventListener("click", slideToLink);
    })

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
        var left = getLeftValue(target);
        //console.log(left);
        slide.style.left = `${left}px`;
    }

    function getLeftValue(targetLink){
        var targetLeft = targetLink.getBoundingClientRect().left;
        var topNavigationLeft = topNavigation.getBoundingClientRect().left;
        console.log(targetLeft);
        console.log(topNavigationLeft);
        var offset = 50;
        if(window.screen.availWidth < 400){
            offset = 9;
        }
        return targetLeft - topNavigationLeft + offset;
    }

    setActiveSlide(activeLink);
})();