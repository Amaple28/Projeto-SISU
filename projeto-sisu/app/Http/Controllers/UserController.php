<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function index(Request $request){
        // $decrypted = $request->input('password'); 
        // $user      = User::where('email', $request->input('email'))->first();
    
        // if ($user) {
        //     if (Crypt::decryptString($user->password) == $decrypted) {
        //         Auth::login($user);
    
        //         return $this->sendLoginResponse($request);
        //     }
        // }
    
        // return $this->sendFailedLoginResponse($request);
        return view('indexLogin');
    }

    public function criarUsuario(Request $request){
        $novoUsuario = new User();

        $novoUsuario->name = $request->input('nomeUsuario');
        $novoUsuario->nomeCompleto= $request->input('nomeCompleto');
        $novoUsuario->email= $request->input('email');
        $novoUsuario->telefone= $request->input('telefone');

        $novoUsuario->password = Crypt::encryptString('321312');
        
        // dd($novoUsuario->password);
        
        return redirect('/index-front')     //criar div para isso
        ->with('success', 'Usuario criado com sucesso!');
    }

    // FUNÇÕES DO FRONT
    public function indexFront(){
        return view('front_telas.index');
    }
}
