<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AgendamentoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AgendamentoController::class, 'dashboard'])->name('dashboard');
    Route::post('/adicionarA', [AgendamentoController::class, 'adicionarA']);
    Route::get('/editarA/{id}', [AgendamentoController::class, 'editarA'])->name('editarA');
    Route::post('/atualizarA/{id}', [AgendamentoController::class, 'atualizarA'])->name('atualizarA');
    Route::delete('/excluirA/{id}', [AgendamentoController::class, 'excluirA']);
    Route::get('/agendamentos.index', [AgendamentoController::class, 'index'])->name('agendamentos.index');

});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
