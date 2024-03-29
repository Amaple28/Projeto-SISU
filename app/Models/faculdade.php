<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sisu_anterior;
use App\Models\sisu_atual;
use App\Models\PesoNotas;
use App\Models\User;
use App\Models\simulacao;

class faculdade extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'faculdade';

    // nota da faculdade no sisu anterior
    public function getsisu_anterior()
    {
        $nota = sisu_anterior::where('faculdade_id', $this->id)->first();
        if ($nota == null) {
            return 0;
        }
        $notas = $nota->nota;

        return $notas;
    }

    // nota da faculdade no sisu atual
    public function getsisu_atual()
    {
        $nota = sisu_atual::where('faculdade_id', $this->id)->first();
        if ($nota == null) {
            return 0;
        }

        $notas = $nota->nota;

        return $notas;
    }

    // sigla faculdade
    public function getSigla()
    {
        $sigla = $this->sigla;
        return $sigla;
    }

    // nome faculdade
    public function getNome()
    {
        $nome = $this->nome;
        return $nome;
    }

    // pesos de cada faculdade em cada área
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

    // calculo da nota do usuario na faculdade no sisu atual
    public function getCalculoAtual($id, $estado)
    {
        $notas_usuario = simulacao::where('user_id', $id)->first();
        $nota_corte = sisu_atual::where('faculdade_id', $this->id)->first();

        $nota = $notas_usuario->pesoNotas($this->id);

        if ($estado == 'Alagoas' && $this->estado == 'AL') {
            $nota += $nota * .1;
        }
        if ($estado == 'Acre' && $this->estado == 'AC') {
            $nota += $nota * .5;
        }
        if ($estado == 'Amazonas' && $this->estado == 'AM') {
            $nota += $nota * .2;
        }

        if ($nota >= $nota_corte->nota) {
            return 1;
        } else if ($nota_corte->nota === 0) {
            return 'zero';
        } else {
            return 0;
        }
    }

    // calculo da nota do usuario na faculdade no sisu anterior
    public function getCalculoAnterior($id, $estado)
    {
        $notas_usuario = simulacao::where('user_id', $id)->first();
        $nota_corte = sisu_anterior::where('faculdade_id', $this->id)->first();

        $nota = $notas_usuario->pesoNotas($this->id);

        if ($estado == 'Alagoas' && $this->estado == 'AL') {
            $nota += $nota * .1;
        }
        if ($estado == 'Acre' && $this->estado == 'AC') {
            $nota += $nota * .5;
        }
        if ($estado == 'Amazonas' && $this->estado == 'AM') {
            $nota += $nota * .2;
        }

        if ($nota >= $nota_corte->nota) {
            return 1;
        } else if ($nota_corte->nota === 0) {
            return 'zero';
        } else {
            return 0;
        }
    }

    public function PesoNotas()
    {
        return $this->hasOne(PesoNotas::class);
    }

    // modalidade selecionado pelo usuario
    public function getModalidade()
    {
        if ($this->modalidade == 'Ampla concorrência') {
            return 'AMPLA';
        } else {
            return 'COTAS';
        }
    }

    // calculo bonus regional se o usuario tiver estudado na região
    public function getCalculaNotaUserFacul($id, $estado)
    {
        $nusuario = simulacao::where('user_id', $id)->first();
        $notas_usuario = $nusuario->pesoNotas($this->id);

        if ($estado == 'Alagoas' && $this->estado == 'AL') {
            $notas_usuario += $notas_usuario * .1;
        }
        if ($estado == 'Acre' && $this->estado == 'AC') {
            $notas_usuario += $notas_usuario * .05;
        }
        if ($estado == 'Amazonas' && $this->estado == 'AM') {
            $notas_usuario += $notas_usuario * .2;
        }

        //  converte notas pra float sempre com duas casas decimais
        $notas_usuario = number_format($notas_usuario, 2, '.', '');

        return $notas_usuario;
    }
}
