<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
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
        return view('welcome', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);      

        $user=User::where('email',$request->input('email'))->first();

        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            //return redirect('home/'.$user->id);
            return true;
        }
    
        // return redirect('/')
        //->with('error', 'Usuario ou senha Inválidos');

        return false;
    }

    public function indexLogin($id){
        return view('indexLogin',[
            'user' => User::findOrFail($id) 
            //teste
        ]);
    }

    public function criarUsuario(Request $request){        
        // dd($request);
        $novoUsuario = new User();
        $novoUsuario->name = $request->input('name');        
        $novoUsuario->email= $request->input('email');
        $novoUsuario->telefone= $request->input('tel');
        $senha= $request->input('password');
        $novoUsuario->password = Hash::make($senha);
        
        if (User::where('email',$novoUsuario->email)->first()){
            return redirect('/')
            ->with('error', 'Email já cadastrado, tente outro!');
        }
        else{
            $novoUsuario->save();

            return redirect('/')
            ->with('success', 'Usuário cadastrado com sucesso, faça o login!');

           // return redirect('/user_cadastro/'.$novoUsuario->id)   
           // ->with('success', 'Usuário cadastrado com sucesso!');
        }
    }

    // FUNÇÕES DO FRONT
    public function indexFront(){
        return view('front_telas.index');
    }
}
