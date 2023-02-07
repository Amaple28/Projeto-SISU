<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sisu_anterior;
use App\Models\sisu_atual;
use App\Models\PesoNotas;


class faculdade extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'faculdade';


    public function getsisu_anterior()
    {
       $nota = sisu_anterior::where('faculdade_id', $this->id)->first();
       $notas = $nota->nota;
         
        return $notas;
    }

    public function getsisu_atual()
    {
         $nota = sisu_atual::where('faculdade_id', $this->id)->first();
         
         $notas = $nota->nota;
         
         return $notas;
    }

    public function getSigla()
    {
        $sigla = $this->sigla;
        return $sigla;
    }

    public function getNome()
    {
        $nome = $this->nome;
        return $nome;
    }

    public function getPesoMatematica()
    {
        $peso = PesoNotas::where('faculdade_id', $this->id)->first();
        $peso_matematica = $peso->matematica;
        return $peso_matematica;
    }

    public function getPesoHumanas()
    {
        $peso = PesoNotas::where('faculdade_id', $this->id)->first();
        $peso_humanas = $peso->humanas;
        return $peso_humanas;
    }

    public function getPesoLinguagens()
    {
        $peso = PesoNotas::where('faculdade_id', $this->id)->first();
        $peso_linguagens = $peso->linguagens;
        return $peso_linguagens;
    }

    public function getPesoNatureza()
    {
        $peso = PesoNotas::where('faculdade_id', $this->id)->first();
        $peso_natureza = $peso->natureza;
        return $peso_natureza;
    }

    public function getPesoRedacao()
    {
        $peso = PesoNotas::where('faculdade_id', $this->id)->first();
        $peso_redacao = $peso->redacao;
        return $peso_redacao;
    }

}
