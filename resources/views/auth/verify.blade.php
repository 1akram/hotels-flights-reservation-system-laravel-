@extends('layouts.masterPage')
@section('pageTitle','verify')
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
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
         @endif
            <label for="" class="font-weight-bold">Before proceeding, please check your email or spam section for a verification link.</label>
            <form method="POST" action="{{ route('verification.resend') }}" class="w-100 form">@csrf
                <button type="submit" class="btn  bg-color-r">click here to request another</button>
            </form> 

        </div>

    </div>
</div>
<!-- end body -->   
@endsection
@section('extr')
@endsection

 