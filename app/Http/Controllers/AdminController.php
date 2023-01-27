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

        return redirect()->route('dashboardAdmin');
    }

    public function notas2023(Request $request){
        $user = Auth::user();
        if($user->tipo_user != 1){
            return redirect()->route('dashboard');
        }
       

        return view('welcome', ['user' => $user]);
    }
}
