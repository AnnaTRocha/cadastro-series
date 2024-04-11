<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::query()->orderBy('nome')->get();

        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        /* Para inserir de forma "manual"
        
        $nomeSerie = $request->input('nome');
        $serie = new Serie();
        $serie->nome = $nomeSerie;
        $serie->save();*/


        /* Para inserir dados em Massa
         (necesspario definir um fillable no Objeto)
         
            Se caso eu quisesse pegar SOMENTE alguns campos
            poderia usar da sequinte forma:
               > $request->only([nome, sinopse,...]);

            Se caso eu quisesse pegar TODOS os campos
            exceto algum:
               > $request->except([_token]);
         */

        Serie::create($request->all());

        //redirect()->route('series.index'); versão antiga
        return to_route('series.index');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->series);
        return to_route('series.index');
    }

}
