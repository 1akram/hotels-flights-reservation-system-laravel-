<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Storage;
use app\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function show(){
    return view('Account');

   }
   public function store(Request $request){
    $validate=Validator::make($request->all(), [
        'firstName' => ['required', 'string', 'max:40'],
        'lastName' => ['required', 'string', 'max:40'],
        'birthDay' => ['required', 'before:'.Carbon::now()->format('Y-m-d')],
        'gender' => ['required', 'string', 'max:40'],
        'phone' => ['required', 'string', 'max:40'],
        'street' => ['required', 'string', 'max:40'],
        'city' => ['required', 'string', 'max:40'],
        'state' => ['required', 'string', 'max:40'],
        'zipCode' => ['required', 'string', 'max:40'],
        'country' => ['required', 'string', 'max:40'] 
    ])->validate();
    $user=Auth::user();
    $user->name=$request->firstName;
    $user->lastName=$request->lastName;
    $user->birthDay=$request->birthDay;

    $user->sex=$request->gender;
    $user->street=$request->street;
    $user->city=$request->city;
    $user->state=$request->state;
    $user->postal_code=$request->zipCode;
    $user->country=$request->country;
    $user->phone=$request->phone;
    $user->save();

    return redirect()->route('showAccount')->with('statusMsg','your information update successfully.');

    }
    public function updatePasse(Request $request){
        $validate=Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ])->validate();
        $user=Auth::user();
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect()->route('showAccount')->with('statusMsg','your password update successfully.');

    }
    public function updateAvatar(Request $request){
        $user=Auth::user();
        if ($request->hasFile('avatar')) {
            $validate=Validator::make($request->all(), [
                'avatar' => 'mimes:jpeg,png|max:1024',
            ])->validate();
            if ($request->file('avatar')->isValid()) {
                if(!empty($user->avatar))
                    Storage::disk('public')->delete($user->avatar)  ;
                $url=  $request->file('avatar')->store('avatar', 'public' );
                $user->avatar=$url;
                $user->save();
                return redirect()->route('showAccount')->with('statusMsg','avatar uploaded successfully');
            }
        }
        
        return redirect()->route('showAccount')->with('statusMsg','could not upload avatar') ->with('statusError','error');
 
    }
}
    
          
        

    
                
             
            
      
 