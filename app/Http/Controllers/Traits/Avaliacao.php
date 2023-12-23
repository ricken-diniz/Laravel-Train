<?php


namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\Log;

trait Avaliacao
{

    public function avaliacao () {
        $base_path = base_path();
        Log::info( '## ----------------- ACESSANDO CONTROLLERS ----------------- ##');
        Log::info($base_path);
    }
    
}
