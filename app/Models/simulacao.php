<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PesoNotas;
use App\Models\faculdade;
class simulacao extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'simulacao';

    public function pesoNotas($id){
      $pesonotas = PesoNotas::where('$faculdade_id', $id)->first();
      $soma= ($this->matematica * $pesonotas->matematica) + ($this->humanas * $pesonotas->humanas) + ($this->redacao * $pesonotas->redacao) + ($this->linguagens * $pesonotas->linguagens) + ($this->natureza * $pesonotas->natureza);
      $total = $soma / 5;
      return $total;
    }
}
