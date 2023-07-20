<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Insumo;
use Barryvdh\DomPDF\Facade\Pdf;
use Dotenv\Validator;
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



public function store(Request $request, Equipamento $equipamento)
{
    $validator = Validator::make($request->all(), [
        'quantidade' => 'required|numeric|min:0',
    ]);

    if ($validator->fails()) {
        return Redirect::to('/equipamento')
                    ->withErrors($validator)
                    ->withInput();
    }

    $equipamento = new Equipamento();
    $equipamento->fill($request->all());
    if ($equipamento->save()) {
        $tipo = 'mensagem_sucesso';
        $msg = 'Equipamento Excluido !';
    } else {
        $tipo = 'Mensagem erro!';
        $msg = 'Deu erro!';
    }
    return Redirect::to('/equipamento')->with($tipo, $msg);
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

    public function showReport(Request $request)
    {

        // Recupera os parâmetros de pesquisa do DataTables
        $search = $request->input('search.value');

        // Filtra os equipamentos no banco de dados com base nos parâmetros de pesquisa do DataTables
        $equipamentos = Equipamento::where('nome', 'like', "%{$search}%")->get();

        // Define o caminho para a imagem
        //$imagem = public_path('uploads/equipamentos/abdner.png');

        // Codifica a imagem em base64
      //  $data = file_get_contents($imagem);
       // $base64 = base64_encode($data);
        //$logo = 'data:image/png;base64,' . $base64;

        // Gera o relatório em PDF com os equipamentos filtrados e a imagem codificada em base64
        $pdf = PDF::loadView('reports.equipamentos', compact('equipamentos'));

        // Define as opções do PDF
        $pdf->setPaper('a4', 'landscape')
            ->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])
            ->setEncryption('123');

        // Retorna o PDF gerado para o usuário
        return $pdf->stream('relatorio.pdf');
    }

}
