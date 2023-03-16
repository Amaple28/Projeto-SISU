<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nomeCompleto',
        'email',
        'password',
        'telefone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // envia email logo após usuario realizar cadastro
    public function sendEmailCadastro($id)
    {
        $user = $this::find($id);
        $email = $user->email;
        $name = $user->name;
        $data = array('name' => $name, "body" => "Cadastro realizado com sucesso!");
        Mail::send('layouts.emails.cadastro', $data, function ($message) use ($email, $name) {
            $message->to($email, $name)
                ->subject('Cadastro'); //assunto
            $message->from('contato@simuladorsisumed.com', 'SIMULADOR SISU VEMMED');
        });
    }

    // verificando se o usuario é admin
    public function isAdmin()
    {
        return $this->tipo_user === 1;
    }
}
