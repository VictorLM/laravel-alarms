@extends('layouts.app')

@section('content')
    <div class="p-3 w-100">
        <h2 class="fw-normal">
            Editar Alarme
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

            <form method="POST" action="{{ route('alarms.update', $alarm) }}">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name"
                                aria-describedby="nameHelp" value="{{ old('name', $alarm->name) }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="type" class="form-label">Status</label>
                            <select class="form-select" id="active" name="active" required>
                                <option value="1" {{ is_null($alarm->deactivated_at) ? 'selected' : '' }}>
                                    Ativado
                                </option>
                                <option value="0" {{ !is_null($alarm->deactivated_at) ? 'selected' : '' }}>
                                    Desativado
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $alarm->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Classificação</label>
                    <select class="form-select" id="classification" name="classification" required>
                        <option>Selecione uma opção</option>
                        <option value="urgent"
                            {{ old('classification', $alarm->classification) === 'urgent' ? 'selected' : '' }}>Urgente
                        </option>
                        <option value="emergent"
                            {{ old('classification', $alarm->classification) === 'emergent' ? 'selected' : '' }}>Emergente
                        </option>
                        <option value="ordinary"
                            {{ old('classification', $alarm->classification) === 'ordinary' ? 'selected' : '' }}>Ordinário
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">
                        Equipamento
                        <span class="small fst-italic text-muted">(Não é possivél editar essa informação para manter o
                            histórico do Alarme)</small>
                    </label>
                    <select class="form-select" id="equipment_id" name="equipment_id" disabled>
                        <option value={{ $alarm->equipment->id }}>
                            {{ $alarm->equipment->name }}
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success mt-2">Atualizar</button>
            </form>

        </div>

    </div>
@endsection
