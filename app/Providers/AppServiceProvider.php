<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Room;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        $page_data = Page::where('id', 1)->first();
        $room_data = Room::get();
        $setting_data = Setting::where('id',1)->first();
        view()->share('global_page_data', $page_data);
        view()->share('global_room_data', $room_data);
        view()->share('global_setting_data', $setting_data);
    }
}