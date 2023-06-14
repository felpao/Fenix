<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatosController extends Controller
{
    public function index(){
        return view('public_view.contato');
    }

    public function enviar(Request $request){
        $dest_nome = "Felipe";
        $dest_email = "felipeevanzella@gmail.com";
        $dados = array('name'=>$request['nome'],
                       'email'=>$request['email'],
                       'fone'=>$request['fone'],
                       'mensagem'=>$request['mensagem']);
        Mail::send('email.contato', $dados,
        function($mensagem) use($dest_nome, $dest_email, $request){
            $mensagem->to($dest_email, $dest_nome)
            ->subject('E-mail do site da Famper!')
            ->bcc(['seuemail@gmail.com', 'outroemail@gmail.com']);
            $mensagem->from($request['email'], $request['nome']);
        }
    );
    }
}
