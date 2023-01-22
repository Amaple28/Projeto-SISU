<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use Carbon\Carbon; 
use Mail; 
use DB; 

class ResetPasswordController extends Controller
{
    //

    public function recuperarSenha(Request $request){
        return view('front_telas.recuperarSenha');
    }

    public function recuperacaoSenha(Request $request){

        $user = User::where('email', $request->email)->first();

        $request->validate([
            'email' => 'required',
            'user' => 'exists:users,email'
        ]);

        $token = rand(100000,999999);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);
    
          Mail::send('emails.recuperarSenha', ['user'=>$user , 'token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function sendEmail($user){
        Mail::send('emails.recuperarSenha', [
            'user' => $user,
            'code' => $code
        ], function($message) use ($user){
            $message->to($user->email);
            $message->subject("Olá $user->name, recupere sua senha!");
        });
    }

    public function novaSenha(Request $request, $token){

        return view('front_telas.novaSenha',['token'=>$token]);
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
        ->where([
          'email' => $request->email, 
          'token' => $request->token
        ])
        ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }
        $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();

          return redirect('/')->with('message', 'Your password has been changed!');
    }
}
