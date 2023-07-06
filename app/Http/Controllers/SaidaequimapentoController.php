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

        $saidaequimapentos = Saidaequimapento::with('equipamento')->paginate(25);
        Paginator::useBootstrap();


        return view('saidaequipamento.lista', compact('saidaequimapentos'));
    }


    public function create(){
        $equipamentos = Equipamento::select('nome', 'id')->pluck('nome', 'id');

        return view('saidaequipamento.formulario', compact('equipamentos'));

    }

    public function store(Request $request,Saidaequimapento $saidaequimapento){

        $saidaequimapento = new Saidaequimapento();
        $saidaequimapento->fill($request->all());
        if ($saidaequimapento->save()) {
            //aqui salvou certo

            $equipamento = Equipamento::where('id','=',$request['equipamento_id'])->first();

            if($equipamento->quantidade != 0){

                $quantidade = $equipamento->quantidade - $request['quantidade'];

                $equipamento->update(['quantidade' => $quantidade]);
            }

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
            //aqui salvou certo

            $request->session()->flash('mensagem_sucesso',"Saidaequimapento alterado!");
        }else{
            $request->session()->flash('mensagem_erro',"Deu erro!");
        }
        return Redirect::to('saidaequipamento/');
    }

    public function show($id){
        $equipamentos = Equipamento::select('nome', 'id')->pluck('nome', 'id');
        $saidaequimapento = Saidaequimapento::findOrFail($id);
        return view('saidaequipamento.formulario', compact('saidaequimapento','equipamentos'));

    }

    public function destroy(Request $request, $saidaequimapento_id){
        $saidaequimapento = Saidaequimapento::findOrFail($saidaequimapento_id);
        $saidaequimapento->delete();
        $request->session()->flash('mensagem_sucesso',
            'Saidaequimapento removido com sucesso');
        return Redirect::to('saidaequipamento');

    }

}
