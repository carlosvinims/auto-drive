@extends('layouts.app')

@section('content')
<div class="card col-md-8 mx-auto">
    <div class="card-header fw-bold">Editar Marca</div>
    <div class="card-body">
        <form action="{{ route('marcas.update', $marca->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome"
                    class="form-control @error('nome') is-invalid @enderror"
                    value="{{ old('nome', $marca->nome) }}" required>
                @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-success">Atualizar Marca</button>
            <a href="{{ route('marcas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection 