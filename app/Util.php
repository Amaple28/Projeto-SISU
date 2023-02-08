<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Util extends Model
{
    // estados do brasil
    public static function estados(){
        // array somente com nomes de estado
        $estados = array(
            'Acre',
            'Alagoas',
            'Amapá',
            'Amazonas',
            'Bahia',
            'Ceará',
            'Distrito Federal',
            'Espírito Santo',
            'Goiás',
            'Maranhão',
            'Mato Grosso',
            'Mato Grosso do Sul',
            'Minas Gerais',
            'Pará',
            'Paraíba',
            'Paraná',
            'Pernambuco',
            'Piauí',
            'Rio de Janeiro',
            'Rio Grande do Norte',
            'Rio Grande do Sul',
            'Rondônia',
            'Roraima',
            'Santa Catarina',
            'São Paulo',
            'Sergipe',
            'Tocantins'
        );
        return $estados;
    }

    public static function convertCommaStringToFloat(string|int $value) : float
    {
        if(gettype($value) === 'integer') {
            return floatval($value);
        } else {
            return floatval(str_replace(',', '.', $value));
        }
    }
}
