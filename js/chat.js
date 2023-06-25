console.log("chat script loaded");
const form = document.querySelector("form"),
inputMessageField = document.querySelector(".input-msg"),
sendBtn = document.querySelector("button"),
chatBox = document.querySelector(".chat-box");
form.onsubmit = (e) => {
    e.preventDefault(); // prevent form from re-loading
}
// adding events to the send btn for inserting message into the database
sendBtn.onclick = ()=>{
    // instantiating xml object
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/insert-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let serverResponse = xhr.response;
                console.log(serverResponse);
                if(serverResponse === "success"){
                    // clear msg input box
                    inputMessageField.value = "";
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);// sending form data to php
};
// ajax for getting the chat after every 1s
setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/get-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let serverResponse = xhr.response;
                // displaying the server message/users messages dynamically
                chatBox.innerHTML = serverResponse;
                // scrolling the chat to the bottom only if chat-box is not active
                if(!chatBox.classList.contains("active")){
                    scrollChatToBottom();
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);// sending form data to php
}, 500);
// method for scrolling the chat to the bottom
scrollChatToBottom = ()=>{
    chatBox.scrollTop = chatBox.scrollHeight;
}
// adding events to chat-box for auto-scrolling
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}
