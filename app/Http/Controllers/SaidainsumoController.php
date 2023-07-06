<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Models\Saidainsumos;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class SaidainsumoController extends Controller
{

    public function index(){
        $saidainsumos = Saidainsumos::with('insumo')->paginate(25);


        Paginator::useBootstrap();
        return view('saidainsumo.lista', compact('saidainsumos'));
    }


    public function create(){

        $insumos = Insumo::select('nome', 'id')->pluck('nome', 'id');;


        return view('saidainsumo.formulario',compact('insumos'));

    }

    public function store(Request $request,Saidainsumos $saidainsumo){


        $saidainsumo = new Saidainsumos();
        $saidainsumo->fill($request->all());
        if ($saidainsumo->save()) {
            //aqui salvou certo

            $insumo = Insumo::where('id','=',$request['insumo_id'])->first();

            if($insumo->quantidade != 0){

                $quantidade = $insumo->quantidade - $request['quantidade'];

                $insumo->update(['quantidade' => $quantidade]);
            }

            $tipo = 'mensagem_sucesso';
            $msg = 'Equipamento Excluido !';
        } else {
            $tipo = 'Mensagem erro!';
            $msg = 'Deu erro!';

        }
        return Redirect::to('/saidaequipamento')->with($tipo,$msg);
    }

    public function update(Request $request, $saidainsumo_id){

        $saidainsumo = Saidainsumos::findOrFail($saidainsumo_id);
        $saidainsumo->fill($request->all());
        if ($saidainsumo->save()){
            $request->session()->flash('mensagem_sucesso',"Saidainsumo alterado!");
        }else{
            $request->session()->flash('mensagem_erro',"Deu erro!");
        }
        return Redirect::to('saidainsumo/');
    }


    public function updateSaidaInsumo(Request $request){


        $saidainsumo = Saidainsumos::findOrFail($saidainsumo_id);
        $saidainsumo->fill($request->all());
        if ($saidainsumo->save()){
            $request->session()->flash('mensagem_sucesso',"Saidainsumo alterado!");
        }else{
            $request->session()->flash('mensagem_erro',"Deu erro!");
        }
        return Redirect::to('saidainsumo/'.$saidainsumo->id);
    }

    public function show($id){
        $insumos = Insumo::select('nome', 'id')->pluck('nome', 'id');
        $saidainsumo = Saidainsumos::with('insumo')->findOrFail($id);

        return view('saidainsumo.formulario', compact('saidainsumo','insumos'));

    }

    public function destroy(Request $request, $saidainsumo_id){
        $saidainsumo = Saidainsumos::findOrFail($saidainsumo_id);
        $saidainsumo->delete();
        $request->session()->flash('mensagem_sucesso',
            'Saidainsumo removido com sucesso');
        return Redirect::to('saidainsumo');

    }

}
