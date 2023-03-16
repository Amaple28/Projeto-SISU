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

  // realiza cálculo da simulação 
  public function pesoNotas($id)
  {
    // peso da faculdade 
    $pesonotas = PesoNotas::where('faculdade_id', $id)->first();
    $pesoMat = $pesonotas->matematica;
    $pesoHum = $pesonotas->humanas;
    $pesoRed = $pesonotas->redacao;
    $pesoLin = $pesonotas->linguagens;
    $pesoNatu = $pesonotas->natureza;

    // multiplica as notas pelo peso da faculdade
    $matematica = $this->matematica * $pesonotas->matematica;
    $humanas = $this->humanas * $pesonotas->humanas;
    $redacao = $this->redacao * $pesonotas->redacao;
    $linguagens = $this->linguagens * $pesonotas->linguagens;
    $natureza = $this->natureza * $pesonotas->natureza;

    // soma as notas
    $numerator = $matematica + $humanas + $redacao + $linguagens + $natureza;
    $denominator = $pesoMat + $pesoHum + $pesoRed + $pesoLin + $pesoNatu;

    // calcula a média
    $total = round($numerator / $denominator, 2);
    return number_format((float) $total);
  }
}
