<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\simulacao;
use App\Models\faculdade;
use App\Models\sisu_atual;
use App\Models\PesoNotas;
use App\Models\sisu_anterior;
use App\Util;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\DB;


class SimulacaoController extends Controller
{
    //realiza simulacao de aprovação de acordo com os dados informados pelo usuario
    public function simulacaoFaculdades(Request $request)
    {
        $user = Auth::user();
        $user_simulacao = simulacao::where('user_id', $user->id)->first();

        $modalidade = $request->input('modalidade');
        $faculdades = $request->input('faculdades');
        $estado = $request->input('estado');

        if ($request->input('modalidade') === null) {
            return redirect()->back()->with('error', 'Selecione uma modalidade');
        }

        //filtra as faculdades escolhidas pelo user
        $faculdades_escolhidas = [];

        if ($faculdades != null && count($faculdades) <= 3 && count($faculdades) >= 1) {
            foreach ($faculdades as $faculdade) {
                $faculdade = faculdade::where('id', $faculdade)->first();
                array_push($faculdades_escolhidas, $faculdade);
            }
        } else if ($request->input('faculdades') == null || count($faculdades) > 3 || count($faculdades) < 1) {
            return redirect()->back()->with('error', 'Selecione 3 faculdades!');
        }

        //separa o restante das faculdades de acordo com modalidade selecionada
        $faculdades = faculdade::orderBy('id', 'desc')->get();

        if ($request->input('modalidade') == 1) {
            $faculdades_demais = faculdade::where('modalidade', 'Ampla concorrência')->get();
        } elseif ($request->input('modalidade') == 2) {
            $faculdades_demais = faculdade::where('modalidade', 'Cotas')->get();
        } else {
            $faculdades_demais = faculdade::orderBy('id', 'desc')->get();
        }

        return view('user.simulacao')
            ->with('simulacao', $user_simulacao)
            ->with('faculdades_escolhidas', $faculdades_escolhidas)
            ->with('user', $user)
            ->with('estado', $estado)
            ->with('faculdades',  $faculdades)
            ->with('faculdades_demais',  $faculdades_demais)
            ->with('estados',  Util::estados())
            ->with('modalidade', $modalidade);
    }
}
