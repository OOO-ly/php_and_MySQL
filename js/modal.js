
let openBt = document.getElementById("open");
let modal = document.querySelector(".modal");
let overlay = modal.querySelector(".modal_overlay");
let closebt = modal.querySelector("button");

let openModal = () => {
    modal.classList.remove("hidden");
}
let closeModal = () =>{
    modal.classList.add("hidden");
}

overlay.addEventListener("click",closeModal);
closebt.addEventListener("click",closeModal);
openBt.addEventListener("click",openModal);