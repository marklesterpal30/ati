<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

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
    public function boot(): void
    { 
          $incomingCountRecordsOffice = Document::where('status', 'pending')
            ->where('recieved_by', 2)
            ->count();
            View::share('incomingCountRecordsOffice', $incomingCountRecordsOffice);
    }
}
