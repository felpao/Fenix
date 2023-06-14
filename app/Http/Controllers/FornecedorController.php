<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class FornecedorController extends Controller
{

    public function index(){
        $fornecedores = Fornecedor::paginate(25);
        Paginator::useBootstrap();
        return view('fornecedor.lista', compact('fornecedores'));
    }


    public function create(){
        return view('fornecedor.formulario');

    }

    public function store(Request $request,Fornecedor $fornecedor){


        $fornecedor = new Fornecedor();
        $fornecedor->fill($request->all());
        if ($fornecedor->save()) {
            $tipo = 'mensagem_sucesso';
            $msg = 'Equipamento Excluido !';
        } else {
            $tipo = 'Mensagem erro!';
            $msg = 'Deu erro!';

        }
        return Redirect::to('/fornecedor')->with($tipo,$msg);
    }

    public function update(Request $request, $fornecedor_id){
        $fornecedor = Fornecedor::findOrFail($fornecedor_id);
        $fornecedor->fill($request->all());
        if ($fornecedor->save()){;
            $request->session()->flash('mensagem_sucesso',"Fornecedor alterado!");
        }else{
            $request->session()->flash('mensagem_erro',"Deu erro!");
        }
        return Redirect::to('fornecedor/'.$fornecedor->id);
    }

    public function show($id){
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedor.formulario', compact('fornecedor'));

    }

    public function destroy(Request $request, $fornecedor_id){
        $fornecedor = Fornecedor::findOrFail($fornecedor_id);
        $fornecedor->delete();
        $request->session()->flash('mensagem_sucesso',
            'Fornecedor removido com sucesso');
        return Redirect::to('fornecedor');

    }

    public function showReport(){
        $fornecedores = Fornecedor::get();
        $imagem = public_path('uploads\fornecedores');
        $fornecedor = pathinfo($imagem, PATHINFO_EXTENSION);
        $data = file_get_contents($imagem);
        $base64 = base64_encode($imagem);
        $logo = 'data:image/' . $fornecedor . ';base64' . $base64;

        //$logo = base64_encode(file_get_contents(public_path('/uploads/fornecedores/wp8357470.jpg')));
        $pdf = Pdf::loadView('reports.fornecedores', compact('fornecedores', 'logo'));

        $pdf->setPaper('a4', 'landscape')
        ->setOptions(['dpi'=>150, 'defaultFont'=>'sans-serif'])
        ->setEncryption('123');


        return $pdf
        ->download('relatorio.pdf');
        //->save(public_path('/arquivos/relatorio.pdf'));
        //->stream('relatorio.pdf');
    }

}
