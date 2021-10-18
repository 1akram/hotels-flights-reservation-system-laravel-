@extends('layouts.masterPage')
@section('pageTitle','reservation')
@section('head')
<style>
    .c-navebar {
        background-color: #fff;
        border-bottom: .5px solid rgba(0, 0, 0, 0.200);
        position: relative;
    }

    .topbar {
        background-color: #6695a3;
    }
</style>
@endsection

@section('content')

<!--  body -->
<div class="container containerCost">
<form action="{{route('hotelResercationConfirmation')}}" method="POST">
    @csrf

        <div class="brd-cntc mb-4">
            <div class="mb-4">
                <span class="fas fa-user-alt icn-tlt"></span>
                <span class="ml-2 tlt-fnt">Client Infos</span>
            </div>

            <div class="form-row mb-4">
                <div class="col mr-3">
                    <label class="sml-fnt" for="firstname">First Name</label>
                    <input type="text" class="form-control sml-fnt"   placeholder="your name please .."
                        name="firstName">
                </div>
                <div class="col">
                    <label class="sml-fnt" for="lastname">Last Name</label>
                    <input type="text" class="form-control sml-fnt" placeholder="your last name .." name="lastName">
                </div>
            </div>
            <div class="form-row mb-4">
                <div class="col mr-3">
                    <label class="sml-fnt" for="sexe">Sexe</label>
                    <select class="form-control custom-select" name="sexe" id="sexe">
                        <option value="female">female</option>
                        <option value="male">male</option>
                    </select>
                </div>
                <div class="col">
                    <label class="sml-fnt" for="datebirth">Date Of Birth</label>
                    <input type="date" class="form-control sml-fnt" placeholder="dd/mm/yyyy" name="datebirth">
                </div>
            </div>

            <div class="brd-btt">
                <span class="pl-3">Informations Must Be As They Appear On The Travel Document .</span>
            </div>
        </div>

        <div class="brd-cntc mb-4">
            <div class="mb-4">
                <span class="fas fa-passport icn-tlt"></span>
                <span class="ml-2 tlt-fnt">Passport Number</span>
            </div>
            <div class="form-group row">
                <input type="text" name="passport" class="form-control col-10" placeholder="** *** *** ** **** ** ***" id="passport">
            </div>
        </div>

        <div class="brd-cntc mb-4">
            <div class="mb-4">
                <span class="fas fa-credit-card icn-tlt"></span>
                <span class="ml-2 tlt-fnt">Bank card Information</span>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="font-weight-bold mb-2">
                        payment methods :
                    </div>
                    <div class="form-check col-2">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="0" name="card">
                        <img class="logo mb-2" src="{{asset('img/card_master.png')}}" alt="master-debit-logo">
                        </label>
                    </div>
                    <div class="form-check col-2">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="1" name="card">
                            <img class="logo mb-2" src="{{asset('img/card_visa.png')}}" alt="master-logo">
                        </label>
                    </div>

                </div>
                <div class="col">
                    <div class="font-weight-bold mt-2">
                        Card Informations :
                    </div>
                    {{-- /***/ --}}
                    <p>this is just for test </p>
                    <p>master card : 123456789123456   cvv 123   11  2021  </p>
                    <p>visa card : 987654321987654  cvv 321  11 2021</p>
                    {{-- /***/ --}}
                    <div class="form-group">
                        <label for="usr">Card number:</label>
                        <input type="text" class="form-control" name="cardnumbr" placeholder="**** **** **** ****">
                    </div>
                    <div class="form-group">
                        <label for="usr">Security Code CVV / CVC:</label>
                        <input type="text" class="form-control" name="cardcvv" placeholder="*****">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="sel1">Expiration date :</label>
                                <select class="form-control custom-select" name="ExpM">
                                    
                                    @for ($i = 1; $i < 13; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="sel1" class="mt-3"> </label>
                                <select class="form-control custom-select" name="ExpY">
                                    @for ($i = Carbon\Carbon::now()->year; $i < Carbon\Carbon::now()->year+10; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="brd-cntc mb-4">
            <div class="mb-4">
                <span class="fas fa-align-left icn-tlt"></span>
                <span class="ml-2 tlt-fnt">Details of your reservation</span>
            </div>

            <div class="row   border-top pb-4 ml-4 mr-4 pt-3">
                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">E-mail adress :</div>
                    </div>
                     <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$user->email}}</div>
                        

                     </div>
                </div>
                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Check in :</div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$checkIn }}</div>
                        <input type="hidden" name="checkIn" value="{{$checkIn}}">

                    </div>
                </div>
                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Check out</div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$checkOut }}</div>
                        <input type="hidden" name="checkOut" value="{{$checkOut}}">
                    </div>
                </div>
                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Room Type</div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$room->roomType->name.':'.$room->name}}</div>

                    </div>
                </div>
                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Rooms  </div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$room->roomsNumAvialable}}</div>
                        <input type="hidden" name='rooms'value="{{$room->roomsNumAvialable}}">

                    </div>
                </div>
                <div class="row w-100 ">
                    <div class="col-sm-4 font-weight-bold">
                        <div class="mb-3">Price / night  </div>
                    </div>
    
                    <div class="col-sm-8  text-center font-small font-weight-bold text-muted pt-2">
                        <div class="mb-3">{{$room->price}}</div>
                    </div>
                </div>
               
            </div>
 
        </div>
        <div class="brd-cntc mb-5">
            <div class="mb-4">
                <span class="fas fa-coins icn-tlt"></span>
                <span class="ml-2 tlt-fnt">Total</span>
            </div>

            <div class="d-flex justify-content-between">
                <span class="ml-2 fnt-crm border-danger rounded-pill p-2 border-bottom">TOTAL :</span>
                <span class="font-weight-bold p-2">{{$room->price*$room->roomsNumAvialable*$defInDays}}$</span>
            </div>
        </div>
        <input type="hidden" name="roomId" value="{{$room->id}}">
        <div class="row justify-content-around">
            <button type="submit" class="btn resercationBtn bg-color-r  "  >confirmation</button>
 
        </div>
    </form>
</div>
<!-- end body -->

@endsection

@section('extr')
@endsection