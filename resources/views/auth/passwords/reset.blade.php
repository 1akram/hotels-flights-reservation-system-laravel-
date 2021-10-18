@extends('layouts.masterPage')
@section('pageTitle','reset password')
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
    <div class="row  ">
        <div class="row col-sm-8 m-auto log">
            <form method="POST" action="{{ route('password.update') }}"class="w-100 form">@csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                  <label for="email" class="font-weight-bold"><i class="fas fa-envelope color-r ml-2 mr-2"></i>Email address </label>
                  <input id="email" type="email" class="form-control"value="{{ $email ?? old('email') }}" required autocomplete="email"  placeholder="Enter email"  name="email" >
                </div>
                <div class="form-group">
                    <label for="pwd" class="font-weight-bold"><i class="fas fa-lock-alt color-r ml-2 mr-2"></i>New Password </label>
                    <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="font-weight-bold"><i class="fas fa-lock-alt color-r ml-2 mr-2"></i>New Password </label>
                    <input type="password" class="form-control" placeholder="Enter password" id="password_confirmation" name="password_confirmation">
                </div>
                <button type="submit" class="btn  bg-color-r">reset</button>
                
            </form> 

        </div>

    </div>
</div>
<!-- end body -->      
@endsection
@section('extr')
@endsection
 