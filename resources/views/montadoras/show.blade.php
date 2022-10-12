<x-layout>
    <x-card-show header="Montadoras">
        <div class="row align-items-center pt-4 pb-3">
            <div class="px-5 py-4">
                <h6 class="mb-0">{{ $montadora->nome }}</h6>
            </div>
        </div>

        <hr class="mx-n3">

        <div class="px-5 py-4">
            <x-button type="link" route="{{ route('montadoras.index') }}" name="Voltar" primary></x-button>
        </div>
    </x-card-show>
</x-layout>
