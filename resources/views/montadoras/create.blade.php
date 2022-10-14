<x-layout>
    <x-card-show header="Cadastro de locadora">
        <div class="col-lg-12 mt-2">
            <x:form method="POST" action="{{ route('montadoras.store') }}">
                <div class="row">
                    <div class="col-12">
                        <x:input.text name="nome" id="nome" label="Nome da montadora" placeholder="Nome da montadora" value="{{ old('nome') }}" />
                    </div>                
                </div>                
                
                <div class="row pt-4">
                    <div class="col-6">
                        <x-button style="width:100%;" type="link" route="{{ route('montadoras.index') }}" name="Voltar" primary></x-button>
                    </div>
                    <div class="col-6">
                        <x-button style="width:100%;" type="submit" name="Cadastrar" primary></x-button>
                    </div>
                </div>
            </x:form>
        </div>        
    </x-card-show>                       
</x-layout>
