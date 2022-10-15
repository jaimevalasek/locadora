<x-layout>
    <x-alert />
    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-1 text-center bg-light">
        <h4>Log do histórico do veículo / locadora</h4>
    </div>
    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-1 text-center bg-light">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Locadora</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Montadora</th>
                    <th scope="col">Veículo</th>
                    <th scope="col">Data de início</th>
                    <th scope="col">Data de fim</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($logs as $log)
                    <tr>
                        <th scope="row">{{ $log->id }}</th>
                        <td>{{ $log->locadora }}</td>
                        <td>{{ $log->modelo }}</td>
                        <td>{{ $log->montadora }}</td>
                        <td>{{ $log->placa }} {{ $log->cor }} {{ $log->ano_modelo }}</td>
                        <td><x-carbon data="{{ $log->data_inicio }}" format="d/m/Y H:i" isoFormat="lll"/></td>
                        <td><x-carbon data="{{ $log->data_fim }}" format="d/m/Y H:i" tipo="diffForHumans"/></td>                        
                    </tr>                    
                @empty
                    <tr>
                        <th colspan="11">Nenhum registro!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">{{ $logs->links('pagination::bootstrap-5') }}</div>

    </div>
</x-layout>
