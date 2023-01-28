<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
// use App\Mail\SendGridMail;



class EmailController extends Controller
{
    public function sendEmailCadastro(Request $request)
    {
        $user = Auth::user();
        $email = 'maisagabirodrigues@gmail.com';
        $name = 'Maisa Gabriela Rodrigues';
        $data = array('name'=>$name, "body" => "Test mail");
        Mail::send('layouts.emails.cadastro', $data, function($message) use ($email, $name) {
            $message->to($email, $name)
                    ->subject('Layout E-mail SIMULADOR SISU MED'); //assunto
            $message->from('admin@simuladorsisumed.com','SIMULADOR SISUMED');
        });
        return back()->with('success', 'E-mail enviado com sucesso!');
    }


}
