@extends('layouts.masterPage')
@section('pageTitle','add flight')
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
          <div class="prgrs-br">
            <div class="step">
              <div class="bullet actives">
                <span>1</span>
              </div>
              <div class="check fas fa-check"></div>
              <p class="actives">
                General Infos</p>
            </div>
            <div class="step">       
              <div class="bullet">
                <span>2</span>
              </div>
              <div class="check fas fa-check"></div>
              <p>Choose Type</p>
            </div>
            <div class="step">      
              <div class="bullet">
                <span>3</span>
              </div>
              <div class="check fas fa-check"></div>
              <p>More Details</p>
            </div>
            <div class="step">        
              <div class="bullet">
                <span>4</span>
              </div>
              <div class="check fas fa-check"></div>
              <p>Process Ends</p>
            </div>
          </div>
          <div class="form-outer">
            <form action="{{route('storeFlight')}}" method="POST">
                @csrf
              <div class="page slide-page">
                <div class="title-3">General Infos:</div>
                <div class="field row justify-content-between " style="margin-bottom:100px">
                  <div class="fil col-sm-5">
                    <div class="label"><i class="fas fa-plane-departure  "></i>Departure Point :</div>
                    <input type="text" name="depart"   placeholder="From ?">
                  </div>
                   <div class="fil-d col-sm-5">
                    <div class="label"><i class="fas fa-plane-arrival  "></i>Arrival Point :</div>
                    <input type="text" name="arret"   placeholder="To ?">
                  </div>
                </div>
                <div class="field">
                  <div class="label"><i class="fas fa-dollar-sign  "></i>Price :</div>
                  <input type="text" name="price"   placeholder="00.00.00 $">
                </div>    
                <div class="field">
                    <div class="label"><i class="fas fa-dollar-sign  "></i>Number of places</div>
                    <input type="text" name="place_num"   placeholder="00">
                  </div>                     
                <div class="field">
                  <div class="label"><i class="fas fa-concierge-bell	 "></i>Aircraft Services :</div>
                  <select placeholder="Available Services ?"name='service'  >
                    <option value="BreakFast">BreakFast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Dinner">Dinner</option>
                  </select>
                </div>
                <div class="field">
                  <button type="button" class="btn firstNext btn-rgt next">Next</button>
                </div>
              </div>
              <div class="page">
                <div class="title no-thing">Choose a Tape:</div>
                <div class="fil-p mb-3">  
                <p class="no-l  mb-3">Select 'Round Trip' Type If Your Flight Going And Coming Back, If your Flight Just Go So Select The Other Flight Type. </p>
                </div>  
                <div class="fil-d">
                  <div class="custom-control custom-radio no-thin">
                    <input type="radio" value='0'  id="tripType1" name="flight_type">
                    <label class="font-weight-bold" for="tripType1"><strong>One Way</strong> <small> (going without return) </small></label>
                  </div>
                
                </div>
                <div class="fil-d">
                  <div class="custom-control custom-radio no-thi">
                    <input type="radio" value="1"   id="tripType2" name="flight_type" checked>
                    <label class="font-weight-bold" for="tripType2"><strong>Round Trip</strong> <small>(going and coming back)</small></label>
                  </div>
                </div>
                <div class="field btns justify-content-between">
                  <button type="button" class="prev-1 prev btn no-th">Back</button>
                  <button type="button" class="next-1 next btn no-t">Next</button>
                </div>
              </div>
              <div class="page type"  >
                <div class="title">Type: One way</div>
                <div class="flx-absltop">
                  <div class="fil-type-big">
                    <div class="label"><i class="fas fa-calendar-alt  "></i>Flight Date :</div>
                    <input type="date" name="aller1" placeholder="DD / MM / YYYY .">
                  </div>
                  <div class="fil-type-sml">
                    <div class="label"><i class="	fas fa-hourglass-half  "></i>Flight Duration :</div>
                    <input type="text" name="aller_duree1" placeholder="hh , mm">
                  </div>
                </div> 
                <div class="flx-abslt">
                  <div class="fil-type">
                    <div class="label"><i class="far fa-clock  "></i>Departure Time :</div>
                    <input type="text" name="aller_depar_heur1" placeholder="hh : mm : ss">
                  </div>
                  <div class="fil-type-tim">
                    <div class="label"><i class="fas fa-clock  "></i>Arrival Time :</div>
                    <input type="text" name="aller_arret_heur1" placeholder="hh : mm : ss">
                  </div>
                </div>
                <div class="flx-absltful">
                  <div class="fil-type-big">
                    <div class="label"><i class="fas fa-sort-numeric-down  "></i>Number Of Stopovers :</div>
                    <select id="mySelect3" name="stopOverNum1">
                      <option value="0" selected>No Stopovers</option>
                        @for ($i = 1; $i < 11; $i++)
                         <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                  </div>
                  <div class="fil-type-sml">
                    <div class="label-sml">Clic Here For Your Stopovers Infos :</div>
                    <button class="stopovers disabled" type="button" data-toggle="modal" data-target="#Stopovers">Stopovers Infos</button>
                  </div>
                </div>
                <div class="filbtn btns justify-content-between">
                  <button type="button"class="prev-type prev btn">Back</button>
                  <button type="button"class="next-type next btn">Next</button>
                </div>
              </div>  
              <div class="page">
                <div class="title">Type: Round </div>
                <div class="flex-lbl">
                  <div class="flx-left">
                    <div class="title-2">Going informations :</div>
                    <div class="flex-lbl">
                      <div class="fil-round">
                        <div class="label"><i class="fas fa-calendar-alt  "></i>Going Date :</div>
                        <input type="date" name="aller" placeholder="DD / MM / YYYY .">
                      </div>
                      <div class="fil-round2">
                        <div class="label"><i class="	fas fa-hourglass-half  "></i>Going Duration :</div>
                        <input type="text" name="aller_duree" placeholder="hh , mm">
                      </div>
                    </div> 
                    <div class="flex-lbl">
                      <div class="fil-round">
                        <div class="label"><i class="far fa-clock  "></i>Departure Time :</div>
                        <input type="text" name="aller_depar_heur" placeholder="hh : mm : ss">
                      </div>
                      <div class="fil-round2">
                        <div class="label"><i class="fas fa-clock  "></i>Arrival Time :</div>
                        <input type="text" name="aller_arret_heur" placeholder="hh : mm : ss">
                      </div>
                    </div>
                    <div class="flex-lbl">
                      <div class="fil-round">
                        <div class="label"><i class="fas fa-sort-numeric-down  "></i>Number Of Stopovers :</div>
                        <select id="mySelect2" name="stopOverNum2">
                            <option value="0" selected>No Stopovers</option>
                            @for ($i = 1; $i < 11; $i++)
                             <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                      </div>
                      <div class="fil-round">
                        <div class="label-btn"> Stopovers Infos :</div>
                        <button class="goingstopovers disabled" type="button" data-toggle="modal" data-target="#GoingStopovers">Stopovers Infos</button>
                      </div>
                    </div>
                  </div>
                  <div class="flx-right">
                    <div class="title-2">Return informations :</div>
                    
                    <div class="flex-lbl">
                      <div class="fil-round">
                        <div class="label"><i class="fas fa-calendar-alt  "></i>Return Date :</div>
                        <input type="date" name="retour" placeholder="DD / MM / YYYY .">
                      </div>
                      <div class="fil-round2">
                        <div class="label"><i class="	fas fa-hourglass-half  "></i>Return Duration :</div>
                        <input type="text" name="retour_duree" placeholder="hh , mm">
                      </div>
                    </div> 
                    <div class="flex-lbl">
                      <div class="fil-round">
                        <div class="label"><i class="far fa-clock  "></i>Departure Time :</div>
                        <input type="text" name="retour_depar_heur" placeholder="hh : mm : ss">
                      </div>
                      <div class="fil-round2">
                        <div class="label"><i class="fas fa-clock  "></i>Arrival Time :</div>
                        <input type="text" name="retour_arret_heur" placeholder="hh : mm : ss">
                      </div>
                    </div>
                    <div class="flex-lbl">
                      <div class="fil-round">
                        <div class="label"><i class="fas fa-sort-numeric-down  "></i>Number Of Stopovers :</div>
                        <select id="mySelect1" name="stopOverNum3">
                            <option value="0" selected>No Stopovers</option>
                            @for ($i = 1; $i < 11; $i++)
                             <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                      </div>
                      <div class="fil-round">
                        <div class="label-btn"> Stopovers Infos :</div>
                        <button class="btn-2 returnstopovers disabled" type="button" data-toggle="modal" data-target="#ReturnStopovers">Stopovers Infos</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="field btns justify-content-between">
                  <button type="button" class="prev-2 prev btn">Back</button>
                  <button type="button"class="next-2  next btn">Next</button>
                </div>
              </div>
              <div class="page"> 
                <div class="field-img">
                  <img src="img/check2.png" alt="">
                </div>      
                <div class="title-l">Excellent Work !</div>
                <div class="title-pt">Click Finish to add your Flight, Thank You .</div>
                <div class="field btns row">
                   <button type="button" class="prev-3 prev btn mr-auto ">Back</button>
                  <button type="submit" class="submit btn  " >Finish</button>
                </div>
              </div>
 
 
 
 
 
              <div class="modal fade" id="Stopovers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div id="myform">
                    <div class="modal-header text-left">
                      <h4 class="modal-title w-100 font-weight-bold mx-3">Stopovers :</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="mx-3 mb-3">
                        <label data-error="wrong" data-success="right" for="form3">Stopovers Place :</label>
                        <input type="text" name="lieu1[]" id="form3" class="form-control" placeholder="Country . .">
                      </div>
          
                      <div class="d-flex">
                        <div class="col-6 mb-3">
                          <label data-error="wrong" data-success="right" for="form2">Stoped Time :</label>
                          <input type="text" name="temp_arrive1[]" id="form2" class="form-control" placeholder="hh : mm : ss">
                        </div>
 
                        <div class="col-6 mb-3">
                          <label data-error="wrong" data-success="right" for="form2">Started Time :</label>
                          <input type="text" name="temp_depart1[]" id="form2" class="form-control" placeholder="hh : mm : ss">
                        </div>
                      </div>
 
                      <div class="d-flex">
                        <div class="col-6 mb-3">
                          <label data-error="wrong" data-success="right" for="form2">Stopovers Duration :</label>
                          <input type="text" name="duree1[]" id="form2" class="form-control" placeholder="hh , mm">
                        </div>
 
                        <div class="col-6 mb-3">
                          <label data-error="wrong" data-success="right" for="form2">Airport :</label>
                          <input type="text" name="air_port1[]" id="form2" class="form-control" placeholder="name . .">
                        </div>
                      </div>
                    </div>
                    </div>
                    <p id="StopoverNmbr"></p>
                    <div class="modal-footer d-flex text-left">
                      <button type="button" class="btn" data-dismiss="modal" aria-label="Close">Keep On Going</button>
                    </div>
                  </div>
                </div>
              </div>
 
 
              <div class="modal fade" id="GoingStopovers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <div class="modal-header text-left">
                     <h4 class="modal-title w-100 font-weight-bold mx-3">Stopovers :</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <div class="mx-3 mb-3">
                       <label data-error="wrong" data-success="right" for="form3">Stopovers Place :</label>
                       <input type="text" name="lieu2[]" id="form3" class="form-control" placeholder="Country . .">
                     </div>
         
                     <div class="d-flex">
                       <div class="col-6 mb-3">
                         <label data-error="wrong" data-success="right" for="form2">Stoped Time :</label>
                         <input type="text" name="temp_arrive2[]" id="form2" class="form-control" placeholder="hh : mm : ss">
                       </div>
 
                       <div class="col-6 mb-3">
                         <label data-error="wrong" data-success="right" for="form2">Started Time :</label>
                         <input type="text" name="temp_depart2[]" id="form2" class="form-control" placeholder="hh : mm : ss">
                       </div>
                     </div>
 
                     <div class="d-flex">
                       <div class="col-6 mb-3">
                         <label data-error="wrong" data-success="right" for="form2">Stopovers Duration :</label>
                         <input type="text" name="duree2[]" id="form2" class="form-control" placeholder="hh , mm">
                       </div>
 
                       <div class="col-6 mb-3">
                         <label data-error="wrong" data-success="right" for="form2">Airport :</label>
                         <input type="text" name="air_port2[]" id="form2" class="form-control" placeholder="name . .">
                       </div>
                     </div>
                   </div>
                   <p id="GoingStopoverNmbr"></p>
                   <div class="modal-footer d-flex text-left">
                     <button type="button"class="btn" data-dismiss="modal" aria-label="Close">Keep On Going</button>
                   </div>
                 </div>
               </div>
             </div>
 
 
 
 
             <div class="modal fade" id="ReturnStopovers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <div class="modal-header text-left">
                     <h4 class="modal-title w-100 font-weight-bold mx-3">Stopovers :</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <div class="mx-3 mb-3">
                       <label data-error="wrong" data-success="right" for="form3">Stopovers Place :</label>
                       <input type="text" name="lieu3[]" id="form3" class="form-control" placeholder="Country . .">
                     </div>
         
                     <div class="d-flex">
                       <div class="col-6 mb-3">
                         <label data-error="wrong" data-success="right" for="form2">Stoped Time :</label>
                         <input type="text" name="temp_arrive3[]" id="form2" class="form-control" placeholder="hh : mm : ss">
                       </div>
 
                       <div class="col-6 mb-3">
                         <label data-error="wrong" data-success="right" for="form2">Started Time :</label>
                         <input type="text" name="temp_depart3[]" id="form2" class="form-control" placeholder="hh : mm : ss">
                       </div>
                     </div>
 
                     <div class="d-flex">
                       <div class="col-6 mb-3">
                         <label data-error="wrong" data-success="right" for="form2">Stopovers Duration :</label>
                         <input type="text" name="duree3[]" id="form2" class="form-control" placeholder="hh , mm">
                       </div>
 
                       <div class="col-6 mb-3">
                         <label data-error="wrong" data-success="right" for="form2">Airport :</label>
                         <input type="text" name="air_port3[]" id="form2" class="form-control" placeholder="name . .">
                       </div>
                     </div>
                   </div>
                   <p id="ReturnStopoverNmbr"></p>
                   <div class="modal-footer d-flex text-left">
                     <button type="button" class="btn" data-dismiss="modal" aria-label="Close">Keep On Going</button>
                   </div>
                 </div>
               </div>
             </div>
            </form>
          </div>
        </div>  
      </div>           
 
    
   
     <!-- body -->
  
 @endsection

 @section('extr')
 <script src="js/script.js"></script>
 <script src="/js/main2.js"></script>
 @endsection