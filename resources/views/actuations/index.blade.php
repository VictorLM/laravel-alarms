@extends('layouts.app')

@section('content')
    <div class="p-3 w-100">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-normal">
                Atuações dos Alarmes
            </h2>

            <!-- Button trigger top 3 Alarms modal -->
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#topAlarmsModal"
                style="height: fit-content;">
                Top 3 Alarmes
            </button>
        </div>

        <hr />

        <div class="p-4 rounded bg-light">
            <form method="GET" action="/actuations">
                <div class="row mb-2">
                    <div class="col-5">
                        <label for="order_by" class="form-label">Ordenar</label>
                        <select class="form-select" id="order_by" name="order_by">
                            <option {{ is_null($order_by) || $order_by === '' ? 'selected' : '' }} value="">
                                Selecione
                                uma opção
                            </option>
                            <option value="alarm_name_asc" {{ $order_by === 'alarm_name_asc' ? 'selected' : '' }}>Nome
                                do
                                Alarme A-Z</option>
                            <option value="alarm_name_desc" {{ $order_by === 'alarm_name_desc' ? 'selected' : '' }}>Nome
                                do
                                Alarme Z-A</option>
                            <option value="equipment_name_asc" {{ $order_by === 'equipment_name_asc' ? 'selected' : '' }}>
                                Nome do Equipamento A-Z</option>
                            <option value="equipment_name_desc" {{ $order_by === 'equipment_name_desc' ? 'selected' : '' }}>
                                Nome do Equipamento Z-A</option>
                            <option value="actuation_start_desc"
                                {{ $order_by === 'actuation_start_desc' ? 'selected' : '' }}>Início da Atuação (mais
                                novos)
                            </option>
                            <option value="actuation_start_asc" {{ $order_by === 'actuation_start_asc' ? 'selected' : '' }}>
                                Início da Atuação (mais antigos)</option>
                            <option value="actuation_end_desc" {{ $order_by === 'actuation_end_desc' ? 'selected' : '' }}>
                                Fim da Atuação (mais novos)</option>
                            <option value="actuation_end_asc" {{ $order_by === 'actuation_end_asc' ? 'selected' : '' }}>Fim
                                da Atuação (mais antigos)</option>
                        </select>
                    </div>
                    <div class="col-5">
                        <label for="search_text" class="form-label">Pesquisar</label>
                        <input type="text" class="form-control" value="{{ $search_text }}" id="search_text"
                            name="search_text" placeholder="Procure pelo Nome ou Descrição do Alarme">
                    </div>
                    <div class="col-2">
                        <span class="d-block mb-2">&nbsp;</span>
                        <button type="submit" class="btn w-100 btn-primary">Filtrar</button>
                    </div>
                </div>
            </form>

            <hr />

            @if (count($actuations) === 0)
                Nenhuma Atuação registrada!
            @else
                <table class="table table-sm table-light">
                    <thead>
                        <tr>
                            <th scope="col">Alarme</th>
                            <th scope="col">Status do Alarme</th>
                            <th scope="col">Equipamento</th>
                            <th scope="col">Início</th>
                            <th scope="col">Fim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($actuations as $actuation)
                            <tr>
                                <td><u>{{ $actuation->alarm->name }}</u> <br> {{ $actuation->alarm->description }}
                                </td>

                                <td>
                                    @if (is_null($actuation->alarm->deactivated_at))
                                        <span class="badge rounded-pill text-bg-success">Ativado</span>
                                    @elseif (!is_null($actuation->alarm->deactivated_at))
                                        <span class="badge rounded-pill text-bg-danger">Desativado</span>
                                    @else
                                        <span class="badge rounded-pill text-bg-secondary">Desconhecido</span>
                                    @endif
                                </td>

                                <td><u>{{ $actuation->alarm->equipment->name }}</u> <br>
                                    {{ $actuation->alarm->equipment->description }}</td>

                                <td>{{ Carbon\Carbon::parse($actuation->start)->format('d/m/Y H:i') }}</td>
                                <td>{{ Carbon\Carbon::parse($actuation->end)->format('d/m/Y H:i') }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>

    </div>

    <!-- Top 3 Alarms - Modal -->
    <div class="modal fade" id="topAlarmsModal" tabindex="-1" aria-labelledby="topAlarmsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="topAlarmsModalLabel">Top 3 Alarmes que mais atuaram</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (count($mostTriggeredAlarms) === 0)
                        Nenhuma Atuação registrada!
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Equipamento</th>
                                    <th scope="col">Atuações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mostTriggeredAlarms as $mostTriggeredAlarm)
                                    <tr>
                                        <td>{{ $mostTriggeredAlarm->name }}</td>
                                        <td>{{ $mostTriggeredAlarm->description }}</td>
                                        <td>{{ $mostTriggeredAlarm->equipment->name }}</td>
                                        <td>{{ $mostTriggeredAlarm->actuations_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


@endsection
