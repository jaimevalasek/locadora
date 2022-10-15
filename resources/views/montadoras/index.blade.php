<x-layout>
    <x-alert />
    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-1 text-center bg-light">
        <x-button type="link" route="{{ route('montadoras.create') }}" name="Nova Montadora" green></x-button>
    </div>
    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-1 text-center bg-light">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col" style="width: 250px">opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($montadoras as $montadora)
                    <tr>
                        <th scope="row">{{ $montadora->id }}</th>
                        <td>{{ $montadora->nome }}</td>
                        <td>
                            <x-button type="link" route="{{ route('montadoras.show', $montadora->id) }}" name="Show" green></x-button>
                            <x-button type="link" route="{{ route('montadoras.edit', $montadora->id) }}" name="Editar" yellow></x-button>
                            <x-button type="link" route="{{ route('montadora.delete', $montadora->id) }}" name="Deletar" red></x-button>
                        </td>
                    </tr>                    
                @empty
                    <tr>
                        <th colspan="8">Nenhum registro!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">{{ $montadoras->links('pagination::bootstrap-5') }}</div>

    </div>
</x-layout>
