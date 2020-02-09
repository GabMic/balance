<?php

namespace App\Providers;

use App\Method;
use App\Type;
use Illuminate\Support\Carbon;
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
            $month = Carbon::now()->monthName;
            $loggedIn = auth()->check();
            $user = auth()->user();
            $locale = $loggedIn && $user->locale == 'he';

            JavaScript::put([
                'relatesTo' => __('general.relates-to'),
                'needsToBeDone' => __('general.needs-to-be-done'),
                'choose' => __('general.choose'),
                'direction' => $locale == 'he' ? 'text-align: right;' : 'text-align: left;',
                'add' => __('general.bill-form-submit'),
                'type' => __('general.types'),
                'delete'=>__('general.delete'),
                'uncheck' => __('general.unCheck')
            ]);
            $types = $loggedIn ? $user->type()->orderBy('name', 'asc')->get() : "nothing";
            $globalBalanceData = ['locale' => $locale, 'types' => $types];
            $view->with('globalBalanceData', $globalBalanceData);
            $view->with('month', $month);
        });
    }
}
