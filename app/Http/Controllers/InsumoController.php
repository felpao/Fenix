<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\Insumos;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class InsumoController extends Controller
{

    public function index(){
        $insumos = Insumo::paginate(25);
        Paginator::useBootstrap();
        return view('insumo.lista', compact('insumos'));
    }


    public function create(){
        return view('insumo.formulario');

    }

    public function store(Request $request,Insumo $insumo){


        $insumo = new Insumo();
        $insumo->fill($request->all());
        if ($insumo->save()) {
            $tipo = 'mensagem_sucesso';
            $msg = 'Equipamento Excluido !';
        } else {
            $tipo = 'Mensagem erro!';
            $msg = 'Deu erro!';

        }
        return Redirect::to('/insumo')->with($tipo,$msg);
    }

    public function update(Request $request, $insumo_id){
        $insumo = Insumo::findOrFail($insumo_id);
        $insumo->fill($request->all());
        if ($insumo->save()){;
            $request->session()->flash('mensagem_sucesso',"Insumo alterado!");
        }else{
            $request->session()->flash('mensagem_erro',"Deu erro!");
        }
        return Redirect::to('insumo/'.$insumo->id);
    }

    public function show($id){
        $insumo = Insumo::findOrFail($id);
        return view('insumo.formulario', compact('insumo'));

    }

    public function destroy(Request $request, $insumo_id){
        $insumo = Insumo::findOrFail($insumo_id);
        $insumo->delete();
        $request->session()->flash('mensagem_sucesso',
            'Insumo removido com sucesso');
        return Redirect::to('insumo');

    }

}
