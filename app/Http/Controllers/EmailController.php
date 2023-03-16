<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class EmailController extends Controller
{
    //envia email para o user assim que ele fizer o cadastro
    //############# foi desativado pois nos primeiros dias de uso do site, 
    //o servidor de email atingiu o limite de envio de emails por dia #############
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

    //view esqueceu sua senha
    public function recuperarSenha(Request $request)
    {
        return view('user.recuperarSenha');
    }

    //envia email do user cadastrado que esqueceu a senha
    public function recuperacaoSenhaEmail(Request $request)
    {

        $request->validate([
            'email' => 'required'
        ]);

        //verifica se o email existe no banco de dados e gera um token
        $token = rand(100000, 999999);
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if (!$user) {
            return back()->with('error', 'E-mail não encontrado!');
        }
        $user->remember_token = $token;
        $user->save();
        $name = $user->name;

        //componentes do email
        $data = array('name' => $name, "body" => "Recuperar Senha", "token" => $token);
        Mail::send('layouts.emails.recuperarSenha', $data, function ($message) use ($email, $name) {
            $message->to($email, $name)
                ->subject('Recuperar Senha'); //assunto
            $message->from('contato@simuladorsisumed.com', 'SIMULADOR SISU VEMMED');
        });
        return redirect('/nova-senha-form/' . $user->id)->with('success', 'E-mail enviado com sucesso!');
    }

    //view para o user digitar a nova senha
    public function novaSenhaForm(Request $request, $id)
    {
        $user = User::find($id);

        return view('user.novaSenha')
            ->with('user', $user);
    }

    //altera a senha do user
    public function novaSenha(Request $request, $id)
    {
        $request->validate([
            'cod' => 'required'
        ]);

        $user = User::find($id);

        if ($user->remember_token != $request->cod) {
            return back()->with('error', 'Código inválido!');
        } else {
            $user->password = Hash::make($request->senha);
            $user->save();
        }

        return redirect('/')->with('success', 'Senha alterada com sucesso!');
    }
}
