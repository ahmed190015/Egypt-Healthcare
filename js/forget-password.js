
document.querySelector("#enter-verifing-code").style.display = "none";
document.querySelector("#Resend").style.display = "none";




let getverfingcode = document.querySelector(".get-verifing-code");
    getverfingcode.onclick = function () {
    document.querySelector("#reset").style.display = "none";
    document.querySelector("#enter-verifing-code").style.display = "block";
    document.querySelector("#Resend").style.display = "block";


};
// let mylogin=document.querySelector(".login");
// mylogin.onclick = function() {
//  window.open("login.html", "_self",);
// };
