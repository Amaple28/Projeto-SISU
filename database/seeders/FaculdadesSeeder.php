<?php

namespace Database\Seeders;

use App\Models\faculdade;
use App\Models\PesoNotas;
use App\Util;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FaculdadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $amplaConcorrenciaJson = Storage::get('/public/json/faculdades_ampla_concorrencia.json');
        $faculdadesAmplaConcorrencia = json_decode($amplaConcorrenciaJson);

        $cotasJson = Storage::get('/public/json/faculdades_cotas.json');
        $faculdadeCotas = json_decode($cotasJson);

        foreach ($faculdadesAmplaConcorrencia as $key => $value) {
            $faculdade = faculdade::query()->updateOrCreate([
                "nome" => $value->NO_IES,
                "sigla" => $value->SG_IES,
                "endereco" => $value->NO_MUNICIPIO_CAMPUS,
                "estado" => $value->SG_UF_CAMPUS,
                "modalidade" => $value->TP_MODALIDADE
            ]);

            PesoNotas::query()->updateOrCreate([
                "faculdade_id" => $faculdade->id,
                "matematica" => Util::convertCommaStringToFloat($value->PESO_MATEMATICA),
                "humanas" => Util::convertCommaStringToFloat($value->PESO_CIENCIAS_HUMANAS),
                "natureza" => Util::convertCommaStringToFloat($value->PESO_CIENCIAS_NATUREZA),
                "linguagens" => Util::convertCommaStringToFloat($value->PESO_LINGUAGENS),
                "redacao" => Util::convertCommaStringToFloat($value->PESO_REDACAO),
            ]);
        }

        foreach ($faculdadeCotas as $key => $value) {
            if($value->TP_MODALIDADE != 'Ampla concorrência') $value->TP_MODALIDADE = 'COTAS';
            faculdade::query()->updateOrCreate([
                "nome" => $value->NO_IES,
                "sigla" => $value->SG_IES,
                "endereco" => $value->NO_MUNICIPIO_CAMPUS,
                "estado" => $value->SG_UF_CAMPUS,
                "modalidade" => $value->TP_MODALIDADE
            ]);

            PesoNotas::query()->updateOrCreate([
                "faculdade_id" => $faculdade->id,
                "matematica" => Util::convertCommaStringToFloat($value->PESO_MATEMATICA),
                "humanas" => Util::convertCommaStringToFloat($value->PESO_CIENCIAS_HUMANAS),
                "natureza" => Util::convertCommaStringToFloat($value->PESO_CIENCIAS_NATUREZA),
                "linguagens" => Util::convertCommaStringToFloat($value->PESO_LINGUAGENS),
                "redacao" => Util::convertCommaStringToFloat($value->PESO_REDACAO),
            ]);
        }
    }
}
