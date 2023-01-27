var paragraph = document.querySelector(".review-text");
var max_l = paragraph.getAttribute("data-show")

var len_p = paragraph.innerHTML.length
console.log(len_p)
console.log(max_l)
if(len_p > max_l){
    var showed_part = paragraph.innerHTML.substring(0,max_l)
    console.log(showed_part)
    var second_part = paragraph.innerHTML.substring(max_l)
    paragraph.innerHTML = showed_part + "<span class='read-more-span' style='display:none'>" + second_part + "</span><span class='read-more' data-type='read-more' style='font-weight:bold'>...read more</span>";
}
var read_more_btn = document.querySelector('.read-more')
if(read_more_btn != null){
    read_more_btn.addEventListener("click", (e)=>{
        e.preventDefault();
        if(read_more_btn.getAttribute('data-type') == 'read-more'){
            var hidden_part = document.querySelector('.read-more-span')
            hidden_part.setAttribute("style", "display:block")
            read_more_btn.innerHTML = "show less"
            read_more_btn.setAttribute('data-type','show-less')
        }else{
            var hidden_part = document.querySelector('.read-more-span')
            hidden_part.setAttribute("style", "display:none")
            read_more_btn.innerHTML = "...read more"
            read_more_btn.setAttribute('data-type','read-more')
        }
    })
}

var like_btns = document.querySelectorAll('.likes')

like_btns.forEach(el=>{
    el.addEventListener("click", e=>{
        e.preventDefault();
        if(el.getAttribute('data-type') == 'thumbs-up'){
            el.setAttribute('style', 'visibility:hidden')
            el.setAttribute('width', '0')
            el.setAttribute('height', '0')

            document.querySelector('[data-type=thumbs-up-fill]').setAttribute('style', 'visibility:visible')
            document.querySelector('[data-type=thumbs-up-fill]').setAttribute('width', '24')
            document.querySelector('[data-type=thumbs-up-fill]').setAttribute('height', '24')
            
            document.querySelector('[data-type=thumbs-down-fill]').setAttribute('style', 'visibility:hidden')
            document.querySelector('[data-type=thumbs-down-fill]').setAttribute('width', '0')
            document.querySelector('[data-type=thumbs-down-fill]').setAttribute('height', '0')

            document.querySelector('[data-type=thumbs-down]').setAttribute('style', 'visibility:visible')
            document.querySelector('[data-type=thumbs-down]').setAttribute('width', '24')
            document.querySelector('[data-type=thumbs-down]').setAttribute('height', '24')
            
        }else if(el.getAttribute('data-type') == 'thumbs-down'){
            el.setAttribute('style', 'visibility:hidden')
            el.setAttribute('width', '0')
            el.setAttribute('height', '0')

            document.querySelector('[data-type=thumbs-down-fill]').setAttribute('style', 'visibility:visible')
            document.querySelector('[data-type=thumbs-down-fill]').setAttribute('width', '24')
            document.querySelector('[data-type=thumbs-down-fill]').setAttribute('height', '24')
            
            document.querySelector('[data-type=thumbs-up-fill]').setAttribute('style', 'visibility:hidden')
            document.querySelector('[data-type=thumbs-up-fill]').setAttribute('width', '0')
            document.querySelector('[data-type=thumbs-up-fill]').setAttribute('height', '0')

            document.querySelector('[data-type=thumbs-up]').setAttribute('style', 'visibility:visible')
            document.querySelector('[data-type=thumbs-up]').setAttribute('width', '24')
            document.querySelector('[data-type=thumbs-up]').setAttribute('height', '24')
        }
    })
})

