<?php

namespace App\Providers;

use App\Method;
use App\Type;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
            $user = Auth::user();

            JavaScript::put([
                'relatesTo' => __('general.relates-to'),
                'needsToBeDone' => __('general.needs-to-be-done'),
                'choose' => __('general.choose'),
                'direction' => Auth::check() && $user->locale  == 'he' ? 'text-align: right;' : 'text-align: left;',
                'add' => __('general.bill-form-submit'),
                'type' => __('general.types'),
                'delete'=>__('general.delete'),
                'uncheck' => __('general.unCheck'),
                'currency' => __('general.currency'),
                'dailySpending' =>__('general.daily-spending'),
                'todayActivities' =>__('general.todayActivities'),
            ]);
            $view->with('user', $user);
            $view->with('month', $month);
        });
    }
}
