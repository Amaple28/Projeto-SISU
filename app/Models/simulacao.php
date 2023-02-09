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
      $pesonotas = PesoNotas::where('faculdade_id', $id)->first();
      $soma = 0;
      $dividendo=0;

        $matematica = $this->matematica * $pesonotas->matematica;

        $humanas = $this->humanas * $pesonotas->humanas;

        $redacao = $this->redacao * $pesonotas->redacao;

        $linguagens = $this->linguagens * $pesonotas->linguagens;

        $natureza = $this->natureza * $pesonotas->natureza;

        $soma = $matematica + $humanas + $redacao + $linguagens + $natureza;

      // $soma= ($this->matematica * $pesonotas->matematica) + ($this->humanas * $pesonotas->humanas) + ($this->redacao * $pesonotas->redacao) + ($this->linguagens * $pesonotas->linguagens) + ($this->natureza * $pesonotas->natureza);
      $total = $soma /10 ;
      return $total;
    }
}
