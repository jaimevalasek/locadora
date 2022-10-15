<x-layout>
    <x-card-show header="Atualizando a locadora {{ $locadora->nome_fantasia }}">
        <div class="col-lg-12 mt-2">
            <x:form method="POST" metodoType="PUT" action="{{ route('locadoras.update', $locadora->id) }}">
                <div class="row">
                    <div class="col-6">
                        <x:input.text name="nome_fantasia" id="nome_fantasia" label="Nome Fantasia" placeholder="Nome Fantasia" value="{{ old('nome_fantasia', $locadora->nome_fantasia) }}" />
                    </div>
                    <div class="col-6">
                        <x:input.text name="razao_social" id="razao_social" label="Razão Social" placeholder="Razão Social" value="{{ old('razao_social', $locadora->razao_social) }}"/>
                    </div>                  
                </div>

                <div class="row">
                    <div class="col-4">
                        <x:input.text name="email" id="email" label="E-mail" placeholder="E-mail" value="{{ old('email', $locadora->email) }}"/>
                    </div>
                    <div class="col-4">
                        <x:input.text name="cnpj" id="cnpj" label="CNPJ" placeholder="CNPJ" value="{{ old('cnpj', $locadora->cnpj) }}"/>    
                    </div>
                    <div class="col-4">
                        <x:input.text name="telefone" id="telefone" label="Telefone" placeholder="Telefone" value="{{ old('telefone', $locadora->telefone) }}"/>    
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col-3">
                        <x:input.text name="cep" id="cep" label="CEP" placeholder="CEP" value="{{ old('cep', $locadora->endereco->cep) }}" />
                    </div>
                    <div class="col-6">
                        <x:input.text name="rua" id="rua" label="Rua" placeholder="Rua" value="{{ old('rua', $locadora->endereco->rua) }}"/>
                    </div>
                    <div class="col-3">
                        <x:input.text name="numero" id="numero" label="Número" placeholder="Número" value="{{ old('numero', $locadora->endereco->numero) }}"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <x:input.text name="bairro" id="bairro" placeholder="Bairro" label="Bairro" value="{{ old('bairro', $locadora->endereco->bairro) }}" />
                    </div>
                    <div class="col-5">
                        <x:input.text name="cidade" id="cidade" placeholder="Cidade" label="Cidade" value="{{ old('cidade', $locadora->endereco->cidade) }}"/>
                    </div>
                    <div class="col-3">
                        <x:input.text name="estado" id="estado" placeholder="Estado" label="Estado" value="{{ old('estado', $locadora->endereco->estado) }}"/>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-6">
                        <x-button style="width:100%;" type="link" route="{{ route('locadoras.index') }}" name="Voltar" primary></x-button>
                    </div>
                    <div class="col-6">
                        <x-button style="width:100%;" type="submit" name="Atualizar" primary></x-button>
                    </div>
                </div>
            </x:form>
        </div>        
    </x-card-show>                       
</x-layout>
