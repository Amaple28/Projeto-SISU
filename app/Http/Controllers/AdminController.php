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



class AdminController extends Controller
{
    public function users(Request $request){
        $users = User::orderBy('id', 'desc')->paginate(15);
        $user=Auth::user();

        return view('users')
        ->with('users', $users)
        ->with('user', $user);
    }

    public function deletar($id){

        $user = User::find($id);
        $user->delete();

        return redirect()->route('users');
    }

    public function baixarLeads(Request $request){
        $users = User::all();

        $file = fopen('leads.csv', 'w');
        fputcsv($file, array('Nome', 'Email', 'Telefone'));

        foreach ($users as $user) {
            if($user->tipo_user != 1){
                fputcsv($file, array($user->name, $user->email, $user->telefone));
            }
        }

        fclose($file);

        return response()->download('leads.csv');
    }

    public function baixarLead(Request $request, $id){
        $user = User::find($id);

        $file = fopen('lead.csv', 'w');
        fputcsv($file, array('Nome', 'Email', 'Telefone'));

        if($user->tipo_user != 1){
            fputcsv($file, array($user->name, $user->email, $user->telefone));
        }

        fclose($file);

        return response()->download('lead.csv');
    }

    public function editarPermissao(Request $request){

        if(is_null($request->input('tipo_user'))){
            return redirect()->back()->with('error', 'Por Favor, selecione uma permissão!');
        }

        $user = User::find($request->input('id'));
        $user->tipo_user = $request->input('tipo_user');
        $user->save();

        return redirect()->back()->with('success', 'Permissão alterada com sucesso!');
    }

    public function deleteUser(Request $request){
        $id = $request->input('id');
        $user = User::find($id);

        if($user->tipo_user == 1){
            return redirect()->back()->with('error', 'Não é possível deletar o usuário administrador!');
        }
        if ($user->delete()) {
            return redirect()->back()->with('success', 'Usuário deletado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao deletar usuário!');
        }
    }

    public function deletarUsuario(Request $request){
        $user = User::find($request->user);
        if(!Hash::check($request->input('password_excluir'), $user->password)){
            return redirect()->back()->with('error', 'Senha atual incorreta!');
        }
        else{
            $user->delete();

            return redirect()->route('logout')->with('success', 'Usuário deletado com sucesso!');
        }
    }

    public function editarUsuario(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        if($user == null){
            return redirect()->back()->with('error', 'Não é possível editar o usuário!');
        }
        $user->name = $request->input('name');
        $user->telefone = $request->input('telefone');

        if($user->save()){
            return redirect()->back()->with('success', 'Usuário editado com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Erro ao editar usuário!');
        }

    }


    public function editarSenha(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        if(!Hash::check($request->input('password_atual'), $user->password)){
            return redirect()->back()->with('error', 'Senha atual incorreta!');
        }

        if($request->input('password') != $request->input('password_confirmation')){
            return redirect()->back()->with('error', 'As senhas não conferem!');
        }

        $user->password = Hash::make($request->input('password'));

        if($user->save()){
            return redirect()->back()->with('success', 'Senha editada com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Erro ao editar senha!');
        }

    }

}
