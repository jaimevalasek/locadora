@props([
    'primary' => null,
    'gray' => null,
    'red' => null,
    'yellow' => null,
    'green' => null,
    'type' => null,
    'name' => null,
    'route' => null,
])

    <@php
        if ($type == "link") echo 'a href="' . $route . '" ';
        elseif ($type == "submit") echo 'button type="' . $type . '" ';
        else echo 'button ';    
    @endphp
        {{ $attributes->class([
            'btn',
            'btn-primary' => $primary,
            'btn-secondary' => $gray,
            'btn-success' => $green,
            'btn-danger' => $red,
            'btn-warning' => $yellow,
        ]) }}>
    {{ $name }}
    @php
        if ($type == "link") echo '</a>';
        elseif ($type == "submit") echo '</button>';        
    @endphp
