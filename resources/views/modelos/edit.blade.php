<x-layout>
    <x-alert />
    <x-card-show header="Atualizando o nome do modelo {{ $modelo->nome }}">
        <div class="col-lg-12 mt-2">
            <x:form method="POST" metodoType="PUT" action="{{ route('modelos.update', $modelo->id) }}">
                <div class="row">
                    <div class="col-12">
                        <select name="montadora_id" class="form-control">
                            <option>Selecione a montadora</option>
                            @foreach ($montadoras as $montadora)
                                <option value="{{ $montadora->id }}"
                                    @if (old('montadora_id', $modelo->montadora_id) == $montadora->id)
                                        @selected(true)
                                    @endif>{{ $montadora->nome }}</option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="col-12">
                        <x:input.text name="nome" id="nome" label="Nome da montadora" placeholder="Nome" value="{{ old('nome', $modelo->nome) }}" />
                    </div>              
                </div>
                
                <div class="row">
                    <div class="col-6">
                        <x-button style="width:100%;" type="link" route="{{ route('modelos.index') }}" name="Voltar" primary></x-button>
                    </div>
                    <div class="col-6">
                        <x-button style="width:100%;" type="submit" name="Atualizar" primary></x-button>
                    </div>
                </div>
            </x:form>
        </div>        
    </x-card-show>                       
</x-layout>
