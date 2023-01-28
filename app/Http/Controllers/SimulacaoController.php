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


class SimulacaoController extends Controller
{
    public function simulacaoFaculdades(Request $request){
        // dd($request->input('faculdades'));
        $user = Auth::user();
        $user_simulacao= simulacao::where('user_id', $user->id)->first();
        
        $simulacoes_positivas = [];
        $simulacoes_negativas = [];
        $simulacoes_neutras = [];
        $modalidade = $request->input('modalidade');
        $faculdades = [];
        
        foreach($request->input('faculdades') as $faculdade){
            $faculdades[] = faculdade::where('id', $faculdade)->first();            
        }

        if($request->input('estado') != 'Todos'){
            $faculdades = faculdade::where('estado', $request->input('estado'))->get();
        }

        if($faculdades.length > 3 || $faculdades.length < 1){
            return redirect()->back()->with('error', 'Selecione no mínimo 1 e no máximo 3 faculdades');            
        }

        foreach($faculdades as $faculdade){
            $nota_corte = sisu_atual::where('faculdade_id', $faculdade)->first();
            
            if($user_simulacao->nota_corte > $nota_corte->nota){
                $simulacoes_positivas[] = $nota_corte;
            }
            else if($user_simulacao->nota_corte < $nota_corte->nota){
                $simulacoes_negativas[] = $nota_corte;
            }
            else{
                $simulacoes_neutras[] = $nota_corte;
            }
        }

        $faculdades = faculdade::all();

        $estados = Util::estados();

        return view('simulacao')
            ->with('simulacoes_positivas', $simulacoes_positivas)
            ->with('simulacoes_negativas', $simulacoes_negativas)
            ->with('simulacoes_neutras', $simulacoes_neutras)
            ->with('simulacao', $user_simulacao)
            ->with('faculdades', $faculdades)
            ->with('estados', $estados);
            
    }
    
    
}
