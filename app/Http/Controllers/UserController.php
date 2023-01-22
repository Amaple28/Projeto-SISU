<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\simulacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use Sentinel;
use Reminder;
use Mail;

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
            'user' => User::findOrFail($id) 
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
        $simulacao->matematica = $request->input('matematicaR');
        $simulacao->humanas = $request->input('humanasR');
        $simulacao->linguagens = $request->input('linguagensR');
        $simulacao->natureza = $request->input('naturezaR');
        $simulacao->redacao = $request->input('redacaoR');
        $simulacao->faculdades_id = 1;
        $simulacao->modalidade =1;
        $simulacao->estado ='mg';
        $simulacao->nota_corte = ($simulacao->matematica + $simulacao->humanas + $simulacao->linguagens + $simulacao->natureza + $simulacao->redacao)/5;
     

        
        if (User::where('email',$novoUsuario->email)->first()){
            return redirect('/')
            ->with('error', 'Email já cadastrado, tente outro!');
        }

        $novoUsuario->save();
        $simulacao->user_id = $novoUsuario->id;
        try{ 
            $simulacao->save();            
        } catch (\Throwable $th) {
            return redirect('/')
            ->with('error', 'Erro ao cadastrar usuário, é necessario preencher todas as notas para cadastro!');
        }
            return redirect('/')
            ->with('success', 'Usuário cadastrado com sucesso, faça o login!')
            ->with('tab', 'login');        
    }

    public function recuperarSenha(Request $request){
        return view('front_telas.recuperarSenha');
    }

    public function recuperacaoSenha(Request $request){
    
        $user = User::where('email',$request->input('email'))->first();
        
        if($user == null){
            return redirect('/')
            ->with('error', 'Email não cadastrado, tente outro!');
        }
        
        $user = Sentinel::findById($user->id);
        // $reminder = Reminder::exists($user) ?: Reminder::create($user);
        $this->sendEmail($user);

        return redirect('/')
        ->with('success', 'Email enviado com sucesso, verifique sua caixa de entrada!');
    }

    public function sendEmail($user){
        Mail::send('emails.recuperarSenha', [
            'user' => $user,
            // 'code' => $code
        ], function($message) use ($user){
            $message->to($user->email);
            $message->subject("Olá $user->name, recupere sua senha!");
        });
    }

    public function novaSenha(Request $request, $id){

        return view('front_telas.novaSenha');
    }


    // FUNÇÕES DO FRONT
    public function indexFront(){
        return view('front_telas.index');
    }
}
