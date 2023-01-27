<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\simulacao;
use App\Models\faculdade;
use App\Models\sisu_atual;
use App\Models\sisu_anterior;

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

        $faculdades = [];
        foreach($request->input('faculdades') as $faculdade){
            $faculdades[] = faculdade::where('id', $faculdade)->first();            
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
        $estados =  [];
        $estados[] = 'AC';
        $estados[] = 'AL';
        $estados[] = 'AP';
        $estados[] = 'AM';
        $estados[] = 'BA';
        $estados[] = 'CE';
        $estados[] = 'DF';
        $estados[] = 'ES';
        $estados[] = 'GO';
        $estados[] = 'MA';
        $estados[] = 'MT';
        $estados[] = 'MS';
        $estados[] = 'MG';
        $estados[] = 'PA';
        $estados[] = 'PB';
        $estados[] = 'PR';
        $estados[] = 'PE';
        $estados[] = 'PI';
        $estados[] = 'RJ';
        $estados[] = 'RN';
        $estados[] = 'RS';
        $estados[] = 'RO';
        $estados[] = 'RR';
        $estados[] = 'SC';
        $estados[] = 'SP';
        $estados[] = 'SE';
        $estados[] = 'TO';

        return view('simulacao')
            ->with('simulacoes_positivas', $simulacoes_positivas)
            ->with('simulacoes_negativas', $simulacoes_negativas)
            ->with('simulacoes_neutras', $simulacoes_neutras)
            ->with('simulacao', $user_simulacao)
            ->with('faculdades', $faculdades)
            ->with('estados', $estados);
            
    }
    
    
}
