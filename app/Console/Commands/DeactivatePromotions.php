<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Promotion;
use Carbon\Carbon;

class DeactivatePromotions extends Command
{
    protected $signature = 'promotions:deactivate';

    protected $description = 'Desactiva las promociones cuya fecha de fin haya pasado';

    public function handle()
    {
        // Creamos la hora
        $now = Carbon::now();

        // Buscamos las promociones activas y las desactivamos si han caducado
        $affected = Promotion::where('is_active', true)
                             ->where('end_date', '<', $now)
                             ->update(['is_active' => false]);
    }
}
