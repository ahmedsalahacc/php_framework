function scrollL(val){
    if(val === 1){
        var left =document.querySelector(".h_scrollFis")
    }
    else{
        var left =document.querySelector(".h_scrollSec")
    }
    left.scrollBy(350,0)

}


function scrollR(val){
    if(val === 1){
        var left =document.querySelector(".h_scrollFis")
    }
    else{
        var left =document.querySelector(".h_scrollSec")
    }
    left.scrollBy(-350,0)

}
