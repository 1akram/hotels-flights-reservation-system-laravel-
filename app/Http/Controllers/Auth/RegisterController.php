<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Carbon;


use App\User;
use App\AirLine;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
     

    use RegistersUsers;

   
    protected $redirectTo = '/';
 
    public function __construct()
    {
        $this->middleware('guest');
         

    }

     
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:40'],
            'lastName' => ['required', 'string', 'max:40'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'birthDay' => ['required', 'before:'.Carbon::now()->format('Y-m-d')],
            'gender' => ['required', 'string', 'max:40'],
            'phone' => ['required', 'string', 'max:40'],
            'street' => ['required', 'string', 'max:40'],
            'city' => ['required', 'string', 'max:40'],
            'state' => ['required', 'string', 'max:40'],
            'zipCode' => ['required', 'string', 'max:40'],
            'country' => ['required', 'string', 'max:40'],
 


        ]);
    }

    public function registerHotelOwner(){
        $isHotelOwner=true;
        return view('auth\register', compact('isHotelOwner'));
    }
    public function registerHotelOwnerStore(Request $request){
        $v=$this->validator($request->all());
        $v->validate();
        $user= $this->create($request->all());
        $user->role=config('roles.role')['HotelOwner'];
        $user->save();
        return redirect()->route('login')->with('statusMsg','you registered successfully. you can login now');


    }

    public function registerAirLine(){
        return view('FlightLayout\AddAirLine');
          
      }  
      
      public function registerAirLineStore(Request $request){
       $validate=Validator::make($request->all(), [
           'airLineName' => 'required| string|max:255',
           'email' => 'required|string|email|max:255|unique:users',
           'password' =>  'required|string|min:8|',
           'phone' =>  'required|string|',
           'ville' =>  'required|string|',
           'wilaya' =>  'required|string|',
           'cdPostal' =>  'required|string|',
           'country' =>  'required|string|',
           
   
           
       ])->validate();
   
       $user= User::create([
             'name' => $request->airLineName,
             'role'=>config('roles.role')['airLine'],  
             'email' =>$request->email,
            'password' => Hash::make($request->password),
         ]);
       $airLine=New AirLine();
       $airLine->name=$request->airLineName;
       $airLine->country=$request->country;
       $airLine->phone=$request->phone;
       $airLine->wilaya=$request->wilaya;
       $airLine->ville=$request->ville;
       $airLine->cdPostal=$request->cdPostal;
       $airLine->user_id=$user->id;
       $airLine->save();
    
   
       return redirect()->route('login')->with('statusMsg','your Air Line add successfully. you can login now');
   
   
   
   
      
   }  
    protected function create(array $data)
    {   
        return User::create([
            'name' => $data['firstName'],
            'lastName' => $data['lastName'],
            'sex' => $data['gender'],
            'birthDay' =>Carbon::createFromFormat('yy-m-d',  $data['birthDay']),
            'phone' => $data['phone'],
            'street' => $data['street'],
            'city' => $data['city'],
            'state' => $data['state'],
            'postal_code' => $data['zipCode'],
            'country' => $data['country'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            
        ]);
    }
}
