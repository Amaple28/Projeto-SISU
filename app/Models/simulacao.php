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
      if($pesonotas->matematica !=0){
        $soma += $this->matematica * $pesonotas->matematica;
      }
      else{
        $soma += $this->matematica;
      }
      if($pesonotas->humanas !=0){
        $soma += $this->humanas * $pesonotas->humanas;
      }
      else{
        $soma += $this->humanas;
      }
      if($pesonotas->redacao !=0){
        $soma += $this->redacao * $pesonotas->redacao;
      }
      else{
        $soma += $this->redacao;
      }
      if($pesonotas->linguagens !=0){
        $soma += $this->linguagens * $pesonotas->linguagens;
      }
      else{
        $soma += $this->linguagens;
      }
      if($pesonotas->natureza !=0){
        $soma += $this->natureza * $pesonotas->natureza;
      }
      else{
        $soma += $this->natureza;
      }

      // $soma= ($this->matematica * $pesonotas->matematica) + ($this->humanas * $pesonotas->humanas) + ($this->redacao * $pesonotas->redacao) + ($this->linguagens * $pesonotas->linguagens) + ($this->natureza * $pesonotas->natureza);
      $total = $soma / 10;
      return $total;
    }
}
