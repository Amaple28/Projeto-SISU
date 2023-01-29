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
use App\Models\faculdade;
use App\Models\sisu_atual;
use App\Models\sisu_anterior;

class NotasController extends Controller
{

    public function faculdades(Request $request){
        $faculdades = faculdade::orderBy('id', 'desc')->paginate(15);
       
        $user=Auth::user();   

        return view('faculdades')
        ->with('faculdades', $faculdades)
        ->with('user', $user);
    }
}
