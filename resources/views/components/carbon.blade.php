@props([
    'tipo' => null,
    'data' => now(),
    'isoFormat' => false,
    'locale' => 'pt_BR',
    'fromFormat' => 'Y-m-d H:i:s',
    'format' => 'd/m/Y H:i',
    'dataNull' => 'Atualmente'
])

@php

    if (strlen($data) < 8) {
        echo $dataNull;
        return;
    }

    $date = Carbon\Carbon::createFromFormat($fromFormat, $data);
    $date->locale($locale);  
    
    switch ($tipo) {
        case 'diffForHumans':
            echo $date->diffForHumans();
            break;            
        default:
            if ($isoFormat) {
                echo $date->isoFormat($isoFormat);
            } else {
                echo $date->format($format);
            }
            break; 
    }
      
@endphp