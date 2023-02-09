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
use App\Models\PesoNotas;

class NotasController extends Controller
{

    public function faculdades(Request $request){
        $faculdades = faculdade::orderBy('id', 'desc')->paginate(15);

        $user=Auth::user();
        
        return view('faculdades')
        ->with('faculdades', $faculdades)
        ->with('user', $user);
    }

    public function notas(Request $request){
        $faculdades = faculdade::all()->sortBy( 'endereco');
        $notas_2023 = sisu_atual::all();

        $user=Auth::user();

        return view('notas_admin')
        ->with('faculdades', $faculdades)
        ->with('user', $user)
        ->with('notas_2023', $notas_2023);
    }

    public function editarNotas2023(Request $request){
        $faculdades = faculdade::all();

        foreach ($faculdades as $faculdade) {
            $nota = $request->input($faculdade->id);

            if($nota == null){
                $nota = 0;
            }

            $nota_corte = sisu_atual::where('faculdade_id', $faculdade->id)->first();
            $nota_corte->nota = $nota;
            $nota_corte->save();
        }

        return redirect()->back()->with('success', 'Notas atualizadas com sucesso!');

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


    public function editarPesos($id)
    {

        $data = DB::table('faculdade')
            ->join('PesoNotas', 'faculdade.id', '=', 'PesoNotas')
            ->select('faculdade.*', 'PesoNotas as peso')
            ->where('faculdade.id', '=', $id)
            ->get();
        return $data;

    }

    public function salvarPesos(Request $request)
    {
        $todos = $request->all();
        foreach ($todos as $key => $value) {
            if($value == null){
                return redirect()->back()->with('error', 'Preencha todos os campos!');
            }
        }
        $id = $request->input('id');

        $faculdade = faculdade::where('id', $id)->first();
        $faculdade->nome = $request->input('nome');
        $faculdade->sigla = $request->input('sigla');
        $faculdade->estado = $request->input('estado');
        $faculdade->endereco = $request->input('endereco');
        $faculdade->save();

        $pesos = PesoNotas::where('faculdade_id', $id)->first();

        $pesos->matematica = $request->input('matematica');
        $pesos->humanas = $request->input('humanas');
        $pesos->linguagens = $request->input('linguagens');
        $pesos->natureza = $request->input('natureza');
        $pesos->redacao = $request->input('redacao');
        $pesos->save();

        $nota_sisu_anterior = sisu_anterior::where('faculdade_id', $faculdade->id)->first();
        $nota_sisu_anterior->nota = $request->input('nota_corte2022');
        $nota_sisu_anterior->save();

        $nota_sisu_atual = sisu_atual::where('faculdade_id', $faculdade->id)->first();
        $nota_sisu_atual->nota = $request->input('nota_corte2023');
        $nota_sisu_atual->save();


        return redirect()->back()->with('success', 'Dados atualizados com sucesso!');
    }


    public function adicionarFaculdade(Request $request)
    {
        $todos = $request->all();
        foreach ($todos as $key => $value) {
            if($value == null){
                return redirect()->back()->with('error', 'Preencha todos os campos!');
            }
        }

        $faculdade = new faculdade();
        $faculdade->nome = $request->input('nome');
        $faculdade->sigla = $request->input('sigla');
        $faculdade->estado = $request->input('estado');
        $faculdade->endereco = $request->input('endereco');
        $faculdade->modalidade = $request->input('modalidade');
        $faculdade->peso = 0;

        if(!$faculdade->save()){
            return redirect()->back()->with('error', 'Erro ao cadastrar faculdade!');
        }
        $faculdade->save();

        $pesos = new PesoNotas();
        $pesos->faculdade_id = $faculdade->id;
        $pesos->matematica = $request->input('matematica');
        $pesos->humanas = $request->input('humanas');
        $pesos->linguagens = $request->input('linguagens');
        $pesos->natureza = $request->input('natureza');
        $pesos->redacao = $request->input('redacao');
        if(!$pesos->save()){
            return redirect()->back()->with('error', 'Erro ao cadastrar pesos!');
        }
        $pesos->save();

        $sisu_atual = new sisu_atual();
        $sisu_atual->faculdade_id = $faculdade->id;
        $sisu_atual->nota = $request->input('nota_corte2023');
        if(!$sisu_atual->save()){
            return redirect()->back()->with('error', 'Erro ao cadastrar notas!');
        }
        $sisu_atual->save();


        $sisu_anterior = new sisu_anterior();
        $sisu_anterior->faculdade_id = $faculdade->id;
        $sisu_anterior->nota = $request->input('nota_corte2022');
        if(!$sisu_anterior->save()){
            return redirect()->back()->with('error', 'Erro ao cadastrar notas!');
        }
        $sisu_anterior->save();

        return redirect()->back()->with('success', 'Faculdade cadastrada com sucesso!');
    }

    public function deletarFaculdade(Request $request)
    {
        $id = $request->input('id');
        $faculdade = faculdade::where('id', $id)->first();
        $faculdade->delete();
        return redirect()->back()->with('success', 'Faculdade deletada com sucesso!');
    }

}
