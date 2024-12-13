<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Visitor;
use App\Models\Information; // Ensure you use the correct model name for breaking news
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(121);
        Paginator::useBootstrap();
        
        // Share common data with all views
        View::composer('*', function ($view) {
            $ipAddress = request()->ip();
            $today = Carbon::today();

            // Check if the IP address has already been recorded today
            $visit = Visitor::where('ip_address', $ipAddress)
                ->whereDate('created_at', $today)
                ->first();

            if (!$visit) {
                // Record the visit
                Visitor::create(['ip_address' => $ipAddress]);
            }

            // Get the total visitor count
            $visitorCount = Visitor::count();

            // Fetch breaking news notices
            $breakingNews = Information::where('type', 1)->latest()->get();

            // Share variables with all views
            $view->with('visitorCount', $visitorCount)
                 ->with('breakingNews', $breakingNews);
        });
    }
}
