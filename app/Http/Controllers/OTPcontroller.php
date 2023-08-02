<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class OTPcontroller extends Controller
{
    
    public function register(Request $request){
        if($request->method()=='POST'){
            $request->validate([
                'name'=>'required',
                'email'=>'required|unique:users',
                'password'=>'required',
                'mobile'=>'required|unique:users'
            ]);
            $data = new User;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->mobile = $request->mobile;
            $data->save();
            return back()->with('success', 'Register Successfully.');
        }
        return view('register');
    }

    public function send_otp(Request $request){
        if($request->method()=='POST'){
            $request->validate([
                'mobile'=>'required|exists:users'
            ]);
        
          $api_key = '7a72928f-e7e6-11ed-addf-0200cd936042';
          $mobile = $request->mobile;
          if($request->mobile){
            $ch = curl_init();
            curl_setopt($ch , CURLOPT_URL,'https://2factor.in/API/V1/'.$api_key.'/SMS/+91'.$mobile.'/AUTOGEN/OTP1');
            curl_setopt($ch , CURLOPT_RETURNTRANSFER , true);
            curl_setopt($ch , CURLOPT_CUSTOMREQUEST , 'GET');
            curl_setopt($ch , CURLOPT_FOLLOWLOCATION , true);
            $response = curl_exec($ch);
            curl_close ($ch);
            return redirect('otp_match/'.$mobile)->with('success','otp send successfully');
          }
        }
        return view('send_otp');
    }

    public function otp_match(Request $request){
        if($request->method()=='POST'){
        $request->validate([
            'otp'=>'required'
        ]);
      $api_key = '7a72928f-e7e6-11ed-addf-0200cd936042';
      $otp = $request->otp;
      $mobile = $request->mobile;

      if($request->mobile){
        $ch = curl_init();
        $verify = curl_setopt($ch , CURLOPT_URL,'https://2factor.in/API/V1/'.$api_key.'/SMS/VERIFY3/+91'.$mobile.'/'.$otp.'');
        curl_setopt($ch , CURLOPT_RETURNTRANSFER , true);
        curl_setopt($ch , CURLOPT_CUSTOMREQUEST , 'GET');
        curl_setopt($ch , CURLOPT_FOLLOWLOCATION , true);
        $response = curl_exec($ch);
        curl_close ($ch);
        $status = json_decode($response);
        
        $mobilerow = User::where('mobile', $mobile)->first();
        $userid = $mobilerow->id;
        if($status->Status == 'Success'){
            if(Auth::loginUsingId($userid)){
                $request->session()->regenerate();
                return redirect('/')->with('success','Login Successfully..');
            }
        }
        elseif($status->Status == 'Error'){
            return back()->with('error','otp not match');
        }

      }
    }
        return view('/otp_match');
    }




    
    public function logout(Request $request){
        Auth::logout();
        return redirect('/send_otp')->with('success', 'logout successfully...');
     }


}










// $api_key = '7a72928f-e7e6-11ed-addf-0200cd936042';
// $mobile = $request->mobile;
// $api_url = 'https://2factor.in/API/V1/'.$api_key.'/SMS/+91'.$mobile.'/AUTOGEN/OTP1';
// return redirect($api_url)->with('success','otp send successfully..');