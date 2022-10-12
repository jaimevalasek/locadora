<x-layout>
    <x-card-show header="Locadoras">
        <div class="row align-items-center pt-4 pb-3">
            <div class="px-5 py-4">
                <h6 class="mb-0">Fantasia: {{ $locadora->nome_fantasia }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Razão Social: {{ $locadora->razao_social }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">CNPJ: {{ $locadora->cnpj }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">E-mail: {{ $locadora->email }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Telefone: {{ $locadora->telefone }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Cidade: {{ $locadora->cidade }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Estado: {{ $locadora->estado }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Registro criado em: {{ $locadora->created_at }}</h6>
                <hr class="mx-n3">
                <h6 class="mb-0">Registro atualizado em: {{ $locadora->updated_at }}</h6>
            </div>
        </div>
        
        <div class="px-5 py-4">
            <x-button type="link" route="{{ route('locadoras.index') }}" name="Voltar" primary></x-button>
        </div>
    </x-card-show>                       
</x-layout>
