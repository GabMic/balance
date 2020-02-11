<section class="section">
    @guest
        @include('partials.register-or-login')
    @endguest
     @auth
    <div class="tile is-ancestor">
        <div class="tile is-parent">
            <div class="card tile is-child">
                <div class="card-content">
                    <div class="level is-mobile">
                        <div class="level-item">
                            <div class="is-widget-label">
                                <h5 class="subtitle is-5 is-spaced">{{__('general.budget')}} {{__('general.for-month')}} {{$month}}</h5>
                                <h1 class="title is-1-mobile">{{$currentMonthBudget}}  {{__('general.currency')}}</h1>
                            </div>
                        </div>
                        <div class="level-item has-widget-icon">
                            <div class="is-widget-icon">
                                <span class="icon has-text-primary is-large"><i class="mdi mdi-chart-pie mdi-48px"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tile is-parent">
            <div class="card tile is-child">
               <div class="card-content">
                    <div class="level is-mobile">
                        <div class="level-item">
                            <div class="is-widget-label">
                                <h5 class="subtitle is-5 is-spaced">@lang('general.total-paid-this-month') {{$month}}</h5>
                                <h1 class="title is-1-mobile">{{$totalExpensesThisMonth}} {{__('general.currency')}}</h1>
                            </div>
                        </div>
                        <div class="level-item has-widget-icon">
                            <div class="is-widget-icon"><span class="icon has-text-success is-large"><i class="mdi mdi-chart-arc mdi-48px"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tile is-parent">
            <div class="card tile is-child">
                <div class="card-content">
                    <div class="level is-mobile">
                        <div class="level-item">
                            <div class="is-widget-label">
                                <h5 class="subtitle is-5 is-spaced">@lang('general.open-notes')</h5>
                                <h1 class="title is-1-mobile">{{count($user->tasks())}}</h1>
                            </div>
                        </div>
                        <div class="level-item has-widget-icon">
                            <div class="is-widget-icon"><span class="icon has-text-info is-large"><i class="mdi mdi-note-multiple-outline mdi-48px"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="tile is-ancestor">
            <div class="tile is-parent">
                <div class="card tile is-child">
                    <div class="card-content">
                        <div class="level is-mobile">
                            <div class="level-item">
                                <div class="is-widget-label">
                                    <h5 class="subtitle is-5 is-spaced">{{__('general.budget-status')}}</h5>
                                  @if($budgetStatus > 100)
                                        <h1 class="title is-1-mobile" style="color: red">{{$budgetStatus}}% {{__('general.budget-used')}}</h1>
                                        <p class="help is-danger">{{__('general.over-draft')}} {{$totalExpensesThisMonth - $currentMonthBudget}} {{__('general.currency')}}</p>
                                      @elseif($budgetStatus < 100)
                                        <h1 class="title is-1-mobile" style="color: green">{{$budgetStatus}}% {{__('general.budget-used')}}</h1>
                                        <h6 class="help is-success"> <b>{{__('general.budget-after-expenses')}} {{$currentMonthBudget - $totalExpensesThisMonth}} {{__('general.currency')}}.</b></h6>
                                    @endif
                                </div>
                            </div>
                            <div class="level-item has-widget-icon">
                                <div class="is-widget-icon">
                                    <span class="icon has-text-primary is-large"><i class="mdi mdi-percent-outline mdi-48px"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     @endauth
</section>
