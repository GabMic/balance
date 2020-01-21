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

            $locale = auth()->check() && auth()->user()->locale;
            JavaScript::put([
                'relatesTo' => __('general.relates-to'),
                'needsToBeDone' => __('general.needs-to-be-done'),
                'choose'=> __('general.choose'),
                'dire' => $locale == 'he' ? 'text-align: right;' : 'text-align: left;',
                'add' => __('general.bill-form-submit')
            ]);

            $types = auth()->check() ? auth()->user()->type()->orderBy('name', 'asc')->get() : "nothing";
            $methods = Method::all(['id', 'type', 'english_type']);
            $globalAppBudget = auth()->check() && auth()->user()->budget() ? auth()->user()->budget(): "--";
            $globalAppActivity = auth()->check() && auth()->user()->activity() ? auth()->user()->activity() : "--";
            $globalBalanceData = ['types' => $types, 'globalAppBudget' => $globalAppBudget, 'globalAppActivity' => $globalAppActivity, 'methods' => $methods, 'locale' => $locale];
            $view->with('globalBalanceData', $globalBalanceData);
        });
    }
}
