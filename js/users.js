console.log("user script loaded!");
// getting dom elements
const searchBar = document.querySelector(".users .search input"),
    searchBtn = document.querySelector(".users .search button"),
    searchBarIcon = document.querySelector(".users .search button i"),
    userListDiv = document.querySelector(".users-list");
// hiding spninner after 1.3s
$(document).ready(() => {
    setTimeout(() => {
        $('#pageLoadSpinnerWrapper').css({
            'opacity': '0',
            'display': 'none',
        });
    }, 1300);
});
// adding event listener to the serach btn for toggling icon
searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    // on clicking cross icon clear input field and toggle the classes for the search icon
    searchBar.value = "";
    searchBarIcon.classList.toggle("fa-solid");
    searchBarIcon.classList.toggle("fa-magnifying-glass");
    searchBarIcon.classList.toggle("fa-beat-fade");
    searchBarIcon.classList.toggle("fa-sharp");
    searchBarIcon.classList.toggle("fa-solid");
    searchBarIcon.classList.toggle("fa-circle-xmark");
}
// ajax for fetching users after every 500ms
setInterval(()=>{
    if(!searchBar.classList.contains("active")){// if search bar is not active then fetch and display users 
        // instantiating xml object
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "./php/users.php", true);
        xhr.onload = () => {
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let serverResponse = xhr.response;
                    // displaying the server message/users dynamically
                    userListDiv.innerHTML = serverResponse;
                }
            }
        }
        xhr.send();
    }
}, 500);
// ajax for searching users
searchBar.onkeyup = ()=>{
    let searchKey = searchBar.value;
     // if search key is non empty
     if(searchKey != ""){
        // setting an active class for the search bar
        searchBar.classList.add("active");
        // instantiating xml object
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./php/search-user.php", true);
        xhr.onload = () => {
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let serverResponse = xhr.response;
                    // displaying the server message/users dynamically
                    userListDiv.innerHTML = serverResponse;
                }
            }
        }
        // setting the http request header
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchKey="+searchKey);
     }else{
        // removing active classes from the search bar and toggle the search btn icon
        searchBar.classList.remove("active");
        searchBtn.classList.remove("active");
        searchBarIcon.classList.remove("fa-sharp");
        searchBarIcon.classList.remove("fa-circle-xmark");
        searchBarIcon.classList.add("fa-magnifying-glass");
        searchBarIcon.classList.add("fa-beat-fade");
     }
}
