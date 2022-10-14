<?php

namespace App\Supports;

class CalculateDatabaseResults 
{
    public function getVeiculosWhereNotIn($data)
    {
        $return = array();

        if (count($data)) {
            foreach($data as $item) {
                array_push($return, $item->veiculo_id);
            }
         }

         return $return;
        
    }
}