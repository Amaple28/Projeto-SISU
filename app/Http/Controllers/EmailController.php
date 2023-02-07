<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
// use App\Mail\SendGridMail;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;


class EmailController extends Controller
{
    // public function sendEmailCadastro(Request $request, $id)
    // {
    //     $user = Auth::find($id);
    //     $email = $user->email;
    //     $name = $user->name;
    //     $data = array('name'=>$name, "body" => "Cadastro realizado com sucesso!");
    //     Mail::send('layouts.emails.cadastro', $data, function($message) use ($email, $name) {
    //         $message->to($email, $name)
    //                 ->subject('SIMULADOR SISU VEMMED'); //assunto
    //         $message->from('admin@simuladorsisumed.com','SIMULADOR SISUMED');
    //     });
    //     // return back()->with('success', 'E-mail enviado com sucesso!');
    // }

    public function recuperarSenha(Request $request){
        return view('recuperarSenha');
    }

    public function recuperacaoSenhaEmail(Request $request){

        $request->validate([
            'email' => 'required'
        ]);

        $token = rand(100000,999999);
        
        $email = $request->email;
        $user = User::where('email', $email)->first();

        if(!$user){
            return back()->with('error', 'E-mail não encontrado!');
        }

        $user->remember_token = $token;
        $user->save();
        $name = $user->name;


        $data = array('name'=>$name, "body" => "Recuperar Senha", "token" => $token);
        Mail::send('layouts.emails.recuperarSenha', $data, function($message) use ($email, $name) {
            $message->to($email, $name)
                    ->subject('Recuperar Senha'); //assunto
            $message->from('admin@simuladorsisumed.com','SIMULADOR SISUMED');
        });
        return redirect('/nova-senha-form/'.$user->id)->with('success', 'E-mail enviado com sucesso!');

    }

    public function novaSenhaForm(Request $request, $id){
        $user = User::find($id);

        return view('novaSenha')
        ->with('user', $user);
    }

    public function novaSenha(Request $request, $id){

        $request->validate([
            'cod' => 'required'
        ]);

        $user = User::find($id);
        
        if($user->remember_token != $request->cod){
            return back()->with('error', 'Código inválido!');
        } else{
            $user->password = Hash::make($request->senha);
            $user->save();
        }

        
        return redirect('/')->with('success', 'Senha alterada com sucesso!');
    }


}
