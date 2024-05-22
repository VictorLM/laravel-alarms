@extends('layouts.app')

@section('content')
    <div class="p-3 w-100">
        <div class="d-flex justify-content-between">
            <h2 class="fw-normal">
                Alarmes
            </h2>

            <a href="/alarms/create">
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

            @if (count($alarms) === 0)
                Nenhum Alarme cadastrado!
            @else
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Classificação</th>
                            <th scope="col">Status</th>
                            <th scope="col">Equipamento</th>
                            <th scope="col">Data do cadastro</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alarms as $alarm)
                            <tr>
                                <td>{{ $alarm->name }}</td>
                                <td>{{ $alarm->description }}</td>
                                <td>
                                    @if ($alarm->classification === 'urgent')
                                        Urgente
                                    @elseif($alarm->classification === 'emergent')
                                        Emergente
                                    @elseif($alarm->classification === 'ordinary')
                                        Ordinário
                                    @else
                                        Desconhecido
                                    @endif
                                </td>
                                <td>
                                    @if (is_null($alarm->deactivated_at))
                                        <span class="badge rounded-pill text-bg-success">Ativado</span>
                                    @elseif (!is_null($alarm->deactivated_at))
                                        <span class="badge rounded-pill text-bg-danger">Desativado</span>
                                    @else
                                        <span class="badge rounded-pill text-bg-secondary">Desconhecido</span>
                                    @endif
                                </td>
                                <td>{{ $alarm->equipment->name }}</td>
                                <td>{{ $alarm->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('alarms.edit', $alarm) }}">
                                        <button type="button" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ route('alarms.destroy', $alarm) }}"
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
