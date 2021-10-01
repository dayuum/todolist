let myVar;
let message1 = document.getElementById("msg");
let div = document.getElementById("div");
let width = screen.width; 

if(width < 500){
    document.getElementById("width1").classList.remove("w-50");
    document.getElementById("width1").classList.add("w-75");
    document.getElementById("width2").classList.remove("w-50");
    document.getElementById("width2").classList.add("w-75");
    document.getElementById("width3").classList.remove("w-50");
    document.getElementById("width3").classList.add("w-75");
}

if(message1 != null){
    anim();
    myVar = setTimeout(removeAllChildNodes,2000);
}

function removeAllChildNodes() {
    while (div.firstChild) {
        div.removeChild(div.firstChild);
    }
}

function anim(){
    console.log('je suis la');
    // keyframes
    div.animate([
        { opacity: 1 },
        { opacity: 0 }
    ], {
        // timing options
        duration: 2000,
        iterations: Infinity
    });
}
