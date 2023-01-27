<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        Mail::send('send-email', ['name' => 'Maisa', 'email' => 'maisagabirodrigues@gmail.com', 'message' => 'testando'], function ($message) {
            $message->from('admin@simuladorsisumed.com');
            $message->to('maisagabirodrigues@gmail.com')->subject('Contato');
        });
    }


}
