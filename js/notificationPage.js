var username = document.querySelectorAll('.username')
var decline_btns = document.querySelectorAll('.decline-btn')
var accept_btns = document.querySelectorAll('.accept-btn')
var close_btns = document.querySelectorAll('.close')

function eliminateNotification(id, post_id, type){
    var data = new FormData()
    data.append("id",id)
    data.append("post_id",post_id)
    data.append("type", type)
    axios.post("/Spotlight/eliminateNotification.php",data)
}

decline_btns.forEach(decline_btn=>{
    decline_btn.addEventListener('click', e=>{
        e.preventDefault()
        var id = decline_btn.parentNode.parentNode.getAttribute("id")
        axios.get("/Spotlight/userRequest.php?type=3&user="+document.getElementById(id).querySelector('.username').innerHTML)
        .then(res=>{
            eliminateNotification(id, "none", "")
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
            eliminateNotification(id, "none", "")
            document.getElementById(id).remove()
        })
    })
})


close_btns.forEach(close_btn=>{
    close_btn.addEventListener("click", e=>{
        e.preventDefault()
        var id = close_btn.parentNode.parentNode.getAttribute("id")
        var post_id = document.getElementById(id).querySelector('.link-ref').getAttribute('id')
        var type = document.getElementById(id).querySelector('.link-ref').getAttribute('data-type');
        eliminateNotification(id, post_id, type)
    })
})
