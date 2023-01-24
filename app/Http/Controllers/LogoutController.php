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

use Sentinel;
// use Reminder;
use Mail;

class LogoutController extends Controller
{
    //

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('login')
            ->with('success', 'Logout realizado com sucesso!');
    }
}
