<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaController;
use App\Models\Reserva_cliente;
use App\Models\Convidados;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $reserva_cliente = App\Models\Reserva_cliente::all();
    //dd($reserva_cliente);
    return view('dashboard');
});

Route::get('/convite/{id}', function ($id) {
    return view('convite', ['id' => $id]);
})->name('convite');

Route::get('/convite_enviado', function () {
    return view('convite_enviado');
})->name('convite.enviado');

Route::get('/lista_convidados/{id}', function ($id) {
    $lista_convidadados = App\Models\Convidados::all();
    $reserva_cliente = App\Models\Reserva_cliente::all();

    foreach($reserva_cliente as $reserva){
        $p = Convidados::where('reserva',$id)->get();
    }
  
    return view('lista_convidados', compact('lista_convidadados','p','reserva_cliente'));
})->name('lista.convidados');

Route::post('/reserva_form', [SistemaController::class, 'reserva_form']);
Route::post('/cadastrar_convite', [SistemaController::class, 'cadastrar_convite'])->name('cadastrar.convite');
Route::get('/presente/{id}/{reserva}', [SistemaController::class, 'presente'])->name('presente');
Route::get('/ausente/{id}/{reserva}', [SistemaController::class, 'ausente'])->name('ausente');
Route::get('/apagar_reserva/{id}', [SistemaController::class, 'apagar_reserva'])->name('apagar.reserva');