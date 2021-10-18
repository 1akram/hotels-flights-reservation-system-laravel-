 

 @extends('layouts.masterPage')
 @section('pageTitle','round trips')
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
        <div class="container z-depth-1">
            <div class="table-wrapper body-admin">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Two Way</b>Flight</h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{route('addFlight')}}" class="btn btn-success">  <span>Add New Flight</span></a>
                        <a href="{{route('OneWayTrip')}}" class="btn btn-danger" >  <span>One Way Flights</span></a>      
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
 
                            <th>From ?</th>
                            <th>To .. ?</th>
                            <th>Going Date</th>
                            <th>Return Date</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($flights as $flight)
                        <tr>
                            <td>{{$flight->depart}}</td>
                            <td>{{$flight->arret}} </td>
                            <td>{{$flight->aller }}</td>
                            <td>{{$flight->retour }}</td>
                            <td>{{$flight->price}} $</td>
                         </tr>
                        @endforeach
                      

 
                    </tbody>
                </table>
                
            </div>
  
            
        </div>  
    </div> 
    
 <!--  body -->
 
 

 
  
 
   


    @endsection

    @section('extr')
    <script src="js/script.js"></script>

 
   
 
 
    @endsection

 

 