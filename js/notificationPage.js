var username = document.querySelectorAll('.username')
var decline_btns = document.querySelectorAll('.decline-btn')
var accept_btns = document.querySelectorAll('.accept-btn')
var close_btns = document.querySelectorAll('.close')

function eliminateNotification(id){
    var data = new FormData()
    data.append("id",id)
    axios.post("/Spotlight/eliminateNotification.php",data)
    .then(res=>console.log(res["data"]))
}

decline_btns.forEach(decline_btn=>{
    decline_btn.addEventListener('click', e=>{
        e.preventDefault()
        var id = decline_btn.parentNode.parentNode.getAttribute("id")
        axios.get("/Spotlight/userRequest.php?type=3&user="+document.getElementById(id).querySelector('.username').innerHTML)
        .then(res=>{
            document.getElementById(id).remove()
        })
    })
})


accept_btns.forEach(accept_btn=>{
    accept_btn.addEventListener('click', e=>{
        e.preventDefault()
        var id = accept_btn.parentNode.parentNode.getAttribute("id")
        axios.get("/Spotlight/userRequest.php?type=5&user="+document.getElementById(id).querySelector('.username').innerHTML)
        .then(res=>{
            eliminateNotification(id)
            document.getElementById(id).remove()
        })
    })
})


close_btns.forEach(close_btn=>{
    close_btn.addEventListener("click", e=>{
        e.preventDefault()
        var id = close_btn.parentNode.parentNode.getAttribute("id")
        console.log(id)
        eliminateNotification(id)
    })
})
