<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Insumo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class EquipamentoController extends Controller
{

    public function index(){
        $equipamentos = Equipamento::paginate(25);
        Paginator::useBootstrap();
        return view('equipamento.lista', compact('equipamentos'));
    }


    public function create(){


        return view('equipamento.formulario');

    }

    public function store(Request $request,Equipamento $equipamento){


        $equipamento = new Equipamento();
        $equipamento->fill($request->all());
        if ($equipamento->save()) {
            $tipo = 'mensagem_sucesso';
            $msg = 'Equipamento Excluido !';
        } else {
            $tipo = 'Mensagem erro!';
            $msg = 'Deu erro!';

        }
        return Redirect::to('/equipamento')->with($tipo,$msg);
    }

    public function update(Request $request, $equipamento_id){
        $equipamento = Equipamento::findOrFail($equipamento_id);
        $equipamento->fill($request->all());
        if ($equipamento->save()){;
            $request->session()->flash('mensagem_sucesso',"Equipamento alterado!");
        }else{
            $request->session()->flash('mensagem_erro',"Deu erro!");
        }
        return Redirect::to('equipamento/'.$equipamento->id);
    }

    public function show($id){
        $equipamento = Equipamento::findOrFail($id);
        return view('equipamento.formulario', compact('equipamento'));

    }

    public function destroy(Request $request, $equipamento_id){
        $equipamento = Equipamento::findOrFail($equipamento_id);
        $equipamento->delete();
        $request->session()->flash('mensagem_sucesso',
            'Equipamento removido com sucesso');
        return Redirect::to('equipamento');

    }

    public function showReport(){
        $equipamentos = Equipamento::get();
        $imagem = public_path('uploads\equipamentos\abdner.png');
        $equipamento = pathinfo($imagem, PATHINFO_EXTENSION);
        $data = file_get_contents($imagem);
        $base64 = base64_encode($imagem);
        $logo = 'data:image/' . $equipamentos . ';base64' . $base64;

        //$logo = base64_encode(file_get_contents(public_path('/uploads/compras/wp8357470.jpg')));
        $pdf = Pdf::loadView('reports.equipamentos', compact('equipamentos', 'logo'));

        $pdf->setPaper('a4', 'landscape')
        ->setOptions(['dpi'=>150, 'defaultFont'=>'sans-serif'])
        ->setEncryption('123');


        return $pdf
        ->download('relatorio.pdf');
        //->save(public_path('/arquivos/relatorio.pdf'));
        //->stream('relatorio.pdf');
    }

}
