<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('modules.front.layouts.navigation', function ($view) {
            $notif = 0;
            if (Auth::check()) {
                $user = Auth::user();
                $pesanan_utama = Cart::where('user_id', $user->id)->where('status', 0)->first();
                if ($pesanan_utama) {
                    $notif = CartItem::where('cart_id', $pesanan_utama->id)->count();
                }
            }
            $view->with('notif', $notif);
        });
    }
}
