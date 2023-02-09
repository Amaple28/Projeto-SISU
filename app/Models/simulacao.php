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
      if($pesonotas->matematica !=0){
        $soma += $this->matematica * $pesonotas->matematica;
        $dividendo +=2;
      }
      else{
        $soma += $this->matematica;
        $dividendo ++;
      }
      if($pesonotas->humanas !=0){
        $soma += $this->humanas * $pesonotas->humanas;
        $dividendo +=2;
      }
      else{
        $soma += $this->humanas;
        $dividendo +=2;
      }
      if($pesonotas->redacao !=0){
        $soma += $this->redacao * $pesonotas->redacao;
        $dividendo +=2;
      }
      else{
        $soma += $this->redacao;
        $dividendo ++;
      }
      if($pesonotas->linguagens !=0){
        $soma += $this->linguagens * $pesonotas->linguagens;
        $dividendo +=2;
      }
      else{
        $soma += $this->linguagens;
        $dividendo ++;
      }
      if($pesonotas->natureza !=0){
        $soma += $this->natureza * $pesonotas->natureza;
        $dividendo +=2;
      }
      else{
        $soma += $this->natureza;
        $dividendo ++;
      }

      // $soma= ($this->matematica * $pesonotas->matematica) + ($this->humanas * $pesonotas->humanas) + ($this->redacao * $pesonotas->redacao) + ($this->linguagens * $pesonotas->linguagens) + ($this->natureza * $pesonotas->natureza);
      $total = $soma /$dividendo;
      return $total;
    }
}
