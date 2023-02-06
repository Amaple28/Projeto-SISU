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
    public function deletar($id){

        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin');
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

    public function editarPermissao($id){
        
        $data= User::where('id',$id)->first();
        return $data;
    }

    public function salvarPermissoes(Request $request){
        $user = User::find($request->input('id'));
        $user->tipo_user = $request->input('tipo_user');
        $user->save();

        return redirect()->route('admin')
        ->with('success', 'Permissão atualizada com sucesso');
    }

}
