<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class SetorController extends Controller
{

    public function index(){
        $setores = Setor::paginate(25);
        Paginator::useBootstrap();
        return view('setor.lista', compact('setores'));
    }


    public function create(){
        return view('setor.formulario');

    }

    public function store(Request $request,Setor $setor){


        $setor = new Setor();
        $setor->fill($request->all());
        if ($setor->save()) {
            $tipo = 'mensagem_sucesso';
            $msg = 'Equipamento Excluido !';
        } else {
            $tipo = 'Mensagem erro!';
            $msg = 'Deu erro!';

        }
        return Redirect::to('/setor')->with($tipo,$msg);
    }

    public function update(Request $request, $setor_id){
        $setor = Setor::findOrFail($setor_id);
        $setor->fill($request->all());
        if ($setor->save()){;
            $request->session()->flash('mensagem_sucesso',"Setor alterado!");
        }else{
            $request->session()->flash('mensagem_erro',"Deu erro!");
        }
        return Redirect::to('setor/'.$setor->id);
    }

    public function show($id){
        $setor = Setor::findOrFail($id);
        return view('setor.formulario', compact('setor'));

    }

    public function destroy(Request $request, $setor_id){
        $setor = Setor::findOrFail($setor_id);
        $setor->delete();
        $request->session()->flash('mensagem_sucesso',
            'Setor removido com sucesso');
        return Redirect::to('setor');

    }

}
