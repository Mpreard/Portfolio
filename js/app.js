var bool=false;//burger-menu
function cache(id){
    if(bool==true){
        $('#menu').css('margin-left', '0px');
        bool=false;
    }
    else{
        $('#menu').css('margin-left', '-400px');
        bool=true;
    }
}


function slideFromLeft() {
    var elementArray = document.querySelectorAll('.fromLeft');
    for (var i = 0; i < elementArray.length; i++) {
        elementArray[i].classList.toggle('visible');
    }
}
document.querySelector('.slideButton').addEventListener('click', slideFromLeft);

function slideFromLeft1() {
    var elementArray = document.querySelectorAll('.fromLeft1');
    for (var i = 0; i < elementArray.length; i++) {
        elementArray[i].classList.toggle('visible1');
    }
}
document.querySelector('.slideButton1').addEventListener('click', slideFromLeft1);

function slideFromLeft2() {
    var elementArray = document.querySelectorAll('.fromLeft2');
    for (var i = 0; i < elementArray.length; i++) {
        elementArray[i].classList.toggle('visible2');
    }
}
document.querySelector('.slideButton2').addEventListener('click', slideFromLeft2);