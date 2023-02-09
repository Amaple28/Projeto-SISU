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
    public function simulacaoFaculdades(Request $request)
    {
        // dd($request->input('faculdades'));
        $user = Auth::user();
        $user_simulacao = simulacao::where('user_id', $user->id)->first();

        $modalidade = $request->input('modalidade');
        $faculdades = $request->input('faculdades');
        $estado = $request->input('estado');
         
         if($request->input('modalidade') == null){
             return redirect()->back()->with('error', 'Selecione uma modalidade');            
         }

        $faculdades_escolhidas = [];

        if ($faculdades != null && count($faculdades) <= 3 && count($faculdades) >= 1) {
            foreach ($faculdades as $faculdade) {
                $faculdade = faculdade::where('id', $faculdade)->first();
                array_push($faculdades_escolhidas, $faculdade);
            }
        }
        else if ($request->input('faculdades') == null || count($faculdades) > 3 || count($faculdades) < 1) {
           return redirect()->back()->with('error', 'Selecione 3 faculdades!');
        }

        $faculdades = faculdade::orderBy('id', 'desc')->get();
        
        
       $faculdades_demais = faculdade::orderBy('id', 'desc')->get();

        return view('simulacao')
            ->with('simulacao', $user_simulacao)
            ->with('faculdades_escolhidas', $faculdades_escolhidas)
            ->with('user', $user)
            ->with('estado', $estado)
            ->with('faculdades',  $faculdades)
            ->with('faculdades_demais',  $faculdades_demais)
            ->with('estados',  Util::estados());
    }



    
}
