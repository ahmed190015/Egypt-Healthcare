
document.querySelector(".post-text").style.cssText = "border-radius:30px";

  document.querySelector(".post").style.display = "none";
  let posttext = document.querySelector(".post-text");
    posttext.onclick = function () {
    document.querySelector(".post").style.display = "block";
    document.querySelector(".polll").style.display = "none";
    document.querySelector(".video-image").style.display = "none";
    document.querySelector(".life").style.display = "none";
   

};
    let cancelpost = document.querySelector(".cancel-post");
    cancelpost.onclick = function () {
    document.querySelector(".post").style.display = "none";
   

};





document.querySelector(".polll").style.display = "none";
let pollpost = document.querySelector(".poll-post");
pollpost.onclick = function () {
    document.querySelector(".polll").style.display = "block";
    document.querySelector(".post").style.display = "none";
    document.querySelector(".video-image").style.display = "none";
    document.querySelector(".life").style.display = "none";
};


let cancelpool = document.querySelector(".cancel-poll");
cancelpool.onclick = function () {
document.querySelector(".polll").style.display = "none";


};



document.querySelector(".video-image").style.display = "none";
let videoimagepost = document.querySelector(".video-image-post");
videoimagepost.onclick = function () {
    document.querySelector(".video-image").style.display = "block";
    document.querySelector(".polll").style.display = "none";
    document.querySelector(".post").style.display = "none";
    document.querySelector(".life").style.display = "none";
};

let cancelvideoimage = document.querySelector(".cancel-video-image");
cancelvideoimage.onclick = function () {
    document.querySelector(".video-image").style.display = "none";


};











// let seeappoint = document.querySelector("#see-appoint");
// seeappoint.onclick= function (){
//   document.querySelector(".doctor-details").style.display = "none";
  
  

// };























