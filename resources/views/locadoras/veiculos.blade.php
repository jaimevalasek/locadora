<x-layout>
    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-1 text-center bg-light">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Montadora</th>
                    <th scope="col">Fabricante</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Chassi</th>
                    <th scope="col">Cor</th>
                    <th scope="col">Portas</th>
                    <th scope="col">Ano do modelo</th>
                    <th scope="col">Ano de fabricação</th>
                    <th scope="col">opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($veiculos as $veiculo)
                    <tr>
                        <th scope="row">{{ $veiculo->id }}</th>
                        <td>{{ $veiculo->modelo }}</td>
                        <td>{{ $veiculo->montadora }}</td>
                        <td>{{ $veiculo->fabricante }}</td>
                        <td>{{ $veiculo->placa }}</td>
                        <td>{{ $veiculo->chassi }}</td>
                        <td>{{ $veiculo->cor }}</td>
                        <td>{{ $veiculo->numero_portas }}</td>
                        <td>{{ $veiculo->ano_modelo }}</td>
                        <td>{{ $veiculo->ano_fabricacao }}</td>
                        <td>
                            <x-button type="link" route="{{ route('veiculos.show', $veiculo->id) }}" name="Show" green></x-button>
                        </td>
                    </tr>                    
                @empty
                    <tr>
                        <th colspan="8">Nenhum registro!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">{{ $veiculos->links('pagination::bootstrap-5') }}</div>

    </div>
</x-layout>
