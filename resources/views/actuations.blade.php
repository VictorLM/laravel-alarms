@extends('layouts.app')

@section('content')
    <div class="p-3 w-100">
        <h2 class="fw-normal">
            Atuações dos Alarmes
        </h2>

        <hr />

        <div class="p-4 rounded bg-light">

            @if (count($actuations) === 0)
                Nenhum Atuação registrada!
            @else
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col">Alarme</th>
                            <th scope="col">Descrição do Alarme</th>
                            <th scope="col">Status do Alarme</th>
                            <th scope="col">Equipamento</th>
                            <th scope="col">Descrição do Equipamento</th>
                            <th scope="col">Início</th>
                            <th scope="col">Fim</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($equipments as $actuations)
                            <tr>
                                <td>{{ $actuations->name }}</td>
                                <td>{{ $actuations->description }}</td>
                                <td>{{ $actuations->serial_number }}</td>
                                <td>
                                    @if ($actuations->type === 'voltage')
                                        Tensão
                                    @elseif($actuations->type === 'current')
                                        Corrente
                                    @elseif($actuations->type === 'oil')
                                        Óleo
                                    @else
                                        Desconhecido
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('actuationss.edit', $actuations) }}">
                                        <button type="button" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ route('actuationss.destroy', $actuations) }}"
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
                    </tbody> --}}
                </table>
            @endif

        </div>

    </div>
@endsection
