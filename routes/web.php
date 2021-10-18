<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;






 

 
// generalRoutes
Route::get('faq','Controller@faq')->name('faq');
Route::get('aboutUs','Controller@aboutUs')->name('aboutUs');
Route::get('termsAndConditions','Controller@termsAndConditions')->name('termsAndConditions');
Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/','HotelController@show')->name("home"); 

// hotelRoutes
Route::get('/','HotelController@show')->name("showHotels");
Route::get('/hotelDetail/{id}','HotelController@hotelDetail')->name('hotelDetail');


// airLine Routes 
Route::get('/flights','FlightController@flights')->name("flights");
Route::Post('/flights','FlightController@searcheFlights')->name("searcheFlights");


//register routes 
Route::get('/registerHotelOwner','Auth\RegisterController@registerHotelOwner')->name('registerHotelOwner');
Route::post('/registerHotelOwner','Auth\RegisterController@registerHotelOwnerStore')->name('registerHotelOwnerStore');

Route::get('/registerAirLine', 'Auth\RegisterController@registerAirLine')->name('addAirLine');
Route::Post('/registerAirLine', 'Auth\RegisterController@registerAirLineStore')->name('storeAirLine');





Route::middleware(['auth','verified'])->group(function () {// just logein and verified  users can access this routes 

    Route::get('/account','UserController@show')->name('showAccount');
    Route::post('/account','UserController@store')->name('storeAccount');
    Route::post('/updatePasse','UserController@updatePasse')->name('updatePasse');
    Route::post('/updateAvatar','UserController@updateAvatar')->name('updateAvatar');

    Route::get('/printReservationDetials/{id}/{room_id?}','HotelController@printReservationDetials')->name('printReservationDetials');//akm!

    Route::middleware(['checkRole:'.config('roles.role')['client'] ])->group(function () {// just who logein as clients can access this routes 
        // hotelRoutes
        Route::post('/addReview','HotelController@addReview')->name('addReview');
        Route::post('/hotelReservation/{id}','HotelController@hotelReservation')->name('hotelReservation');
        Route::post('/hotelReservationConfirmation','HotelController@confirmation')->name('hotelResercationConfirmation');
        Route::get('/myHotelReservations','HotelController@myReservations')->name('myReservations');

        // flightRoutes
        Route::get('/flightReservation/{id}','FlightController@reservation'  )->name('reservation');
        Route::post('/flightReservation','FlightController@reservationConfirm'  )->name('reservationConfirm');
        Route::get('/myFlightReservations','FlightController@myFlighReservations'  )->name('myFlighReservations');
        Route::get('/flightReservationDetails/{id}','FlightController@reservationDetails'  )->name('reservationDetails');


    }); 
    Route::middleware(['checkRole:'.config('roles.role')['HotelOwner'] ])->group(function () {// just who logein as HotelOwner can access this routes 

        // hotelRoutes
        Route::get('/addHotel','HotelController@create')->name("addHotel");
        Route::post('/storeHotel','HotelController@store')->name("storeHotel");
        Route::get('/editHotel/{id}','HotelController@edit')->name('editHotel');
        Route::post('/updateHotel/{id}','HotelController@update')->name('updateHotel');
        Route::get('/myHotels','HotelController@myHotels')->name('myHotels');
        Route::post('/deleteHotel/{id}','HotelController@delete')->name('deleteHotel');
        Route::get('/addRoom/{hotel_id}', 'RoomController@create')->name('addRoom');
        Route::post('/storeRoom/{hotel_id}','RoomController@store')->name('storeRoom');
        Route::get('/editRoom/{hotel_id}/{id}','RoomController@edit')->name('editRoom');
        Route::post('/updateRoom/{hotel_id}/{id}','RoomController@update')->name('updateRoom');
        Route::get('/myRooms/{hotel_id}','RoomController@myRooms')->name('myRooms');
        Route::post('/deleteRoom/{hotel_id}/{id}','RoomController@delete')->name('deleteRoom');
        Route::get('/room/{hotel_id}/{id}','RoomController@show')->name('showRoom');
        Route::post('/room/{hotel_id}/{id}','RoomController@uploadIMG')->name('uploadIMG');
        Route::get('/room/{hotel_id}/{room_id}/{id}','RoomController@deleteIMG')->name('deleteIMG');

    
    }); 



    Route::middleware(['checkRole:'.config('roles.role')['airLine'] ])->group(function () {// just who logein as air Line can access this routes 
        // airLine Routes 
        Route::get('/addFlight', 'FlightController@create')->name('addFlight');
        Route::Post('/storeFlight', 'FlightController@store')->name('storeFlight');
        Route::get('/airLine','AirLineController@airLine')->name('airLine'); 
        Route::get('/roundTrip','AirLineController@roundTrip')->name('roundTrip');  
        Route::get('/OneWayTrip','AirLineController@OneWayTrip')->name('OneWayTrip'); 

    });     
     
});  
 




 




