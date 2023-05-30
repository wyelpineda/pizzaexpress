// menu toggle
let navbar = document.querySelector(".navbar");
function menutoggle(){
    if(navbar.style.maxHeight == "0px"){
        navbar.style.maxHeight = "200px";
    }
    else{
        navbar.style.maxHeight = "0px";
    }
}

    document.getElementById("image").onchange = function(){
    document.getElementById("form").submit();
};