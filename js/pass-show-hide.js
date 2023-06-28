const passFields = document.querySelectorAll(".form .field input[type='password']"),
    toggleBtns = document.querySelectorAll(".form .field i");
// toggling passwords and buttons for showing the password
for (let i = 0; i < toggleBtns.length; i++) {
    toggleBtns[i].onclick = () => {
        if (passFields[i].type == "password") {
            passFields[i].type = "text";
            toggleBtns[i].classList.remove("fa-sharp", "fa-solid", "fa-eye");
            toggleBtns[i].classList.add("fa-sharp", "fa-solid", "fa-eye-slash");
            toggleBtns[i].style.color = "#000";
        } else {
            passFields[i].type = "password";
            toggleBtns[i].classList.remove("fa-sharp", "fa-solid", "fa-eye-slash");
            toggleBtns[i].classList.add("fa-sharp", "fa-solid", "fa-eye");
            toggleBtns[i].style.color = "#ccc";
        }
    };
}