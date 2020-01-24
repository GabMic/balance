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
            $user = auth()->user();
            $locale = $loggedIn && $user->locale == 'he';

            JavaScript::put([
                'relatesTo' => __('general.relates-to'),
                'needsToBeDone' => __('general.needs-to-be-done'),
                'choose'=> __('general.choose'),
                'dire' => $locale == 'he' ? 'text-align: right;' : 'text-align: left;',
                'add' => __('general.bill-form-submit')
            ]);

            $methods = Method::all(['id', 'type', 'english_type']);
            $types = $loggedIn ? $user->type()->orderBy('name', 'asc')->get() : "nothing";
            $globalAppBudget = $loggedIn && $user->budget() ? $user->budget(): "--";
            $globalAppActivity = $loggedIn && $user->activity() ? $user->activity() : "--";
            $globalBalanceData = ['types' => $types, 'globalAppBudget' => $globalAppBudget, 'globalAppActivity' => $globalAppActivity, 'methods' => $methods, 'locale' => $locale];
            $view->with('globalBalanceData', $globalBalanceData);
        });
    }
}
