<x-layout>
    <x-alert />
    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-1 text-center bg-light">
        <x-button type="link" route="{{ route('locadoras.create') }}" name="Nova Locadora" green></x-button>
    </div>
    <div class="position-relative overflow-hidden p-3 p-md-2 m-md-1 text-center bg-light">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Fantasia</th>
                    <th scope="col">Razão Social</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Local</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($locadoras as $locadora)
                    <tr>
                        <th scope="row">{{ $locadora->id }}</th>
                        <td>{{ $locadora->nome_fantasia }}</td>
                        <td>{{ $locadora->razao_social }}</td>
                        <td>{{ $locadora->cnpj }}</td>
                        <td>{{ $locadora->email }}</td>
                        <td>{{ $locadora->telefone }}</td>
                        <td>
                            {{ $locadora->endereco->rua }}, {{ $locadora->endereco->numero }} - {{ $locadora->endereco->bairro }}<br />
                            {{ $locadora->endereco->cidade }} / {{ $locadora->endereco->estado }} ({{ $locadora->endereco->cep }})
                        </td>
                        <td>
                            <x-button type="link" route="{{ route('locadoras.show', $locadora->id) }}" name="Show" green></x-button>
                            <x-button type="link" route="{{ route('locadoras.edit', $locadora->id) }}" name="Editar" yellow></x-button>
                            <x-button type="link" route="{{ route('locadora.delete', $locadora->id) }}" name="Excluir" red></x-button>                            
                        </td>
                    </tr>                    
                @empty
                    <tr>
                        <th colspan="8">Nenhum registro!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">{{ $locadoras->links('pagination::bootstrap-5') }}</div>

    </div>
</x-layout>
