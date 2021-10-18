
$(document).ready(function () {








  if ($(window).scrollTop() > 100) {
    $(".c-navebar").addClass("navbar-bg-ffff");
    $(".c-navebar").removeClass("navbar-bg-fff0");
    $(".topbar").addClass("bg-color-r");
  };
  $(window).scroll(function () {
    if ($(window).scrollTop() > 100) {
      $(".c-navebar").addClass("navbar-bg-ffff");
      $(".c-navebar").removeClass("navbar-bg-fff0");
      $(".topbar").addClass("bg-color-r");
    } else {
      $(".c-navebar").addClass("navbar-bg-fff0");
      $(".c-navebar").removeClass("navbar-bg-ffff");
      $(".topbar").removeClass("bg-color-r");
    }
  });


  $(".AccB").on('show.bs.collapse', function () {
    $(this).parent(".Acc").children(".AccH").find("span svg").attr("data-icon", "minus");
  });
  $(".AccB").on('hide.bs.collapse', function () {
    $(this).parent(".Acc").children(".AccH").find("span svg").attr("data-icon", "plus");
  });


  $(".RM").on("click", function () {
    v = $(this).next("input").val();
    v = parseInt(v);
    v -= 1;
    if (v < 1)
      v = 1;
    $(this).next("input").val(v);
  });
  $(".RP").on("click", function () {
    v = $(this).prev("input").val();
    v = parseInt(v);
    v += 1;
    $(this).prev("input").val(v);
  });



  $(".MiPM").on("click", function () {
    v = $(this).next("input").val();
    v = parseInt(v);
    v -= 1;
    if (v < 1)
      v = 1;
    $(this).next("input").val(v);
  });
  $(".MiPP").on("click", function () {
    v = $(this).prev("input").val();
    v = parseInt(v);
    v += 1;
    if (v >= $("#maxPrice").val())
      v = parseInt($("#maxPrice").val()) - 1;
    $(this).prev("input").val(v);
  });


  $(".MaPM").on("click", function () {
    v = $(this).next("input").val();
    v = parseInt(v);
    v -= 1;
    if (v <= $("#minPrice").val())
      v = parseInt($("#minPrice").val()) + 1;
    $(this).next("input").val(v);
  });
  $(".MaPP").on("click", function () {
    v = $(this).prev("input").val();
    v = parseInt(v);
    v += 1;
    $(this).prev("input").val(v);
  });





  // ******************
  tabs= $(".formTab");
   if(tabs.length> 0){
     cIndex=0;
  showTab(cIndex);
  $(".formNext").on("click",function(){
    nexPriv(1)
  });
  $(".formPriv").on("click",function(){
    nexPriv(-1)
  });
  }
 


  $(".fileUploadTarget").on("click", function () {
    $(".fileUpload").trigger("click");
});
$('.fileUpload').change(function() {
    $(this).parent().submit();
});



});
var tabs ;
var cIndex ;
  function nexPriv(n){
    tabs[cIndex].style.display="none";
    cIndex+=n;
    showTab(cIndex);
  }
    function showTab(index){
    tabs[index].style.display="block";
    if(index <= 0)
      $(".formPriv").hide();
    else
      $(".formPriv").show();
    if(index >= tabs.length-1)
    {
      $(".formNext").hide();
      $(".formBtn").show();
    }
    else
    {
      $(".formNext").show();
      $(".formBtn").hide();
    }
  }