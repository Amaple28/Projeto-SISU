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
    // public function dashboardAdmin(){

    //     $users = User::all();
    //     //dd($users);

    //     return view('front_telas.dashboardAdmin')
    //     ->with('users', $users);
    // }
    

    public function deletar($id){

        $user = User::find($id);
        $user->delete();

        return redirect()->route('dashboardAdmin');
    }
}
