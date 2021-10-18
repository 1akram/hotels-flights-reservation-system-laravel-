 

 @extends('layouts.masterPage')
 @section('pageTitle','register air line')
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
   
      <!--body-->
      <div>

        <span class="fnt-stl-add">
          register and get your own platform .
        </span>

        <!--   form register -->
        <form class="text-center border border-light p-5 frm-stl" method="POST" action="{{route('storeAirLine')}}">
          <p class="h4 mb-4">Sign up</p>
          @csrf
          <!-- Name -->
          <div class="md-form input-with-pre-icon">
            <i class="fas fa-user input-prefix"></i>
            <input type="text" name="airLineName"   class="form-control" placeholder="Name Of Your Agency">
          </div>

          <!-- E-mail -->
          <div class="md-form input-with-pre-icon">
            <i class="fas fa-envelope input-prefix"></i>
            <input type="email" name="email"  class="form-control mb-4" placeholder="E-mail">
          </div>
          <!-- Password -->
          <div class="md-form input-with-pre-icon">
            <i class="fas fa-lock input-prefix"></i>
            <input type="password" name="password"   class="form-control" placeholder="Password"
              >
          </div>
     

          <!-- Phone number -->
          <div class="md-form input-with-pre-icon">
            <i class="fas fa-phone input-prefix"></i>
            <input type="text" name="phone"   class="form-control" placeholder="Phone number"
              >
          </div>

   
      
  
          <!-- Grid row -->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-6">
              <!-- Material input -->
              <div class="md-form  ">
                <input type="text" class="form-control" name="country" id="inputAddressMD" placeholder="country">
               </div>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6">
              <!-- Material input -->
              <div class="md-form form-group">
                <input type="text" class="form-control" name="ville" placeholder="ville">
               </div>
            </div>
            <!-- Grid column -->
          </div>

          <!-- Grid row -->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-6">
              <!-- Material input -->
              <div class="md-form form-group">
                <input type="text" class="form-control" name="wilaya" placeholder="wilaya">
                <label for="inputCityMD"></label>
              </div>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6">
              <!-- Material input -->
              <div class="md-form form-group">
                <input type="text" class="form-control" name="cdPostal" placeholder="code postal">
                <label for="inputZipMD"></label>
              </div>
            </div>
            <!-- Grid column -->
          </div>



          
           <button class="btn button-clr my-4 btn-block" type="submit">Sign up</button> 
          

          <p>By clicking
            <em>Sign up</em> you agree to our
          <a href="{{route('termsAndConditions')}}" target="_blank">Terms and condition</a>

        </form>
        <!--   form register -->

      </div>


      <!--body end-->
 
  
 
   


    @endsection

    @section('extr')
  
    @endsection

 

 