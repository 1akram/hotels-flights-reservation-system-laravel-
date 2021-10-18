@extends('layouts.masterPage')
@section('pageTitle','FAQ')
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
<div class="container containerCost">

  
  <h2 class="mt-3 mb-3 w-100 text center " style="text-align: center;font-weight: bold;font-size: 2.5em;">FAQ</h2>
   @for ($i = 1; $i < 12; $i++)
       
    <div class="Acc searchAcc">
      <div class="AccH searchHead d-flex justify-content-between" data-toggle="collapse"   data-target="#qst{{$i}}">
        <span> this is where i put qst {{$i}} </span><span ><i class="far fa-minus icon-color-red"></i></span>
      </div>
      <div id="qst{{$i}}" class="AccB   @if ($i==1)show @endif" >
        <p class="pl-3 pt-3">
                here where i put ans {{$i}} for the qst {{$i}} bla bla here where i put ans
        </p>
      </div>
    </div>
      

   @endfor
                    
 


</div>
    <!-- end body -->

 @endsection

 @section('extr')
 @endsection