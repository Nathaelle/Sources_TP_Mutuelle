document.getElementById("formins").style.display = "none";

var buttons = document.getElementsByClassName("switchbutt");

for(let button of buttons) {
    button.addEventListener("click", switchforms);
}

function switchforms() {

   if(document.getElementById("formins").style.display == "none") {
        document.getElementById("formins").style.display = "block";
        document.getElementById("formcon").style.display = "none";
    } else {
        console.log("connexion");
        document.getElementById("formins").style.display = "none";
        document.getElementById("formcon").style.display = "block";
    }

    for(let button of buttons) {
        button.addEventListener("click", switchforms);
    }
}