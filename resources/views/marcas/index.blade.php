@extends('layouts.app') @section('content') <div class="row mb-3">
    <div class="col-md-8">
        <h1 class="h3">Marcas registardas</h1>
    </div>
</div>
<div class="row g-3"> @forelse($marcas as $marca) <div class="col-md-2">
        <div class="card h-100 shadow-sm">
            <div class="card-body"> 
                <h3 class="text-center ">{{ $marca->nome }}</h3>
            </div>
            <div class="card-footer bg-white border-0 text-end"> <a href="{{ route('marcas.edit', $marca) }}"
                    class="btn btn-sm btn-outline-primary">Editar</a>
                <form action="{{ route('marcas.destroy', $marca) }}" method="POST" class="d-inline"> @csrf
                    @method('DELETE') <button class="btn btn-sm btn-outline-danger"
                        onclick="return confirm('Excluir Marca?')">Excluir</button> </form>
            </div>
        </div>
    </div> @empty <div class="col-12">
        <div class="alert alert-info">Nenhuma marca encontrada.</div>
    </div> @endforelse </div> @endsection