<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\simulacao;
use App\Models\faculdade;
use App\Models\sisu_atual;
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

class SimulacaoController extends Controller
{
    public function simulacaoFaculdades(Request $request)
    {
        // dd($request->input('faculdades'));
        $user = Auth::user();
        $user_simulacao = simulacao::where('user_id', $user->id)->first();

        $simulacoes_positivas = [];
        $simulacoes_negativas = [];
        $simulacoes_neutras = [];
        $modalidade = $request->input('modalidade');
        $faculdades = $request->input('faculdades');
        // dd(count($faculdades));
        // if($request->input('modalidade') == null){
        //     return redirect()->back()->with('error', 'Selecione uma modalidade');            
        // }


        if ($request->input('faculdades') == null || count($faculdades) > 3 || count($faculdades) < 1) {
            return redirect()->back()->with('error', 'Selecione no mínimo 1 e no máximo 3 faculdades');
        }





        foreach ($faculdades as $faculdade) {
            $nota_corte = sisu_atual::where('faculdade_id', $faculdade)->first();

            if ($request->input('estado') == 'Alagoas' && $nota_corte->estado == 'AL') {
                if (($user_simulacao->nota_corte * 0.1) > $nota_corte->nota) {
                    $simulacoes_positivas[] = $nota_corte;
                } else if (($user_simulacao->nota_corte * 0.1) < $nota_corte->nota) {
                    $simulacoes_negativas[] = $nota_corte;
                } else {
                    $simulacoes_neutras[] = $nota_corte;
                }
            } else if ($request->input('estado') == 'Acre' && $nota_corte->estado == 'AC') {
                if (($user_simulacao->nota_corte * 0.15) > $nota_corte->nota) {
                    $simulacoes_positivas[] = $nota_corte;
                } else if (($user_simulacao->nota_corte * 0.15) < $nota_corte->nota) {
                    $simulacoes_negativas[] = $nota_corte;
                } else {
                    $simulacoes_neutras[] = $nota_corte;
                }
            } else if ($request->input('estado') == "Amazonas" && $nota_corte->estado == "AM") {
                if (($user_simulacao->nota_corte * 0.2) > $nota_corte->nota) {
                    $simulacoes_positivas[] = $nota_corte;
                } else if (($user_simulacao->nota_corte * 0.2) < $nota_corte->nota) {
                    $simulacoes_negativas[] = $nota_corte;
                } else {
                    $simulacoes_neutras[] = $nota_corte;
                }
            } else {

                if ($user_simulacao->nota_corte > $nota_corte->nota) {
                    $simulacoes_positivas[] = $nota_corte;
                } else if ($user_simulacao->nota_corte < $nota_corte->nota) {
                    $simulacoes_negativas[] = $nota_corte;
                } else {
                    $simulacoes_neutras[] = $nota_corte;
                }
            }
        }
        $faculdades = faculdade::all();
        


        return view('simulacao')
            ->with('simulacao', $user_simulacao)
            ->with('simulacoes_positivas', $simulacoes_positivas)
            ->with('simulacoes_negativas', $simulacoes_negativas)
            ->with('user', $user)
            ->with('faculdades',  faculdade::all())
            ->with('estados',  Util::estados());
    }
}
