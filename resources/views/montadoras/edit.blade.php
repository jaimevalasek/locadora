<x-layout>
    <x-alert />
    <x-card-show header="Atualizando o nome da montadora {{ $montadora->nome }}">
        <div class="col-lg-12 mt-2">
            <x:form method="POST" metodoType="PUT" action="{{ route('montadoras.update', $montadora->id) }}">
                <div class="row">
                    <div class="col-12">
                        <x:input.text name="nome" id="nome" label="Nome da montadora" placeholder="Nome" value="{{ old('nome', $montadora->nome) }}" />
                    </div>              
                </div>
                
                <div class="row">
                    <div class="col-6">
                        <x-button style="width:100%;" type="link" route="{{ route('montadoras.index') }}" name="Voltar" primary></x-button>
                    </div>
                    <div class="col-6">
                        <x-button style="width:100%;" type="submit" name="Atualizar" primary></x-button>
                    </div>
                </div>
            </x:form>
        </div>        
    </x-card-show>                       
</x-layout>
