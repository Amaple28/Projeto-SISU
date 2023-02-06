<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\sisu_anterior;

class sisu_atual extends Model
{
    use HasFactory;
    protected $table = 'sisu_atual';

    public function getsisu_anterior(){
        $sisu_anterior = sisu_anterior::where('faculdade_id', $this->faculdade_id)->first();
        return $sisu_anterior->nota;
    }

    public function getfaculdadeNome(){
        $faculdade = faculdade::where('id', $this->faculdade_id)->first();
        return $faculdade->nome;
    }

    public function getfaculdadeEstado(){
        $faculdade = faculdade::where('id', $this->faculdade_id)->first();
        return $faculdade->estado;
    }
}
