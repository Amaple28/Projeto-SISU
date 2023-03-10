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


        $pesoMat = $pesonotas->matematica;
        $pesoHum = $pesonotas->humanas;
        $pesoRed = $pesonotas->redacao;
        $pesoLin = $pesonotas->linguagens;
        $pesoNatu = $pesonotas->natureza;

        $matematica = $this->matematica * $pesonotas->matematica;

        $humanas = $this->humanas * $pesonotas->humanas;

        $redacao = $this->redacao * $pesonotas->redacao;

        $linguagens = $this->linguagens * $pesonotas->linguagens;

        $natureza = $this->natureza * $pesonotas->natureza;

        $numerator = $matematica + $humanas + $redacao + $linguagens + $natureza;
        $denominator = $pesoMat + $pesoHum + $pesoRed + $pesoLin + $pesoNatu;

        $total = round($numerator/$denominator, 2);
      return number_format((float) $total);
    }
}
