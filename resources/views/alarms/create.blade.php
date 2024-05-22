@extends('layouts.app')

@section('content')
    <div class="p-3 w-100">
        <h2 class="fw-normal">
            Novo Alarme
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

            <form method="POST" action="{{ route('alarms.store') }}">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name"
                                aria-describedby="nameHelp" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="type" class="form-label">Status</label>
                            <select class="form-select" id="active" name="active">
                                <option value="1" {{ old('active') !== null && old('active') == 1 ? 'selected' : '' }}>
                                    Ativado
                                </option>
                                <option value="0" {{ old('active') !== null && old('active') == 0 ? 'selected' : '' }}>
                                    Desativado
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Classificação</label>
                    <select class="form-select" id="classification" name="classification">
                        <option {{ old('classification') === '' ? 'selected' : '' }}>Selecione uma opção</option>
                        <option value="urgent" {{ old('classification') === 'urgent' ? 'selected' : '' }}>Urgente</option>
                        <option value="emergent" {{ old('classification') === 'emergent' ? 'selected' : '' }}>Emergente
                        </option>
                        <option value="ordinary" {{ old('classification') === 'ordinary' ? 'selected' : '' }}>Ordinário
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Equipamento</label>
                    <select class="form-select" id="equipment_id" name="equipment_id">
                        <option {{ old('equipment_id') === '' ? 'selected' : '' }}>Selecione uma opção</option>
                        @foreach ($equipments as $equipment)
                            <option value={{ $equipment->id }}
                                {{ old('equipment_id') === $equipment->id ? 'selected' : '' }}>{{ $equipment->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Salvar</button>
            </form>

        </div>

    </div>
@endsection
