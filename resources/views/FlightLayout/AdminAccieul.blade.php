 

 @extends('layouts.masterPage')
 @section('pageTitle','air Line')
  @section('head')
  <style>
    .c-navebar {
        background-color: #fff;
        border-bottom: .5px solid rgba(0, 0, 0, 0.200);
        position: relative;
    }
    .topbar{
        background-color: #6695a3;
    }
</style>
  @endsection
 
 @section('content')


  <!--  body -->

  <div class="body">
    <div class="container container-stpr z-depth-1">
        <div class="title-admin">
            Choose The Type That You Will Treat It . .
        </div>
        <div class="row">
           <div class="left-column">
              <img src="img/roundtrip7.jpg" alt="">
              <div class="title-one">
              <a href="{{route('roundTrip')}}">Round Trip Flight . .<i class="fas fa-angle-double-right fnt-sz"></i></a> 
              </div>
           </div>
           <div class="right-column">
              <img src="img/oneway8.jpg" alt="">
              <div class="title-one">
                  <a href="{{route('OneWayTrip')}}">One Way Flight . .<i class="fas fa-angle-double-right fnt-sz"></i></a> 
              </div>
           </div>
        </div>
    </div>
</div> 

<!--  body -->

 
  
 
   


    @endsection

    @section('extr')
    
    @endsection

 

 