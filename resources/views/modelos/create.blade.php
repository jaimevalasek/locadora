<x-layout>
    <x-card-show header="Cadastro de locadora">
        <div class="col-lg-12 mt-2">
            <x:form method="POST" action="{{ route('modelos.store') }}">
                <div class="row">
                    <div class="col-12">
                        <select name="montadora_id" class="form-control">
                            <option>Selecione a montadora</option>
                            @foreach ($montadoras as $montadora)
                                <option value="{{ $montadora->id }}"
                                    @if (old('montadora_id') == $montadora->id)
                                        @selected(true)
                                    @endif>{{ $montadora->nome }}</option>
                            @endforeach
                        </select>
                    </div>                
                    <div class="col-12">
                        <x:input.text name="nome" id="nome" label="Nome do modelo" placeholder="Nome do modelo" value="{{ old('nome') }}" />
                    </div>                
                </div>                
                
                <div class="row pt-4">
                    <div class="col-6">
                        <x-button style="width:100%;" type="link" route="{{ route('modelos.index') }}" name="Voltar" primary></x-button>
                    </div>
                    <div class="col-6">
                        <x-button style="width:100%;" type="submit" name="Cadastrar" primary></x-button>
                    </div>
                </div>
            </x:form>
        </div>        
    </x-card-show>                       
</x-layout>
