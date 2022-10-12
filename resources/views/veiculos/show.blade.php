<x-layout>
    <x-card-show header="Veiculo {{ $veiculo->modelo }}">
        <div class="row align-items-center pt-4 pb-3">
            <div class="px-5 py-4">
                <h6 class="mb-0">Modelo: {{ $veiculo->modelo }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Montadora: {{ $veiculo->montadora }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Fabricante: {{ $veiculo->fabricante }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Número de portas: {{ $veiculo->numero_portas }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Cor: {{ $veiculo->cor }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Ano do modelo: {{ $veiculo->ano_modelo }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Ano de fabricação: {{ $veiculo->ano_fabricacao }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Placa: {{ $veiculo->placa }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Chassi: {{ $veiculo->chassi }}</h6>
            </div>
        </div>

        <hr class="mx-n3">

        <div class="px-5 py-4">
            <x-button type="link" route="{{ route('veiculos.index') }}" name="Voltar" primary></x-button>
        </div>
    </x-card-show>
</x-layout>
