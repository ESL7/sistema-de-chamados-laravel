<?php

namespace App\Http\Controllers;

use App\Models\Chamados;
use Illuminate\Http\Request;

class ChamadosController extends Controller
{
    public function chamados()
    {

        return view('user.chamados');
    }

    public function store(Request $request)
    {

        Chamados::create($request->all());

        return redirect()->route('ciama.chamados');
    }

    public function index()
    {
        $chamados = Chamados::latest()->paginate(2);

        return view('admin.dashboard', ['chamados' => $chamados]);
    }

    public function show($id)
    {
        $chamados = Chamados::find($id);

        return view('admin.show', ['chamados' => $chamados]);
    }

    public function update(Request $request)
    {

        $chamados = Chamados::find($request->id);

        $chamados->status = 'Finalizado';
        $chamados->prioridade = $request->prioridade;
        $chamados->categoria = $request->categoria;
        $chamados->tempo_chamado = $request->tempo_chamado;
        $chamados->save();

        return redirect()->route('ciama.dashboard');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $collum = $request->except('_token');

        if ($request->search) {

            $chamados = Chamados::where('descricao', 'LIKE', "%$request->search%")->paginate(2);
            return view('admin.dashboard', compact('chamados', 'filters', 'collum'));
        }

        if ($request->status == 'Pendente' || $request->status == 'Finalizado') {

            $chamados = Chamados::where('status', 'LIKE', "%$request->status%")->paginate(2);
            return view('admin.dashboard', compact('chamados', 'filters', 'collum'));
        }

        if ($request->setor == 'TI' || $request->setor == 'RH' || $request->setor == 'Engenharia') {

            $chamados = Chamados::where('setor', 'LIKE', "%$request->setor%")->paginate(2);
            return view('admin.dashboard', compact('chamados', 'filters', 'collum'));
        }

        if ($request->status == '' || $request->setor == '' || $request->search == '') {

            $chamados = Chamados::latest()->paginate(2);
            return view('admin.dashboard', compact('chamados'));
        }

        if ($request->status == 'Pendente' && $request->status == 'Finalizado') {

            $chamados = Chamados::where('status', 'LIKE', "%$request->status%")
                ->orWhere('setor', 'LIKE', "%$request->setor%")->paginate(2);

            return view('admin.dashboard', compact('chamados', 'filters', 'collum'));
        }
    }
}
