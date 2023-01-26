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
(()=>{
    //vulnerability se l'utente cambiasse il valore del cookie potrebbe modificare il profilo di un utente
    //contollare il cookie atraverso il db
    var createbtn = document.querySelector('.create-btn')
    var search = new URLSearchParams(window.location.search)
    console.log(getCookie('username'))
    console.log(search.toString())
    if(!(getCookie('username') == search.get('user'))){
        document.querySelector('.edit').removeChild(document.querySelector('.edit').lastChild);
        document.querySelector('.edit').remove();
        createbtn.remove();
    }else{
        document.querySelector('.follow').remove();
        document.querySelector('.friend').remove();
    }
})()
var edit = document.querySelector(".edit");
var username = document.querySelector(".username")
var name_surname = document.querySelector(".realname")
var profile_pic = document.querySelector(".select-file")
var save_btn = document.querySelector(".save-btn")
var friend_btn = document.querySelector('.friend')
var follow_btn = document.querySelector('.follow')
var create_btn = document.querySelector('.create-btn')

if(edit != null){
edit.addEventListener("click", e=>{
    e.preventDefault();
    profile_pic.style.visibility = "visible";
    username.disabled=false;
    username.style.border = "1px solid #000000"
    name_surname.disabled = false;
    name_surname.style.border = "1px solid #000000"
    save_btn.style.visibility = "visible"
})
}

if(create_btn != null){
    create_btn.addEventListener("click", e=>{
        e.preventDefault();
        activeLink = document.querySelector('a.active');
        if(activeLink.getAttribute('data-value') == "Posts"){
            window.location.replace("/Spotlight/newPost.php")
        }else if(activeLink.getAttribute('data-value') == "Reviews"){
            window.location.replace("/Spotlight/createReview.php")
        }
    })
}

if(friend_btn != null){
    friend_btn.addEventListener("click", e=>{
        e.preventDefault()
        if(friend_btn.classList.contains('not_friend')){
            axios.get("/Spotlight/userRequest.php?type=2&user="+username.value).then(res=>{
                friend_btn.value = "cancel request";
                friend_btn.classList.remove("not_friend");
                friend_btn.classList.add("friends");
                console.log(res)
            })
        }else if(friend_btn.classList.contains('.friends')){
            axios.get("/Spotlight/userRequest.php?type=3&user="+username.value).then(res=>{
                friend_btn.value = "friend request";
                friend_btn.classList.remove("friends");
                friend_btn.classList.add("not_friend");
            })
        }
    })
}

if(follow_btn != null){
    follow_btn.addEventListener("click", e=>{
        e.preventDefault()
        if(follow_btn.classList.contains('not_follow')){
            //console.log(username.value)
            axios.get("/Spotlight/userRequest.php?type=0&user="+username.value).then(res=>{
                follow_btn.value = "unfollow";
                follow_btn.classList.remove("not_follow");
                follow_btn.classList.add("following");
                console.log(res["data"])
            }).catch(err=>{console.log(err)})
        }else if(follow_btn.classList.contains('following')){
            axios.get("/Spotlight/userRequest.php?type=1&user="+username.value).then(res=>{
                follow_btn.value = "follow";
                follow_btn.classList.remove("following");
                follow_btn.classList.add("not_follow");
            })
        }
    })
}
save_btn.addEventListener("click", e=>{
    e.preventDefault();
    var data = new FormData()
    const names = name_surname.value.split(" ")
    data.append('username', username.value)
    data.append('first_name',names[0])
    data.append("last_name",names[1])
    data.append('profile_pic', profile_pic.files[0])
    console.log(profile_pic.files[0])
    profile_pic.style.visibility = "hidden";
    username.disabled=true;
    username.style.border = "none"
    name_surname.disabled = true;
    name_surname.style.border = "none"
    save_btn.style.visibility = "hidden"
    axios.post('/Spotlight/save_update.php', data, {headers:{'Content-Type':'multipart/form-data'}}).then(res=>{
        console.log(res["data"])
    }).catch(err=>{
        console.log(err)
    })
})
