let inp = document.querySelectorAll('.log  input[type=text]');
let pass = document.querySelectorAll('.log  input[type=password]');
let lbl = document.querySelectorAll('.log .form label');

function loginValidation(){
    let isTrue = true;
    for(let i = 0; i < lbl.length; i++){
        if(i == 0){
        if(inp[0].value == ""){
            lbl[i].style.borderColor = "#D31919";
            inp[0].addEventListener("click", function () {
                lbl[i].style.borderColor = "#6972F0";
            });
            inp[0].addEventListener("keypress", function () {
                lbl[i].style.borderColor = "#6972F0";
            });
            isTrue = false;
        }
        }
        if(i == 1 || i == 2){
        if(pass[0].value == ""){
            lbl[i].style.borderColor = "#D31919";
            pass[0].addEventListener("click", function () {
                lbl[i].style.borderColor = "#6972F0";
            });
            pass[0].addEventListener("keypress", function () {
                lbl[i].style.borderColor = "#6972F0";
            });
            isTrue = false;
        }
        }
    }
    return isTrue;
}