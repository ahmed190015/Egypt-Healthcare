document.querySelector(".virr").style.display = "none";
document.querySelector(".allerr").style.display = "none";
document.querySelector(".fracc").style.display = "none";
document.querySelector(".dess").style.display = "none";
document.querySelector(".virrr").style.display = "none";
document.querySelector(".allerrr").style.display = "none";
document.querySelector(".fraccc").style.display = "none";
document.querySelector(".desss").style.display = "block";



$("ul li a").on("click", function() {
  $("a").removeClass("active");
  $(this).addClass("active");
});





let dease = document.querySelector("#des");
dease.onclick= function (){
  document.querySelector(".dess").style.display = "block";
  document.querySelector(".virr").style.display = "none";
  document.querySelector(".allerr").style.display = "none";
  document.querySelector(".fracc").style.display = "none";
  document.querySelector(".virrr").style.display = "none";
document.querySelector(".allerrr").style.display = "none";
document.querySelector(".fraccc").style.display = "none";
document.querySelector(".desss").style.display = "none";

}




let virus = document.querySelector("#vir");
virus.onclick = function () {
  document.querySelector(".dess").style.display = "none";
  document.querySelector(".virr").style.display = "block";
  document.querySelector(".allerr").style.display = "none";
  document.querySelector(".fracc").style.display = "none";
  document.querySelector(".virrr").style.display = "none";
document.querySelector(".allerrr").style.display = "none";
document.querySelector(".fraccc").style.display = "none";
document.querySelector(".desss").style.display = "none";

};

let allergy = document.querySelector("#aller");
allergy.onclick = function () {
  document.querySelector(".dess").style.display = "none";
  document.querySelector(".virr").style.display = "none";
  document.querySelector(".allerr").style.display = "block";
  document.querySelector(".fracc").style.display = "none";
  document.querySelector(".virrr").style.display = "none";
document.querySelector(".allerrr").style.display = "none";
document.querySelector(".fraccc").style.display = "none";
document.querySelector(".desss").style.display = "none";



};

let fraction = document.querySelector("#frac");
fraction.onclick = function () {
  document.querySelector(".dess").style.display = "none";
  document.querySelector(".virr").style.display = "none";
  document.querySelector(".allerr").style.display = "none";
  document.querySelector(".fracc").style.display = "block";
  document.querySelector(".virrr").style.display = "none";
document.querySelector(".allerrr").style.display = "none";
document.querySelector(".fraccc").style.display = "none";
document.querySelector(".desss").style.display = "none";



 };


 



let deasess = document.querySelector("#see-diseases");
deasess.onclick = function () {
  document.querySelector(".dess").style.display = "none";
  document.querySelector(".virr").style.display = "none";
  document.querySelector(".allerr").style.display = "none";
  document.querySelector(".fracc").style.display = "none";
  document.querySelector(".virrr").style.display = "none";
document.querySelector(".allerrr").style.display = "none";
document.querySelector(".fraccc").style.display = "none";
document.querySelector(".desss").style.display = "block";



};

let viruss = document.querySelector("#see-viruses");
viruss.onclick = function () {
  document.querySelector(".dess").style.display = "none";
  document.querySelector(".virr").style.display = "none";
  document.querySelector(".allerr").style.display = "none";
  document.querySelector(".fracc").style.display = "none";
  document.querySelector(".virrr").style.display = "block";
document.querySelector(".allerrr").style.display = "none";
document.querySelector(".fraccc").style.display = "none";
document.querySelector(".desss").style.display = "none";



};




let allergyy = document.querySelector("#see-allergies");
allergyy.onclick = function () {
  document.querySelector(".dess").style.display = "none";
  document.querySelector(".virr").style.display = "none";
  document.querySelector(".allerr").style.display = "none";
  document.querySelector(".fracc").style.display = "none";
  document.querySelector(".virrr").style.display = "none";
document.querySelector(".allerrr").style.display = "block";
document.querySelector(".fraccc").style.display = "none";
document.querySelector(".desss").style.display = "none";



};



let fractionn = document.querySelector("#see-fractions");
fractionn.onclick = function () {
  document.querySelector(".dess").style.display = "none";
  document.querySelector(".virr").style.display = "none";
  document.querySelector(".allerr").style.display = "none";
  document.querySelector(".fracc").style.display = "none";
  document.querySelector(".virrr").style.display = "none";
document.querySelector(".allerrr").style.display = "none";
document.querySelector(".fraccc").style.display = "block";
document.querySelector(".desss").style.display = "none";



};





let de = document.querySelector("#de");
de.onclick= function (){
  document.querySelector(".desss").style.display = "none";
  document.querySelector(".dess").style.display = "block";
  

}


let vi = document.querySelector("#vi");
vi.onclick = function () {
  document.querySelector(".virrr").style.display = "none";
  document.querySelector(".virr").style.display = "block";
 

};

let al = document.querySelector("#al");
al.onclick = function () {
  document.querySelector(".allerrr").style.display = "none";
  document.querySelector(".allerr").style.display = "block";


};

let fr = document.querySelector("#fr");
fr.onclick = function () {
  document.querySelector(".fraccc").style.display = "none";
  document.querySelector(".fracc").style.display = "block";



 };