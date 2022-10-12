<x-layout>
    <x-card-show header="Modelos">
        <div class="row align-items-center pt-4 pb-3">
            <div class="px-5 py-4">
                <h6 class="mb-0">Modelo: {{ $modelo->nome }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Montadora: {{ $modelo->montadora }}</h6>
            </div>
        </div>

        <div class="px-5 py-4">
            <x-button type="link" route="{{ route('modelos.index') }}" name="Voltar" primary></x-button>
        </div>
    </x-card-show>
</x-layout>
