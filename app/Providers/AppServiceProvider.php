<?php

namespace App\Providers;

use App\Method;
use App\Type;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use JavaScript;

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
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {

            $loggedIn = auth()->check();
            $authenticatable = auth()->user();
            $locale = $loggedIn && $authenticatable->locale;
            JavaScript::put([
                'relatesTo' => __('general.relates-to'),
                'needsToBeDone' => __('general.needs-to-be-done'),
                'choose'=> __('general.choose'),
                'dire' => $locale == 'he' ? 'text-align: right;' : 'text-align: left;',
                'add' => __('general.bill-form-submit')
            ]);

            $types = $loggedIn ? $authenticatable->type()->orderBy('name', 'asc')->get() : "nothing";
            $methods = Method::all(['id', 'type', 'english_type']);
            $globalAppBudget = $loggedIn && $authenticatable->budget() ? $authenticatable->budget(): "--";
            $globalAppActivity = $loggedIn && $authenticatable->activity() ? $authenticatable->activity() : "--";
            $globalBalanceData = ['types' => $types, 'globalAppBudget' => $globalAppBudget, 'globalAppActivity' => $globalAppActivity, 'methods' => $methods, 'locale' => $locale];
            $view->with('globalBalanceData', $globalBalanceData);
        });
    }
}
