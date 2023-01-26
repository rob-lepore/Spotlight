//var search = document.querySelector(".search-bar");

// search.addEventListener("input", (e)=>{
//     e.preventDefault();
//     var data = new FormData();
//     data.append('query', search.value);
//     axios.post('/Spotlight/fetchAlbums.php', data)
//     .then(res=>{
//         console.log(res["data"])
//         var result = document.querySelector('[data-type=template]')
//         result.style.visibility = "visible"
//         result.setAttribute("id", res["data"]["albums"]["items"][4]["id"]);
//         var img = document.querySelector('.album-cover');
//         img.src = res["data"]["albums"]["items"][4]["images"][2]["url"];
//         //img.style.borderRadius = "100%";
//         var albumname = document.querySelector('.albumName');
//         var artistName = document.querySelector('.artistname');

//         albumname.innerHTML = res["data"]["albums"]["items"][4]["name"]
//         res["data"]["albums"]["items"][4]["artists"].forEach(element => {
//             artistName.innerHTML = element["name"] + " ";
//         });
//         albumname.innerHTML = res["data"]["albums"]["items"][4]["name"]
//     }).catch(err=>console.log(err))
// })

var btn_songlist = document.querySelector('[data-bs-toggle]')
btn_songlist.addEventListener("click", e=>{
    //per il momento per ovviare problemi di caricamento
    setTimeout(() => { 
        var songlist = document.getElementById("songsList").querySelectorAll('a')
        songlist.forEach(el=>{
        el.addEventListener("click", e=>{
            e.preventDefault();
            var result = document.querySelector('[data-type=template]')
            result.style.visibility = "visible"
            var search_p = new URLSearchParams(window.location.search)
            result.setAttribute("id", search_p.get("id"));
            var img = document.querySelector('.album-cover-img');
            img.src = el.querySelector('.album-cover').getAttribute("src");
            //img.style.borderRadius = "100%";
            var names = el.querySelectorAll('span')
            var albumname = document.querySelector('.albumName');
            var artistName = document.querySelector('.artistname');
            console.log(names[0].innerHTML)
            albumname.innerHTML = names[0].innerHTML;
            artistName.innerHTML = names[1].innerHTML;
        })
    })
    console.log(songlist)
    }, 1000);
})

var stars = document.querySelectorAll('.rate');
stars.forEach(el=>{
    el.addEventListener("click",e=>{
        e.preventDefault();
        var id_star = el.getAttribute("id")
        var num = parseInt(id_star.slice(-1));
        for(let i = 1; i <= num;i++){
            var s = document.querySelector("#star-fill-"+String(i))
            s.setAttribute("width", "16")
            s.setAttribute("height", "16")
            s.style.visibility = "visible"

            var s = document.querySelector("#star-"+String(i))
            s.setAttribute("width", "0")
            s.setAttribute("height", "0")
            s.style.visibility = "hidden"
        }

        for(let i = num+1; i <=5; i++){
            console.log("#star-fill-"+String(i))
            var s = document.querySelector("#star-fill-"+String(i))
            s.setAttribute("width", "0")
            s.setAttribute("height", "0")
            s.style.visibility = "hidden"

            var s = document.querySelector("#star-"+String(i))
            s.setAttribute("width", "16")
            s.setAttribute("height", "16")
            s.style.visibility = "visible"
        }

        var section = document.querySelector(".rating")
        section.setAttribute("id", String(num))
    })
})

var submit = document.querySelector(".submit")

submit.addEventListener("click", e=>{
    e.preventDefault();
    var data = new FormData()
    data.append("text", document.querySelector("textarea").value)
    data.append("album", document.querySelector('[data-type=template]').getAttribute("id"))
    data.append("date", document.querySelector(".date").innerHTML)
    data.append("score", document.querySelector(".rating").getAttribute("id"))
    data.append("number_of_likes", 0)
    data.append("number_of_dislikes", 0)
    data.append("username", document.querySelector(".username").innerHTML)
    axios.post("/Spotlight/reviewCreated.php", data)
    .then(res=>{
        if(res["data"] == "SUCCESS"){
            window.location.replace("http://localhost/Spotlight/")
        }else{
            var div = document.createElement("div")
            div.setAttribute("class", "alert alert-danger alert-dismissible fade show")
            div.setAttribute("role", "alert")
            div.innerHTML = "An error occured during the publishing of the review , please try again"
            var btn = document.createElement("button")
            btn.setAttribute("type", "button")
            btn.setAttribute("class", "btn-close")
            btn.setAttribute("data-bs-dismiss", "alert")
            btn.setAttribute("aria-label","Close")
            div.insertBefore(btn, div.firstChild)
            document.body.insertBefore(div, document.body.firstChild)
        }
        })
    .catch(err=>console.log(err))
})