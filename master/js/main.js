let userManagement = document.querySelectorAll(".userManagment")[0];
let subOrderlist = document.querySelectorAll(".container header div.navigation div.userManagment ul")[0];
let shopingCart   = document.querySelectorAll(".activeAnchor")[0];
let userManagements = document.querySelectorAll(".activeAnchor")[1];

userManagement.onclick = function (){
    subOrderlist.classList.toggle("h-s");
} 
shopingCart.onclick = function () {
    userManagements.classList.remove("act");
    this.classList.add("act");
}
userManagements.onclick = function () {
    shopingCart.classList.remove("act");
    this.classList.add("act");
}