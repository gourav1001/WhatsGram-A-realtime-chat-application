const passField = document.querySelector(".form .field input[type='password']"),
    toogleBtn = document.querySelector(".form .field i");
toogleBtn.onclick = () => {
    if (passField.type == "password") {
        passField.type = "text";
        toogleBtn.classList.remove("fa-sharp", "fa-solid", "fa-eye");
        toogleBtn.classList.add("fa-sharp", "fa-solid", "fa-eye-slash");
        toogleBtn.style.color = "#000";
    } else {
        passField.type = "password";
        toogleBtn.classList.remove("fa-sharp", "fa-solid", "fa-eye-slash");
        toogleBtn.classList.add("fa-sharp", "fa-solid", "fa-eye");
        toogleBtn.style.color = "#ccc";
    }
}