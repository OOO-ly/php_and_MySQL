

// var mysql = require('modal');
// var conn = mysql.createConnection({
//     host : 'localhost',
//     user : 'root',
//     password : '12341234',
//     database : 'tnj_tutorial'
// });

// conn.connect();

// conn.query('Select * from topic',function(err, result, fields){
//     if(err){
//         console.log(err);
//     }
//     console.log(result);
// });

// conn.end();




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