<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{

    public function index(){
        $usuarios = Usuario::paginate(25);
        Paginator::useBootstrap();
        return view('usuario.lista', compact('usuarios'));
    }


    public function create(){
        return view('usuario.formulario');

    }

    public function store(Request $request,Usuario $usuario){


        $usuario = new Usuario();
        $usuario->fill($request->all());
        if ($usuario->save()) {
            $tipo = 'mensagem_sucesso';
            $msg = 'Equipamento Excluido !';
        } else {
            $tipo = 'Mensagem erro!';
            $msg = 'Deu erro!';

        }
        return Redirect::to('/usuario')->with($tipo,$msg);
    }

    public function update(Request $request, $usuario_id){
        $usuario = Usuario::findOrFail($usuario_id);
        $usuario->fill($request->all());
        if ($usuario->save()){;
            $request->session()->flash('mensagem_sucesso',"Usuario alterado!");
        }else{
            $request->session()->flash('mensagem_erro',"Deu erro!");
        }
        return Redirect::to('usuario/');
    }

    public function show($id){
        $usuario = Usuario::findOrFail($id);
        return view('usuario.formulario', compact('usuario'));

    }

    public function destroy(Request $request, $usuario_id){
        $usuario = Usuario::findOrFail($usuario_id);
        $usuario->delete();
        $request->session()->flash('mensagem_sucesso',
            'Usuario removido com sucesso');
        return Redirect::to('usuario');

    }

}
