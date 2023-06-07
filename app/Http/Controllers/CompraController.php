<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Compras;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class CompraController extends Controller
{

    public function index(){
        $compras = Compras::paginate(25);
        Paginator::useBootstrap();
        return view('compra.lista', compact('compras'));
    }


    public function create(){
        return view('compra.formulario');

    }

    public function store(Request $request,Compras $compra){


        $compra = new Compras();
        $compra->fill($request->all());
        if ($compra->save()) {
            $tipo = 'mensagem_sucesso';
            $msg = 'Equipamento Excluido !';
        } else {
            $tipo = 'Mensagem erro!';
            $msg = 'Deu erro!';

        }
        return Redirect::to('/compra')->with($tipo,$msg);
    }

    public function update(Request $request, $compra_id){
        $compra = Compras::findOrFail($compra_id);
        $compra->fill($request->all());
        if ($compra->save()){;
            $request->session()->flash('mensagem_sucesso',"Compra alterado!");
        }else{
            $request->session()->flash('mensagem_erro',"Deu erro!");
        }
        return Redirect::to('compra/'.$compra->id);
    }

    public function show($id){
        $compra = Compras::findOrFail($id);
        return view('compra.formulario', compact('compra'));

    }

    public function destroy(Request $request, $compra_id){
        $compra = Compras::findOrFail($compra_id);
        $compra->delete();
        $request->session()->flash('mensagem_sucesso',
            'Compra removido com sucesso');
        return Redirect::to('compra');

    }

}
