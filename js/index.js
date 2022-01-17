// Slide animation on title text
document.querySelector(".title-text").classList.add("slide-animation");
// Slide animation on title subtext
document.querySelector(".title-subtext").classList.add("slide-animation");

// var itemNumbers = document.querySelectorAll(".nav-item").length;

// for(var i = 0; i<itemNumbers; i++){
//     document.querySelectorAll("li")[i].addEventListener("mouseover", function(){

//         content = this.textContent.toLowerCase();
        
//         addHoverEffect(content);
//     });
// }
// function addHoverEffect(content){
//     var currentItem = document.querySelector("."+content);
//     currentItem.classList.add("nav-item-hover");

//     setTimeout(function(){
//         currentItem.classList.remove("nav-item-hover");
//     }, 100);
// }