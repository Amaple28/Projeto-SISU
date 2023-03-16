<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Util;
use App\Models\User;
use App\Models\simulacao;
use App\Models\faculdade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // index do site - verifica se o usuario esta logado e redireciona para o dashboard ou admin
    public function indexFront()
    {
        $estados = Util::estados();
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->tipo_user == 1) {
                return redirect('/admin')
                    ->with('user', $user)
                    ->with('estados', $estados)
                    ->with('success', 'Login realizado com sucesso!');
            } else {
                return redirect('/dashboard')
                    ->with('user', $user)
                    ->with('estados', $estados)
                    ->with('success', 'Login realizado com sucesso!');
            }
        } else {
            $user = Auth::user();
            return view('index.index')
                ->with('user', $user);
        }
    }

    //realizar login do usuario
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            if ($user->tipo_user == 1) {
                return redirect('admin');
            } else {
                return redirect('dashboard');
            }
        } else {
            return redirect('/')
                ->with('error', 'Usuário ou senha Inválidos!')
                ->with('tab', 'login');
        }
    }

    // realizar cadastro do usuario
    public function criarUsuario(Request $request)
    {
        $novoUsuario = new User();
        $novoUsuario->name = $request->input('name');
        $novoUsuario->email = $request->input('email');
        $senha = $request->input('password');
        $novoUsuario->password = Hash::make($senha);

        // criando simulacao do user
        $simulacao = new simulacao();
        if ($request->input('matematicaR') == null && $request->input('humanasR') == null && $request->input('linguagensR') == null && $request->input('naturezaR') == null && $request->input('redacaoR') == null) {
            return redirect('/')
                ->with('error', 'Preencha as notas corretamente!');
        }
        // salvando notas preenchidas pelo usuario para realizar a simulacao
        $simulacao->matematica = $request->input('matematicaR');
        $simulacao->humanas = $request->input('humanasR');
        $simulacao->linguagens = $request->input('linguagensR');
        $simulacao->natureza = $request->input('naturezaR');
        $simulacao->redacao = $request->input('redacaoR');
        $simulacao->faculdades_id = 1;
        $simulacao->modalidade = 1;
        $simulacao->estado = 'mg';
        $simulacao->nota_corte = ($simulacao->matematica + $simulacao->humanas + $simulacao->linguagens + $simulacao->natureza + $simulacao->redacao) / 5;
        $phoneRegex = '/^\(\d{2}\)\s\d{5}-\d{4}$/';

        //verifica se o telefone é valido
        if (preg_match($phoneRegex, $request->input('tel'))) {
            $novoUsuario->telefone = $request->input('tel');
        } else {
            return redirect('/')
                ->with('error', 'Telefone inválido, tente novamente!')
                ->with('tab', 'login');
        }

        //verifica se o email já existe
        if (User::where('email', $novoUsuario->email)->first()) {
            return redirect('/')
                ->with('error', 'Email já cadastrado, tente outro!');
        }

        //salvando usuario e simulacao
        try {
            $novoUsuario->save();
            $simulacao->user_id = $novoUsuario->id;
            $simulacao->save();
        } catch (\Throwable $th) {
            $novoUsuario->delete();
            return redirect('/')
                ->with('error', 'Erro ao cadastrar usuário, tente novamente!');
        }

        return redirect('/')
            ->with('success', 'Usuário cadastrado com sucesso, faça o login!')
            ->with('tab', 'login');
    }

    //tela de dashboard do usuario - simulacao
    public function dashboard()
    {
        $user = Auth::user();

        return view('user.simulacao')
            ->with('user', $user)
            ->with('simulacao',  simulacao::where('user_id', $user->id)->first())
            ->with('faculdades',  faculdade::all())
            ->with('estados',  Util::estados());
    }

    //user deletar sua conta mediante confirmação de senha
    public function deletarUsuario(Request $request)
    {
        $user = User::find($request->user);
        if (!Hash::check($request->input('password_excluir'), $user->password)) {
            return redirect()->back()->with('error', 'Senha atual incorreta!');
        } else {
            $user->delete();

            return redirect()->route('logout')->with('success', 'Usuário deletado com sucesso!');
        }
    }
}
