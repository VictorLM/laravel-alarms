@extends('layouts.app')

@section('content')
    <div class="p-3 w-100">
        <div class="d-flex justify-content-between">
            <h2 class="fw-normal">
                Equipamentos
            </h2>

            <a href="/equipments/create">
                <button type="button" class="btn btn-primary mt-2">+ Novo</button>
            </a>

        </div>

        <hr />

        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif

        <div class="p-4 rounded bg-light">

            @if (count($equipments) === 0)
                Nenhum Equipamento cadastrado!
            @else
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Nº de Série</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Data do cadastro</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipments as $equipment)
                            <tr>
                                <td>{{ $equipment->name }}</td>
                                <td>{{ $equipment->description }}</td>
                                <td>{{ $equipment->serial_number }}</td>
                                <td>
                                    @if ($equipment->type === 'voltage')
                                        Tensão
                                    @elseif($equipment->type === 'current')
                                        Corrente
                                    @elseif($equipment->type === 'oil')
                                        Óleo
                                    @else
                                        Desconhecido
                                    @endif
                                </td>
                                <td>{{ $equipment->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('equipments.edit', $equipment) }}">
                                        <button type="button" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ route('equipments.destroy', $equipment) }}"
                                        class="d-inline ms-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>

    </div>
@endsection
