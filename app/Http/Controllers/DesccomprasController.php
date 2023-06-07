<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Desccompra;
use App\Models\Desccompras;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class DesccomprasController extends Controller
{

    public function index(){
        $desccompras = Desccompras::paginate(25);
        Paginator::useBootstrap();
        return view('desccompras.lista', compact('desccompras'));
    }


    public function create(){

        $compra = Compras::get();

        return view('desccompras.formulario', compact('compra'));

    }

    public function store(Request $request,Desccompras $desccompra){


        $desccompra = new Desccompras();
        $desccompra->fill($request->all());
        if ($desccompra->save()) {
            $tipo = 'mensagem_sucesso';
            $msg = 'Equipamento Excluido !';
        } else {
            $tipo = 'Mensagem erro!';
            $msg = 'Deu erro!';

        }
        return Redirect::to('/desccompra')->with($tipo,$msg);
    }

    public function update(Request $request, $desccompra_id){
        $desccompra = Desccompras::findOrFail($desccompra_id);
        $desccompra->fill($request->all());
        if ($desccompra->save()){;
            $request->session()->flash('mensagem_sucesso',"Desccompra alterado!");
        }else{
            $request->session()->flash('mensagem_erro',"Deu erro!");
        }
        return Redirect::to('desccompra/'.$desccompra->id);
    }

    public function show($id){
        $desccompra = Desccompras::findOrFail($id);
        return view('desccompra.formulario', compact('desccompra'));

    }

    public function destroy(Request $request, $desccompra_id){
        $desccompra = Desccompras::findOrFail($desccompra_id);
        $desccompra->delete();
        $request->session()->flash('mensagem_sucesso',
            'Desccompra removido com sucesso');
        return Redirect::to('desccompra');

    }

}
