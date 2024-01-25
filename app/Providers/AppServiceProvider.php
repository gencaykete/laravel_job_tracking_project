<?php

namespace App\Providers;

use App\Core\CustomResourceRegistrar;
use App\Models\Customer;
use App\Models\Developer;
use App\Models\Project;
use App\Models\ProjectDeveloper;
use App\Models\ProjectDeveloperPayment;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $registrar = new CustomResourceRegistrar($this->app['router']);

        $this->app->bind('Illuminate\Routing\ResourceRegistrar', function () use ($registrar) {
            return $registrar;
        });

        $settings = [];

        /*foreach (Setting::all() as $item) {
            $settings[$item->name] = $item->value;

            if ($item->name == 'activeDays') {
                $settings[$item->name] = explode(',', $item->value);
            }
        }*/

        $globalData = [
            /*'developer_count' => Developer::count(),
            'customer_count' => Customer::count(),
            'project_count' => Project::count(),
            'project_prices' => Project::where('status', 1)->sum('price'),
            'project_developer_payments' => ProjectDeveloper::whereHas('project', function ($q) {
                $q->where('status', 1);
            })->sum('price'),
            'last_actions' => ProjectDeveloperPayment::latest()->take(10)->get()*/
        ];

        \View::share('globalData', $globalData);

        Config::set('setting', $settings);

    }
}
