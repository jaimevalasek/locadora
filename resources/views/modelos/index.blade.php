<x-layout>
    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-1 text-center bg-light">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Montadora</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($modelos as $modelo)
                    <tr>
                        <th scope="row">{{ $modelo->id }}</th>
                        <td>{{ $modelo->montadora }}</td>
                        <td>{{ $modelo->nome }}</td>
                        <td>
                            <x-button type="link" route="{{ route('modelos.show', $modelo->id) }}" name="Show" green></x-button>
                        </td>
                    </tr>                    
                @empty
                    <tr>
                        <th colspan="8">Nenhum registro!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">{{ $modelos->links('pagination::bootstrap-5') }}</div>

    </div>
</x-layout>
