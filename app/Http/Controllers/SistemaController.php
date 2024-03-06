<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva_cliente;
use App\Models\Convidados;


class SistemaController extends Controller
{
    public function reserva_form(Request $request   )
    {
        $s = new Reserva_cliente;
        $s->nome_local = $request->get('nome_local');
        $s->local = $request->get('local');
        $s->nome_reserva = $request->get('nome_reserva');
        $s->dia_hora = $request->get('dia_hora');
        $s->save();

    return view('welcome');
    }

    public function cadastrar_convite(Request $request){
        
        $n = new Convidados;
        $n->nome = $request->get('nome');
        $n->sobrenome = $request->get('sobrenome');
        $n->idade = $request->get('idade');
        $n->reserva = $request->get('reserva');
        $n->presenca = $request->get('presenca');
        $n->save();

    return view('convite_enviado');
    }

    public function presente($id,$reserva){
        
        Convidados::where('id',$id)->update(['presenca' => "1"]);
       
        return redirect()->route('lista.convidados',[$reserva]);    
    }

    public function ausente($id,$reserva){
        
        Convidados::where('id',$id)->update(['presenca' => "2"]);
       
        return redirect()->route('lista.convidados',[$reserva]);    
    }

    public function apagar_reserva($id){
        
        Reserva_cliente::where('id',$id)->delete();
       
        return view('dashboard');
    }

}
