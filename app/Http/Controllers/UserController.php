<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\simulacao;
use App\Models\faculdade;
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

    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);      

        $user=User::where('email',$request->input('email'))->first();

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // chamar funcap de dashboard
            return redirect('/dashboard/'.$user->id)
                ->with('success', 'Login realizado com sucesso!');
        } else{
            return redirect('/')
                ->with('error', 'Usuário ou senha Inválidos!')
                ->with('tab', 'login');
        }
    }

    public function dashboardUsuario($id){
        return view('front_telas.simulacao',[
            'user' => User::findOrFail($id),
            'estados' => $this->estados(),
            'faculdades' => faculdade::all()
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

        $simulacao = new simulacao();
        $simulacao->matematica = $request->input('matematica');
        $simulacao->humanas = $request->input('humanas');
        $simulacao->linguagens = $request->input('linguagens');
        $simulacao->natureza = $request->input('natureza');
        $simulacao->redacao = $request->input('redacao');
        $simulacao->faculdades_id = 1;
        $simulacao->modalidade =1;
        $simulacao->estado ='mg';
        $simulacao->nota_corte = ($simulacao->matematica + $simulacao->humanas + $simulacao->linguagens + $simulacao->natureza + $simulacao->redacao)/5;

        
        if (User::where('email',$novoUsuario->email)->first()){
            return redirect('/')
            ->with('error', 'Email já cadastrado, tente outro!');
        }
        else{
            $novoUsuario->save();
            
            $simulacao->user_id = $novoUsuario->id;
            $simulacao->save();
            
            return redirect('/')
            ->with('success', 'Usuário cadastrado com sucesso, faça o login!')
            ->with('tab', 'login');
        }
    }

    // FUNÇÕES DO FRONT
    public function indexFront(){
        return view('front_telas.index');
    }

    //ESTADOS DO BRASIL
    public function estados(){
        $estados = [];
        $estados[] = 'AC';
        $estados[] = 'AL';
        $estados[] = 'AP';
        $estados[] = 'AM';
        $estados[] = 'BA';
        $estados[] = 'CE';
        $estados[] = 'DF';
        $estados[] = 'ES';
        $estados[] = 'GO';
        $estados[] = 'MA';
        $estados[] = 'MT';
        $estados[] = 'MS';
        $estados[] = 'MG';
        $estados[] = 'PA';
        $estados[] = 'PB';
        $estados[] = 'PR';
        $estados[] = 'PE';
        $estados[] = 'PI';
        $estados[] = 'RJ';
        $estados[] = 'RN';
        $estados[] = 'RS';
        $estados[] = 'RO';
        $estados[] = 'RR';
        $estados[] = 'SC';
        $estados[] = 'SP';
        $estados[] = 'SE';
        $estados[] = 'TO';

        return $estados;
    }
}
