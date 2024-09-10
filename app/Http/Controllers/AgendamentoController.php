<?php
// app/Http/Controllers/AgendamentoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use Illuminate\Support\Facades\Auth;

class AgendamentoController extends Controller
{
    public function dashboard(Request $req)
    {
        // Filtra os agendamentos pelo cliente logado
        $query = Agendamento::where('cliente_id', Auth::id())->with('cliente');

        // Verifica se a data foi fornecida na busca
        if ($req->has('search_date') && !empty($req->search_date)) {
            $query->whereDate('data', $req->search_date);
        }

        $agendamentos = $query->get();
        return view('dashboard', compact('agendamentos'));
    }


    


    public function adicionarA(Request $req)
    {
        $agendamento = new Agendamento;
        $agendamento->data = $req->data;
        $agendamento->horario = $req->horario;
        $agendamento->cliente_id = Auth::id(); // Obtém o ID do cliente logado

        $agendamento->save();
        return redirect()->back();
    }

    public function editarA($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        return view('editar', compact('agendamento'));
    }
    
    public function atualizarA(Request $req, $id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->data = $req->data;
        $agendamento->horario = $req->horario;
        $agendamento->save();

        return redirect()->route('dashboard');
    }
    
    public function excluirA($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();

        return redirect()->back()->with('success', 'Agendamento excluído com sucesso!');
    }
}
