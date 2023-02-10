function getNumberNotifications(){
    var icon = document.querySelector('.icon-button_badge')
    axios.get('getNotificationsNumber.php')
    .then(res=>{
        if(res["data"] == 0){
            icon.style.visibility = "hidden"
        }else{
            icon.innerHTML = res["data"]
            icon.style.visibility = "visible"
        }
    })
}
getNumberNotifications()
window.setInterval(getNumberNotifications, 1000)

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})