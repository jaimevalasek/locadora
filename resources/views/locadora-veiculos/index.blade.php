<x-layout>
    <x-alert />
    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-1 text-center bg-light">
        <form action="{{ route('relatorio.locadora-veiculos') }}">
            <div class="row">
                <div class="col-3">
                    <x:input.text name="locadora" id="locadora" placeholder="Locadora" value="{{ request()->locadora }}"/>
                </div>
                <div class="col-3">
                    <select name="modelo" class="form-control">
                        <option value="">Selecione a montadora</option>
                        @foreach ($modelos as $modelo)
                            <option value="{{ $modelo->id }}"
                                @if (request()->modelo == $modelo->id)
                                    @selected(true)
                                @endif>{{ $modelo->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <x:input.text name="data" id="data" placeholder="Data de criação" value="{{ request()->data }}"/>
                </div>
                <div class="col-1">
                    <x-button type="submit" name="Buscar" primary></x-button>
                </div>
            </div>
        </form>
    </div>
    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-1 text-center bg-light">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Locadora</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Data de Criacao</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($locadoraVeiculos as $locadoraVeiculo)
                    <tr>
                        <td>{{ $locadoraVeiculo->nome_fantasia }}</td>
                        <td>{{ $locadoraVeiculo->montadora }} &rsaquo; {{ $locadoraVeiculo->nome }}</td>
                        <td>{{ $locadoraVeiculo->placa }}</td>
                        <td><x-carbon data="{{ $locadoraVeiculo->created_at }}"/></td>                        
                    </tr>                    
                @empty
                    <tr>
                        <th colspan="8">Nenhum registro!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">{{ $locadoraVeiculos->links('pagination::bootstrap-5') }}</div>

    </div>
</x-layout>
