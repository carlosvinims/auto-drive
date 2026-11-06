<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Veiculo;


class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $veiculos = Veiculo::with('marca')
        ->when($request->filled('busca'), function ($query) use ($request) {
            $query->where('modelo', 'like', "%{$request->busca}%");
            })
            ->when($request->filled('marca_id'), function ($query) use ($request) {
                $query->where('marca_id', $request->marca_id);
                })
                ->paginate(10)
                ->withQueryString();

                $marcas = Marca::all();

                return view('veiculos.index', compact('veiculos', 'marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::all();

        return view('veiculos.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate([
            'marcar_id' => 'required|integer|exists:marcas,id',
            'modelo' => 'required|string|min:2',
            'ano' => 'required|integer|min:1990',
            'preco' => 'required|min:1.000',
            'status' => 'required|string|in:disponivel,reservado,vendido',
        ]);

        Veiculo::create($dados);

        return redirect()->route('veiculos.index')->with('success', 'Veiculo criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Veiculo $veiculo)
    {
        $marca = Marca::orderBy('name')->get();

        return view('veiculos.edit', compact('veiculo', 'marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        $dados = $request->protected();

        $veiculo->update($dados);

        return redirect()->route('veiculos.index')->with('success', 'Veiculo atualizado com sucess');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();

        return redirect()->route('veiculos.index')->with('success', 'Veiculo excluido com sucess.');
    }
}
