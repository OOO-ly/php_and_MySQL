const openBt = document.getElementById("open");
const modal = document.querySelector(".modal");
const overlay = modal.querySelector(".modal_overlay");
const closebt = modal.querySelector("button");

const openModal = () => {
    modal.classList.remove("hidden");
}
const closeModal = () =>{
    modal.classList.add("hidden");
}

overlay.addEventListener("click",closeModal);
closebt.addEventListener("click",closeModal);
openBt.addEventListener("click",openModal);