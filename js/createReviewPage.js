var search = document.querySelector(".search-bar");

search.addEventListener("input", (e)=>{
    e.preventDefault();
    var data = new FormData();
    data.append('query', search.value);
    axios.post('/Spotlight/fetchAlbums.php', data)
    .then(res=>{
        console.log(res["data"])
        var result = document.querySelector('[data-type=template]')
        result.style.visibility = "visible"
        result.setAttribute("id", res["data"]["albums"]["items"][4]["id"]);
        var img = document.querySelector('.album-cover');
        img.src = res["data"]["albums"]["items"][4]["images"][2]["url"];
        //img.style.borderRadius = "100%";
        var albumname = document.querySelector('.albumName');
        var artistName = document.querySelector('.artistname');

        albumname.innerHTML = res["data"]["albums"]["items"][4]["name"]
        res["data"]["albums"]["items"][4]["artists"].forEach(element => {
            artistName.innerHTML = element["name"] + " ";
        });
        albumname.innerHTML = res["data"]["albums"]["items"][4]["name"]
    }).catch(err=>console.log(err))
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
    data.append("date", document.querySelector(".date"))
    data.append("score", document.querySelector(".rating").getAttribute("id"))
    data.append("number_of_likes", 0)
    data.append("number_of_dislikes", 0)
    data.append("username", document.querySelector(".username"))
    axios.post("/Spotlight/reviewCreated.php", data)
    .then(res=>window.location.replace("http://localhost/Spotlight/"))
    .catch(err=>console.log(err))
})