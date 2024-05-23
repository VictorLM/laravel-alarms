@extends('layouts.app')

@section('content')
    <div class="p-3 w-100">
        <h2 class="fw-normal">
            Novo Equipamento
        </h2>

        <hr />

        <div class="p-4 rounded bg-light">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('equipments.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp"
                        value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="serial_number" class="form-label">Número de série</label>
                    <input type="text" class="form-control" id="serial_number" name="serial_number"
                        value="{{ old('serial_number') }}" required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <select class="form-select" id="type" name="type" required>
                        <option {{ old('type') === '' ? 'selected' : '' }}>Selecione uma opção</option>
                        <option value="voltage" {{ old('type') === 'voltage' ? 'selected' : '' }}>Tensão</option>
                        <option value="current" {{ old('type') === 'current' ? 'selected' : '' }}>Corrente</option>
                        <option value="oil" {{ old('type') === 'oil' ? 'selected' : '' }}>Óleo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success mt-2">Salvar</button>
            </form>

        </div>

    </div>
@endsection
