




const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = [...document.querySelectorAll(".step p")];
const progressCheck = [...document.querySelectorAll(".step .check")];
const bullet = [...document.querySelectorAll(".step .bullet")];
let max = 4;
let current = 1;

const Type = document.querySelector(".type");
const Oneway = document.querySelector("#tripType1");
const Page = document.querySelector(".no-thing");
const Pagee = document.querySelector(".no-thin");
const Pag = document.querySelector(".no-thi");
const Pa = document.querySelector(".no-th");
const Paa = document.querySelector(".no-t");
const fil = document.querySelector(".fil-p");
const Pgg = document.querySelector(".no-l");
const prevBtnTyp = document.querySelector(".prev-type");
const nextBtnTyp = document.querySelector(".next-type");
const height = document.querySelector(".container");


const StopoversBtn = document.querySelector(".stopovers");
const GoingStopoversBtn = document.querySelector(".goingstopovers");
const ReturnStopoversBtn = document.querySelector(".returnstopovers");
const StopoversModl = document.querySelector("#Stopovers");
const GoingStopoversModl = document.querySelector("#GoingStopovers");
const ReturnStopoversModl = document.querySelector("#ReturnStopovers");
const select1 = document.querySelector("#mySelect1");
const select2 = document.querySelector("#mySelect2");
const select3 = document.querySelector("#mySelect3");

var x = document.getElementById("myform").innerHTML;
var i;
var txt = "";







prevBtnFourth.addEventListener("click", function(){
  if(Oneway.checked){
    slidePage.style.marginLeft = "-25%";
 
    height.classList.remove("container-stpr-vh");
    height.classList.add("container-stpr");
    Type.classList.add("active");
    Page.classList.add("no-one");
    Pagee.classList.add("no-one");
    Pag.classList.add("no-one");
    Pa.classList.add("no-one");
    Paa.classList.add("no-one");
    Pgg.classList.add("no-one");
    fil.classList.remove("fil-p");
    bullet[current - 2].classList.remove("active");
  bullet[current - 1].classList.remove("actives");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  progressText[current - 1].classList.remove("actives");

  current -= 1;

   
  }else{
    slidePage.style.marginLeft = "-50%";
    height.classList.remove("container-stpr-vh");
    height.classList.add("container-stpr");

  
  bullet[current - 2].classList.remove("active");
  bullet[current - 1].classList.remove("actives");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  progressText[current - 1].classList.remove("actives");

  current -= 1;
  }
});


nextBtnFirst.addEventListener("click", function(){
  slidePage.style.marginLeft = "-25%";
  height.classList.add("container-stpr-vh");
  height.classList.remove("container-stpr");
  bullet[current - 1].classList.add("active");
  bullet[current - 0].classList.add("actives");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  progressText[current - 0].classList.add("actives");
  current += 1;
});


