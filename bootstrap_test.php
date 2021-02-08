<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hello, world!</title>
     <link rel="stylesheet" href="./modal_style.css" type="text/css">
</head>

<body>
    <!-- <h1>Hello, world!</h1>

    <button id="open">Open</button>
    <div class="modal hidden">
        <div class="modal_overlay"></div>
        <div class="modal__content">
            <h3>삭제할 아이디를 입력해주세요</h3>
            <button> 취소 </button>
        </div>
    </div>
    <script language="javascript" type="text/javascript" src="./modal.js"></script>
    
    
     -->

           
<style type="text/css">
.modal1{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.modal_overlay{
    background-color: rgba(0, 0, 0, 0.6);
    width: 100%;
    height: 100%;
    position: absolute;
}
.modal__content{
    background-color: salmon;
    padding: 50px 100px;
    text-align: center;
    position: relative;
    top: 0px;
    width: 20%;
    
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19),0 6px 6px  rgba(0, 0, 0, 0.23);
    border-radius: 10px;   


}
h3{
    margin: 0;
}
.hidden1{
    display: none;
}
</style>

<script>
        let author = {
            id: NULL,
            
            openBt: document.getElementById("delete"+this.id),
            modal : document.querySelector(".modal"+this.id),
            overlay : modal.querySelector(".modal_overlay"+this.id),
            closebt : modal.querySelector("button"),
            
            author : (var author_id) => {
                this.id = author_id;
                openBt = document.getElementById("delete"+this.id);
                modal  = document.querySelector(".modal"+this.id);
                overlay = modal+this.id.querySelector(".modal_overlay"+this.id);
                closebt = modal+this.id.querySelector("button");
            },
            openModal : () => {
                modal+this.id.classList.remove("hidden"+this.id);
            },
            closeModal : () => {
                modal+this.id.classList.add("hidden"+this.id);
            }
            
           

        };
        let author_1 = new author('1');
        
       
        <script>
        let author = {
            id: NULL,
            
            openBt: document.getElementById("delete"+this.id),
            modal : document.querySelector(".modal"+this.id),
            overlay : modal.querySelector(".modal_overlay"+this.id),
            closebt : modal.querySelector("button"),
            
            author : (author_id) => {
                this.id = author_id;
                openBt = document.getElementById("delete"+this.id);
                modal  = document.querySelector(".modal"+this.id);
                overlay = modal+this.id.querySelector(".modal_overlay"+this.id);
                closebt = modal+this.id.querySelector("button");
            },
            openModal : () => {
                modal+this.id.classList.remove("hidden"+this.id);
            },
            closeModal : () => {
                modal+this.id.classList.add("hidden"+this.id);
            },
            
            overlay:addEventListener("click",closeModal),
            closebt:addEventListener("click",closeModal),
            openBt:addEventListener("click",openModal),

        };
        author(1);
    </script>

            
    // </script>
        <button id="delete1">delete</button>
        <div class="modal1 hidden1">
            <div class="modal_overlay1"></div>
            <div class="modal__content1">
                <h3>삭제할 아이디를 입력해주세요</h3>
                
               <button> 취소 </button>
            </div>
        </div>
    
           <script>
            document.write(author_1.id);
            document.getElementById("test").innerHTML = '출력';
    //     const openBt = document.getElementById("1delete");
    //     const modal = document.querySelector(".modal1");
    //     const overlay = modal.querySelector(".1modal_overlay");
    //     const closebt = modal.querySelector("button");

    //     const openModal = () => {
    //         modal.classList.remove("hidden1");
    //     }
    //     const closeModal = () =>{
    //         modal.classList.add("hidden1");
    //     }

    //     overlay.addEventListener("click",closeModal);
    //     closebt.addEventListener("click",closeModal);
    //     openBt.addEventListener("click",openModal);
    //     </script>

</body>

</html>