@props([
    'metodoType' => false,
])

<form {{ $attributes }} >
    @csrf

    @if ($metodoType == 'PUT')
        @method($metodoType)
    @endif

    {{ $slot }}
</form>