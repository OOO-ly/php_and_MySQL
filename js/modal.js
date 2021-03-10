

let sign_in_bt = document.getElementById("sign_in_bt");
let sign_in_form = document.querySelector(".sign_in_form");


let sign_up_bt = document.getElementById("sign_up_bt");
let sign_up_form = document.querySelector('.sign_up_form');



// 모달 기본 셋

let modal = document.querySelector(".modal");
let overlay = document.querySelector(".modal_overlay");

let openModal = () => {
    modal.classList.remove("hidden");
}
let closeModal = () => {
    modal.classList.add("hidden");
}


// overlay.addEventListener("Click",closeModal);
sign_in_bt.addEventListener("Click",openModal);
sign_up_bt.addEventListener("Click",openModal);


// 로그인 셋


let opensign_in_form = () => {
    sign_in_form.classList.remove("hidden");
    sign_up_form.classList.add("hidden");
}


sign_in_bt.addEventListener("click",opensign_in_form);

//회원 가입 셋

let open_sign_up_form = () => {
    sign_up_form.classList.remove("hidden");
    sign_in_form.classList.add("hidden");
}

sign_up_bt.addEventListener("click",open_sign_up_form);

