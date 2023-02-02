let searchType = "Follower";
let input = document.querySelector("input");
let results = document.querySelector("#results");
let user_owner = document.querySelector('main').getAttribute('id');

function setSearch(value, btn) {
    results.innerHTML = "";
    input.value = "";

    searchType = value;
    document.querySelectorAll("button").forEach(b => {
        b.classList.remove("primary");
        b.classList.add("secondary");
    })
    btn.classList.remove("secondary");
    btn.classList.add("primary");

}

input.addEventListener("input", e => {
    e.preventDefault();


    if (input.value == "") {
        results.innerHTML = "";
        return;
    }

    $.ajax({
        url: 'searchFriendsOrFollowers.php',
        type: 'POST',
        data: {
            username_search: input.value,
            username_owner: user_owner,
            type: searchType
        },
        success: (response) => {
            console.log(response)
            results.innerHTML = "";
            if (searchType == "Friend") {
                response.forEach(user => {
                    results.innerHTML += buildListElement(user.username, user.first_name + " " + user.last_name, "upload/" + user.profile_pic, user.username, "profile.php?user=")
                });
            }
            if (searchType == "Follower") {
                response.forEach(user => {
                    console.log(response)
                    results.innerHTML += buildListElement(user.username, user.first_name + " " + user.last_name, "upload/" + user.profile_pic, user.username, "profile.php?user=")
                });
            }
            if (searchType == "Following") {
                response.forEach(user => {
                    results.innerHTML += buildListElement(user.username, user.first_name + " " + user.last_name, "upload/" + user.profile_pic, user.username, "profile.php?user=")
                });
            }
            }
        })
    }
)

function buildListElement(title, subtitle, imgUrl, id, baseURL) {
    return `
                <a style="text-decoration:none; color: var(--text-on-surface);" href=${baseURL + id}  >
                    <div class='d-flex my-2 align-items-center'>
                        <img class=${searchType == "user" ? "profile-pic" : 'album-cover'} style="border-radius:100%;" src=${imgUrl}>
                        <div class="overflow-hidden d-block">
                            <span class="text-truncate">${title}</span class="text-truncate">
                            <br>
                            <span class="text-truncate">${subtitle}</span class="text-truncate">
                        </div>
                    </div>
                </a>
                `
}