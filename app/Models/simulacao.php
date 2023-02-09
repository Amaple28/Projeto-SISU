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
 
        // $soma += $this->matematica * $pesonotas->matematica;

        // $soma += $this->humanas * $pesonotas->humanas;

        // $soma += $this->redacao * $pesonotas->redacao;
        
      
      
        // $soma += $this->linguagens * $pesonotas->linguagens;
  
        // $soma += $this->natureza * $pesonotas->natureza;
        
      

      $soma= ($this->matematica * $pesonotas->matematica) + ($this->humanas * $pesonotas->humanas) + ($this->redacao * $pesonotas->redacao) + ($this->linguagens * $pesonotas->linguagens) + ($this->natureza * $pesonotas->natureza);
      $total = $soma /10 ;
      return $total;
    }
}