nextBtnSec.addEventListener("click", function(){
  if(Oneway.checked){
    height.classList.remove("container-stpr-vh");
    height.classList.add("container-stpr");
    Type.classList.add("active");
    Page.classList.add("no-one");
    Pagee.classList.add("no-one");
    Pag.classList.add("no-one");
    Pa.classList.add("no-one");
    Paa.classList.add("no-one");
    Pgg.classList.add("no-one");
    fil.classList.remove("fil-p");
    bullet[current - 1].classList.add("active");
  bullet[current - 0].classList.add("actives");
  progressCheck[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  progressText[current - 0].classList.add("actives");

  current += 1;

   
  }else{
    slidePage.style.marginLeft = "-50%";
    height.classList.remove("container-stpr-vh");
    height.classList.add("container-stpr");
    bullet[current - 1].classList.add("active");
  bullet[current - 0].classList.add("actives");
  progressCheck[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  progressText[current - 0].classList.add("actives");

  current += 1;
  }
});
prevBtnThird.addEventListener("click", function(){
  slidePage.style.marginLeft = "-25%";
  height.classList.add("container-stpr-vh");
  height.classList.remove("container-stpr");
  bullet[current - 2].classList.remove("active");
  bullet[current - 1].classList.remove("actives");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  progressText[current - 1].classList.remove("actives");
  current -= 1;
});
prevBtnSec.addEventListener("click", function(){
  slidePage.style.marginLeft = "0%";
  height.classList.remove("container-stpr-vh");
  height.classList.add("container-stpr");
  bullet[current - 2].classList.remove("active");
  bullet[current - 1].classList.remove("actives");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  progressText[current - 1].classList.remove("actives");
  current -= 1;
});

prevBtnTyp.addEventListener("click", function(){
  height.classList.add("container-stpr-vh");
  height.classList.remove("container-stpr");
  Type.classList.remove("active");
  Page.classList.remove("no-one");
  Pagee.classList.remove("no-one");
  Pag.classList.remove("no-one");
  Pa.classList.remove("no-one");
  Paa.classList.remove("no-one");
  Pgg.classList.remove("no-one");
  fil.classList.add("fil-p");
  bullet[current - 2].classList.remove("active");
  bullet[current - 1].classList.remove("actives");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  progressText[current - 1].classList.remove("actives");
  current -= 1;
});


nextBtnTyp.addEventListener("click", function(){
  slidePage.style.marginLeft = "-75%";
  Type.classList.remove("active");
  bullet[current - 1].classList.add("active");
  bullet[current - 0].classList.add("actives");
  progressCheck[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  progressText[current - 0].classList.add("actives");

  current += 1;
});


nextBtnThird.addEventListener("click", function(){
  slidePage.style.marginLeft = "-75%";
  bullet[current - 1].classList.add("active");
  bullet[current - 0].classList.add("actives");
  progressCheck[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  progressText[current - 0].classList.add("actives");

  current += 1;
});






select2.addEventListener("click", myFunction);

 function myFunction() {
   document.getElementById("GoingStopoverNmbr").innerHTML = "";    

   var GoingStopovers = document.getElementById("mySelect2").value;
   
   for (i = 1; i < GoingStopovers; i++) {
     
     txt = txt + x + "<br>";
     document.getElementById("GoingStopoverNmbr").innerHTML = txt;    

    }
    txt = "";

  }

  select2.addEventListener("click", function(){
    var GoingStopovers = document.getElementById("mySelect2").value;
    if(GoingStopovers === "No Stopovers"){
      GoingStopoversBtn.classList.add("disabled");
    }else{
      GoingStopoversBtn.classList.remove("disabled");
    }
  });


  select1.addEventListener("click", mFunction);

 function mFunction() {
   document.getElementById("ReturnStopoverNmbr").innerHTML = "";    

   var ReturnStopovers = document.getElementById("mySelect1").value;
   
   for (i = 1; i < ReturnStopovers; i++) {
     
     txt = txt + x + "<br>";
     document.getElementById("ReturnStopoverNmbr").innerHTML = txt;    

    }
    txt = "";

  }

  select1.addEventListener("click", function(){
    var ReturnStopovers = document.getElementById("mySelect1").value;
    if(ReturnStopovers === "No Stopovers"){
      ReturnStopoversBtn.classList.add("disabled");
    }else{
      ReturnStopoversBtn.classList.remove("disabled");
    }
  });


  mySelect3.addEventListener("click", myyFunction);

 function myyFunction() {
   document.getElementById("StopoverNmbr").innerHTML = "";    

   var Stopovers = document.getElementById("mySelect3").value;
   
   for (i = 1; i < Stopovers; i++) {
     
     txt = txt + x + "<br>";
     document.getElementById("StopoverNmbr").innerHTML = txt;    

    }
    txt = "";

  }

  mySelect3.addEventListener("click", function(){
    var Stopovers = document.getElementById("mySelect3").value;
    if(Stopovers === "No Stopovers"){
      StopoversBtn.classList.add("disabled");
    }else{
      StopoversBtn.classList.remove("disabled");
    }
  });





