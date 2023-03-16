<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\simulacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    // tela inicial do admin
    public function dashboardAdmin()
    {
        $users = User::orderBy('id', 'desc')->paginate(15);
        $user = Auth::user();
        return view('admin.admin')
            ->with('users', $users)
            ->with('user', $user);
    }

    //view users
    public function users(Request $request)
    {
        $users = User::orderBy('id', 'desc')->paginate(15);
        $user = Auth::user();

        return view('admin.users')
            ->with('users', $users)
            ->with('user', $user);
    }

    //exportar arquivo csv com dados dos users
    public function baixarLeads(Request $request)
    {
        $users = User::all();

        $file = fopen('leads.csv', 'w');
        // colunas do arquivo csv
        fputcsv($file, array('Nome', 'Email', 'Telefone', 'Matemática', 'Humanas', 'Natureza', 'Linguagens', 'Redação', 'Nota de Corte'));

        //filtrando dados que vão ser utilizados de cada user
        foreach ($users as $user) {
            if ($user->tipo_user != 1) {
                $notas = simulacao::where('user_id', $user->id)->first();
                fputcsv($file, array($user->name, $user->email, $user->telefone, $notas->matematica, $notas->humanas, $notas->natureza, $notas->linguagens, $notas->redacao, $notas->nota_corte));
            }
        }

        fclose($file);
        return response()->download('leads.csv');
    }

    //alterando permissao de user (admin ou comum)
    public function editarPermissao(Request $request)
    {
        if (is_null($request->input('tipo_user'))) {
            return redirect()->back()->with('error', 'Por Favor, selecione uma permissão!');
        }

        $user = User::find($request->input('id'));
        $user->tipo_user = $request->input('tipo_user');
        $user->save();

        return redirect()->back()->with('success', 'Permissão alterada com sucesso!');
    }

    //deletar conta de user
    public function deleteUser(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);

        if ($user->tipo_user == 1) {
            return redirect()->back()->with('error', 'Não é possível deletar o usuário administrador!');
        }
        if ($user->delete()) {
            return redirect()->back()->with('success', 'Usuário deletado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao deletar usuário!');
        }
    }

    //editar dados do user
    public function editarUsuario(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        if ($user == null) {
            return redirect()->back()->with('error', 'Não é possível editar o usuário!');
        }
        $user->name = $request->input('name');
        $user->telefone = $request->input('telefone');

        if ($user->save()) {
            return redirect()->back()->with('success', 'Usuário editado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao editar usuário!');
        }
    }

    //user editar senha
    public function editarSenha(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
        if (!Hash::check($request->input('password_atual'), $user->password)) {
            return redirect()->back()->with('error', 'Senha atual incorreta!');
        }

        if ($request->input('password') != $request->input('password_confirmation')) {
            return redirect()->back()->with('error', 'As senhas não conferem!');
        }

        $user->password = Hash::make($request->input('password'));

        if ($user->save()) {
            return redirect()->back()->with('success', 'Senha editada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao editar senha!');
        }
    }
}
