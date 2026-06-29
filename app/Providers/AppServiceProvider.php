<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\VentaCabecera;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {   
        Carbon::setLocale('es');
        
        View::composer('*', function ($view) {

            if (auth()->check()) {

                $carrito = VentaCabecera::where('user_id', auth()->id())
                    ->where('estado', 'carrito')
                    ->with('detalles')
                    ->first();

                $count = $carrito ? $carrito->detalles->sum('cantidad') : 0;

                $view->with('cartCount', $count);

            } else {
                $view->with('cartCount', 0);
            }
        
        });
    }
}
