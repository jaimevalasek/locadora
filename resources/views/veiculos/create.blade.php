<x-layout>
    <x-card-show header="Cadastro de veículo">
        <div class="col-lg-12 mt-2">
            <x:form method="POST" action="{{ route('veiculos.store') }}">
                <div class="row">
                    <div class="col-12">
                        <select name="modelo_id" class="form-control">
                            <option>Selecione a montadora</option>
                            @foreach ($modelos as $modelo)
                                <option value="{{ $modelo->id }}"
                                    @if (old('modelo_id') == $modelo->id)
                                        @selected(true)
                                    @endif>{{ $modelo->nome }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('modelo_id'))
                           <small>{{ $errors->first('modelo_id') }}</smal>                       
                        @endif
                    </div>  
                </div>    
                <div class="row">
                    <div class="col-3">
                        <x:input.text name="numero_portas" id="numero_portas" label="Número de portas" placeholder="Número de portas" value="{{ old('numero_portas') }}" />
                    </div>                
                    <div class="col-3">
                        <x:input.text name="cor" id="cor" label="Cor do veículo" placeholder="Cor do veículo" value="{{ old('cor') }}" />
                    </div>                
                    <div class="col-6">
                        <x:input.text name="fabricante" id="fabricante" label="Fabricante" placeholder="Fabricante" value="{{ old('fabricante') }}" />
                    </div>                
                </div>                
                <div class="row">
                    <div class="col-3">
                        <x:input.text name="ano_modelo" id="ano_modelo" label="Ano do modelo" placeholder="Ano do modelo" value="{{ old('ano_modelo') }}" />
                    </div>                
                    <div class="col-3">
                        <x:input.text name="ano_fabricacao" id="ano_fabricacao" label="Ano de fabricação" placeholder="Ano de fabricação" value="{{ old('ano_fabricacao') }}" />
                    </div>                
                    <div class="col-3">
                        <x:input.text name="placa" id="placa" label="Placa" placeholder="Placa" value="{{ old('placa') }}" />
                    </div>                
                    <div class="col-3">
                        <x:input.text name="chassi" id="chassi" label="Chassi" placeholder="Chassi" value="{{ old('chassi') }}" />
                    </div>                
                </div>                
                
                <div class="row">
                    <div class="col-6">
                        <x-button style="width:100%;" type="link" route="{{ route('veiculos.index') }}" name="Voltar" primary></x-button>
                    </div>
                    <div class="col-6">
                        <x-button style="width:100%;" type="submit" name="Cadastrar" primary></x-button>
                    </div>
                </div>
            </x:form>
        </div>        
    </x-card-show>                       
</x-layout>
