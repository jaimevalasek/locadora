<x-layout>
    <x-alert />
    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-1 text-center bg-light">
        <form action="{{ route('relatorio.locadora-modelos') }}">
            <div class="row">
                <div class="col-3">
                    <x:input.text name="locadora" id="locadora" placeholder="Locadora" value="{{ request()->locadora }}"/>
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
                    <th scope="col">Total de veículos</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($locadoraModelos as $locadoraModelo)
                    <tr>
                        <td>{{ $locadoraModelo->nome_fantasia }}</td>
                        <td>{{ $locadoraModelo->montadora }} &rsaquo; {{ $locadoraModelo->nome }}</td>
                        <td>{{ $locadoraModelo->veiculos }}</td>
                    </tr>                    
                @empty
                    <tr>
                        <th colspan="8">Nenhum registro!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">{{ $locadoraModelos->links('pagination::bootstrap-5') }}</div>

    </div>
</x-layout>
