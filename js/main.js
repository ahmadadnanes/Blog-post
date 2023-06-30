let btn = document.getElementById("nav-btn")
let ul = document.getElementById("drop-ul")

btn.onclick = function(){
    if(ul.style.display === "block"){
        ul.style.display = "none";
    }
    else{
        ul.style.display = "block";
    }
}