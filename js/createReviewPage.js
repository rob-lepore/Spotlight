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
    var id = new URLSearchParams(window.location.search)
    data.append("text", document.querySelector("textarea").value)
    data.append("album", id.get("id"))
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