console.log("login script loaded!");
const form = document.querySelector(".login form"),
    continueToChatBtn = form.querySelector(".button input"),
    errorTxt = form.querySelector(".error-txt");
form.onsubmit = (e) => {
    e.preventDefault(); // prevent form from re-loading
}
continueToChatBtn.onclick = () => {
    // instantiating xml object
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/login.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let serverResponse = xhr.response;
                if(serverResponse === "success"){
                    window.location.href = "users.php";
                }else{// displaying the error message received from the server
                    errorTxt.textContent = serverResponse;
                    errorTxt.style.display = "block";
                    $(".error-txt").fadeOut(5000);
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);// sending form data to php
}