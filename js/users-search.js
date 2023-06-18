const searchBar = document.querySelector(".users .search input"),
    searchBtn = document.querySelector(".users .search button"),
    searchBarIcon = document.querySelector(".users .search button i");

searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBarIcon.classList.toggle("fa-solid");
    searchBarIcon.classList.toggle("fa-magnifying-glass");
    searchBarIcon.classList.toggle("fa-beat-fade");
    searchBarIcon.classList.toggle("fa-sharp");
    searchBarIcon.classList.toggle("fa-solid");
    searchBarIcon.classList.toggle("fa-circle-xmark");
}