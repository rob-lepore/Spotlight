var edit = document.querySelector(".edit");
var username = document.querySelector(".username")
var name_surname = document.querySelector(".realname")
var profile_pic = document.querySelector(".select-file")

edit.addEventListener("click", e=>{
    e.preventDefault();
    profile_pic.style.visibility = "visible";
    username.disabled=false;
    username.style.border = "1px solid #000000"
    name_surname.disabled = false;
    name_surname.style.border = "1px solid #000000"
    console.log("prova");
})
