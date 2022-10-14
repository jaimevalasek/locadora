@props([
    'name' => null,
    'id'=> null,
    'placeholder' => null,
    'value' => null,
    'type' => 'text',
    'label'  => null,
])

<div class="form-group">
    @if ($label)
        <label for="{{ $name }}" style="color: #b8b5b5">{{ $label }}</label>            
    @endif
    <input type="{{ $type }}" 
        name="{{ $name }}" 
        value="{{ $value }}" 
        class="form-control  input_login" 
        id="{{ $id }}" 
        placeholder="{{ $placeholder }}" 
        {{ $attributes }}>

    @error($name) <small>{{ $message }}</small> @enderror
</div>