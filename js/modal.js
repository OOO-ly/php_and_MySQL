let sign_in_bt = document.getElementById("sign_in_bt");
let sign_in_form = document.querySelector(".sign_in_form");


let sign_up_bt = document.getElementById("sign_up_bt");
let sign_up_form = document.querySelector('.sign_up_form');

// nav_item hover 에 맞춰 css를 추가하려 했으나 
// 실패 

let member_info_bt = document.getElementById("member_info_bt");
let member_info_form = document.querySelector('.member_info_form');

// console.log(member_info_bt);
// 모달 기본 셋

let modal = document.querySelector(".modal");
let overlay = document.querySelector(".modal_overlay");

let openModal = () => {
    modal.classList.remove("hidden");
}
let closeModal = () => {
    modal.classList.add("hidden");
}


overlay.addEventListener("click",closeModal);
sign_in_bt.addEventListener("click",openModal);
sign_up_bt.addEventListener("click",openModal);

let openinfo_in_form = () => {
    // member_info_form.classList.remove("hidden");
    sign_up_form.classList.add("hidden");
    sign_in_form.classList.add("hidden");
}



document.addEventListener("click",function(e){
    if(e.target && e.target.id == 'member_info_bt'){
        openModal();
        openinfo_in_form();
    }
});

//회원정보 셋




// 로그인 셋


let opensign_in_form = () => {
    sign_in_form.classList.remove("hidden");
    sign_up_form.classList.add("hidden");
    // member_info_form.classList.add("hidden");
}


sign_in_bt.addEventListener("click",opensign_in_form);

//회원 가입 셋

let open_sign_up_form = () => {
    sign_up_form.classList.remove("hidden");
    sign_in_form.classList.add("hidden");
    // member_info_form.classList.add("hidden");
}

sign_up_bt.addEventListener("click",open_sign_up_form);

