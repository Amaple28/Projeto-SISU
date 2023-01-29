<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\faculdade;
use App\Models\sisu_atual;
use App\Models\sisu_anterior;
use Illuminate\Support\Facades\DB;

class NotasController extends Controller
{

    public function faculdades(Request $request){
        $faculdades = faculdade::orderBy('id', 'desc')->paginate(15);
       
        $user=Auth::user();   

        return view('faculdades')
        ->with('faculdades', $faculdades)
        ->with('user', $user);
    }

    public function editarNotas($id){
        
        $data = DB::table('faculdade')
            ->join('sisu_atual', 'faculdade.id', '=', 'sisu_atual.faculdade_id')
            ->join('sisu_anterior', 'faculdade.id', '=', 'sisu_anterior.faculdade_id')
            ->select('faculdade.*', 'sisu_atual.nota as nota_atual', 'sisu_anterior.nota as nota_anterior')
            ->where('faculdade.id', '=', $id)
            ->get();
        return $data;
    }

    public function salvarNotas(Request $request){
        // dd($request->all());
        $id = $request->input('id');
        $nota_sisu_atual = $request->input('nota_sisu_atual');
        $nota_sisu_anterior = $request->input('nota_sisu_anterior');
        $faculdade = faculdade::where('id', $id)->first();
        
        $sisu_anterior = sisu_anterior::where('faculdade_id', $faculdade->id)->first();
        $sisu_anterior->nota = $nota_sisu_anterior;
        $sisu_anterior->save();

        $sisu_atual = sisu_atual::where('faculdade_id', $faculdade->id)->first();
        $sisu_atual->nota = $nota_sisu_atual;
        $sisu_atual->save();       

          

        return redirect()->route('faculdades');
    }

}
