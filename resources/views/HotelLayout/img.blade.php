@extends('layouts.masterPage')
@section('pageTitle','room detials')
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

  <div class="row mr-2 ml-2">
    <div class="row col-sm-12">
      <h3>click on image to deleted</h3>
    </div>
    <div class="row col-sm-12">
      @foreach ($room->imgs as $img)
        <a href="{{ route('deleteIMG',['hotel_id'=>$hotelId,'room_id'=>$room->id,'id'=>$img->id] )}}"><img src="{{asset( Storage::url($img->url))}}" width="120px" height="120px" alt=""></a>
      @endforeach
    </div>
    <div class="row col-sm-12">
      <form class='w-100'action="{{ route('uploadIMG',['hotel_id'=>$hotelId,'id'=>$room->id] )}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="custom-file mt-5 mb-2">
          <input type="file" multiple name="imgs[]" class="custom-file-input" id="uploadImg">
          <label class="custom-file-label" for="uploadImg">Choose image</label>
        </div>
        <input  class='btn bg-color-r ' style='color:#fff'type="submit" value="Upload">
      </form>
    </div>
  </div>

  <h3 class="mt-3 mb-3 "></h3>
 
    <div class="Acc searchAcc">
      <div class="AccH searchHead d-flex justify-content-between" data-toggle="collapse"   data-target="#reservation">
        <span> Reservations </span><span ><i class="far fa-minus icon-color-red"></i></span>
      </div>
      <div id="reservation" class="AccB searchBody show" >
        

         
             
          
          
        
        <div class="list-group">
          @foreach ($room->reservations as $reservation)
            <a href="{{route('printReservationDetials',["id"=>$reservation->pivot->id,'room_id'=>$room->id])}}" class="list-group-item list-group-item-action">#{{$reservation->pivot->id}}  :  {{$reservation->pivot->check_in}}---{{$reservation->pivot->check_out}}</a>
          @endforeach   
        </div> 
      </div>
    </div>
      

                    
 


</div>
    <!-- end body -->

 @endsection

 @section('extr')
 @endsection