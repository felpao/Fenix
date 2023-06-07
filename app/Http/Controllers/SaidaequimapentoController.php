<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Saidaequimapento;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class SaidaequimapentoController extends Controller
{

    public function index(){

        $saidaequimapentos = Saidaequimapento::paginate(25);
        Paginator::useBootstrap();
        return view('saidaequipamento.lista', compact('saidaequimapentos'));
    }


    public function create(){

        $equipamentos = Equipamento::get();

        return view('saidaequipamento.formulario', compact('equipamentos'));

    }

    public function store(Request $request,Saidaequimapento $saidaequimapento){


        $saidaequimapento = new Saidaequimapento();
        $saidaequimapento->fill($request->all());
        if ($saidaequimapento->save()) {
            $tipo = 'mensagem_sucesso';
            $msg = 'Equipamento Excluido !';
        } else {
            $tipo = 'Mensagem erro!';
            $msg = 'Deu erro!';

        }
        return Redirect::to('/saidaequipamento')->with($tipo,$msg);
    }

    public function update(Request $request, $saidaequimapento_id){
        $saidaequimapento = Saidaequimapento::findOrFail($saidaequimapento_id);
        $saidaequimapento->fill($request->all());
        if ($saidaequimapento->save()){;
            $request->session()->flash('mensagem_sucesso',"Saidaequimapento alterado!");
        }else{
            $request->session()->flash('mensagem_erro',"Deu erro!");
        }
        return Redirect::to('saidaequipamento/'.$saidaequimapento->id);
    }

    public function show($id){
        $saidaequimapento = Saidaequimapento::findOrFail($id);
        return view('saidaequipamento.formulario', compact('saidaequimapento'));

    }

    public function destroy(Request $request, $saidaequimapento_id){
        $saidaequimapento = Saidaequimapento::findOrFail($saidaequimapento_id);
        $saidaequimapento->delete();
        $request->session()->flash('mensagem_sucesso',
            'Saidaequimapento removido com sucesso');
        return Redirect::to('saidaequipamento');

    }

}
