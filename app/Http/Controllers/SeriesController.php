<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Support\Facades\Session;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');
        
        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        /* Para inserir de forma "manual"
        
        $nomeSeries = $request->input('nome');
        $series = new Series();
        $series->nome = $nomeSeries;
        $series->save();*/


        /* Para inserir dados em Massa
         (necesspario definir um fillable no Objeto)
         
            Se caso eu quisesse pegar SOMENTE alguns campos
            poderia usar da sequinte forma:
               > $request->only([nome, sinopse,...]);

            Se caso eu quisesse pegar TODOS os campos
            exceto algum:
               > $request->except([_token]);
         */

        $serie = Series::create($request->all());
        for($i=1;$i <= $request->seasonsQty; $i++) {
            $season = $serie->seasons()->create([
                'number'=> $i,
            ]);

            for($j=1;$j <= $request->episodesPerSeason; $j++) {
                $season->episodes()->create([
                    'number'=> $j,
                ]);
            }
        }

        session()->flash('mensagem.sucesso', 'Série '.$serie->nome.' adicionada com sucesso');

        //redirect()->route('series.index'); versão antiga
        return to_route('series.index');
    }

    public function destroy(Series $series)
    {
        $series->delete();
        session()->flash('mensagem.sucesso', 'Série '.$series->nome.' removida com sucesso');

        return to_route('series.index');
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        session()->flash('mensagem.sucesso', 'Série '.$series->nome.' atualizada com sucesso');
        
        return to_route('series.index');
    }

}
