@extends('layouts.masterPage')
@section('pageTitle','email')
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
 
<div class="container containerCost" >
    <div class="row   " style="min-height:300px">
        <div class="row col-sm-8 m-auto log">
            <form method="POST" action="{{ route('password.email') }}"class="w-100 form">@csrf
 
                <div class="form-group">
                  <label for="email" class="font-weight-bold"><i class="fas fa-envelope color-r ml-2 mr-2"></i>Email address </label>
                  <input id="email" type="email" class="form-control"value="{{ $email ?? old('email') }}" required autocomplete="email"  placeholder="Enter email"  name="email" >
                </div> 
                <button type="submit" class="btn  bg-color-r">send</button>
                
            </form> 

        </div>

    </div>
</div>
<!-- end body -->   
@endsection
 
@section('extr')
@endsection
 