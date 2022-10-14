<x-layout>
    <x-card-show header="Cadastro de veículo">
        <div class="col-lg-12 mt-2">
            <x:form method="POST" action="{{ route('locadora.veiculo-attach', $locadora->id) }}">
                <div class="row">
                    <div class="col-12">
                        <select name="veiculo_id" class="form-control">
                            <option>Selecione o veículo</option>
                            @foreach ($veiculos as $veiculo)
                                <option value="{{ $veiculo->id }}"
                                    @if (old('veiculo_id') == $veiculo->id)
                                        @selected(true)
                                    @endif>Modelo: {{ $veiculo->modelo->nome }} Placa: {{ $veiculo->placa }}, Chass: {{ $veiculo->chassi }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('veiculo_id'))
                           <small>{{ $errors->first('veiculo_id') }}</smal>                       
                        @endif
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
