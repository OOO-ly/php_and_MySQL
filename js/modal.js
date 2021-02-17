
let openBt = document.getElementById("open");
let modal = document.querySelector(".modal");
let overlay = document.querySelector(".modal_overlay");

let openModal = () => {
    modal.classList.remove("hidden");
}
let closeModal = () =>{
    modal.classList.add("hidden");
}

overlay.addEventListener("click",closeModal);
openBt.addEventListener("click",openModal);
