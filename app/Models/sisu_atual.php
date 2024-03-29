<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\sisu_anterior;

class sisu_atual extends Model
{
    use HasFactory;
    protected $table = 'sisu_atual';

    // pegar nota da faculdade no sisu anterior
    public function getsisu_anterior(){
        $sisu_anterior = sisu_anterior::where('faculdade_id', $this->faculdade_id)->first();
        return $sisu_anterior->nota;
    }

    // pega nome da faculdade
    public function getfaculdadeNome(){
        $faculdade = faculdade::where('id', $this->faculdade_id)->first();
        return $faculdade->nome;
    }

    // pega estado da faculdade
    public function getfaculdadeEstado(){
        $faculdade = faculdade::where('id', $this->faculdade_id)->first();
        return $faculdade->estado;
    }
}
