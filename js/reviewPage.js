function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

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

            var data = new FormData();
            data.append('username',document.querySelector('p.username').innerHTML);
            data.append('username_session', getCookie('username'));
            data.append('review_id', document.querySelector('main.review').getAttribute("id"));
            data.append('rating',1);
            console.log("USERNAME: "+document.querySelector('p.username').innerHTML)
            console.log("USERNAME LOGGED IN : "+getCookie('username'))
            axios.post('/Spotlight/updateLikesReviews.php',data)
            .then(res=>{
                console.log(res["data"])
                document.querySelector('.thumbs-up-value').innerHTML = res["data"][0]["number_of_likes"]
                document.querySelector('.thumbs-down-value').innerHTML = res["data"][0]["number_of_dislikes"]
            })
            .catch(err=>{console.log(err)});

            
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

            var data = new FormData();
            data.append('username',document.querySelector('p.username').innerHTML);
            data.append('username_session', getCookie('username'));
            data.append('review_id', document.querySelector('main.review').getAttribute("id"));
            data.append('rating',0);
            axios.post('/Spotlight/updateLikesReviews.php',data)
            .then(res=>{document.querySelector('.thumbs-up-value').innerHTML = res["data"][0]["number_of_likes"]
            document.querySelector('.thumbs-down-value').innerHTML = res["data"][0]["number_of_dislikes"]})
            .catch(err=>{console.log(err)});
        }
    })
})

