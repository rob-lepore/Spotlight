let selectedEmotion = window.sessionStorage.getItem("emotion");

$("[id^=emo]").on("click", (e) => {
    console.log(e.target.id);
    selectedEmotion = e.target.id;
    $("[id^=emo]").removeClass("primary")
    $("#"+selectedEmotion).addClass("primary");
    window.sessionStorage.setItem("emotion", e.target.id);
    updateNextArrow();
})

if(selectedEmotion) {
    $("#"+selectedEmotion).addClass("primary");
}

function updateNextArrow() {
    if($("#selectedSong").length && selectedEmotion) {
        $("#nextArrow").removeClass("text-secondary");
    }
}
updateNextArrow();


function goToConfirm() {
    if($("#selectedSong").length && selectedEmotion) {
        location.href = "./moodpreview.php?"+location.href.split("?")[1] + "&emo=" + selectedEmotion;
    }
}