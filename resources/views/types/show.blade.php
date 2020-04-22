@extends('layouts.app')

@section('title')
  Balance - {{$type->name}}
@endsection

@section('content')
    <div class="columns is-centered m-1">
        <div class="column is-7">
            <div class="box">
                <h6 class="title is-6">{{__('general.display-data-for-another-year')}}</h6>
                <div class="select">
                    <select id="selectDataMonth">
                        <option value="1">לפני חודש</option>
                        <option value="2">לפני חודשיים</option>
                        <option value="3">לפני שלושה חודשים</option>
                        <option value="4">לפני ארבעה חודשים</option>
                        <option value="5">לפני חמישה חודשים</option>
                        <option value="6">לפני חצי שנה</option>
                    </select>
                </div>
                <button class="button is-info is-outlined" onclick="displayNewDataOnChart()">{{__('general.bill-form-submit')}}</button>
            </div>
            <canvas id="myChart" aria-label="טבלת נתונים עבור הוצאות" role="img"></canvas>
            <hr>
            <h6 class="title is-6">{{__('general.things-to-remember-about-tag')}}<b>{{$type->name}}</b> </h6>
            <div class="list" style="box-shadow: none; color: black; border-radius: 0">
                @forelse($type->tasks as $task)
                   <div class="list-item"> {{$task->content}}</div>
                    @empty
                        <h4 class="title is-4">{{__('general.no-notes')}}</h4>
                @endforelse
            </div>
        </div>
        <div class="column is-3 m-1">
            <div class="box">
                <p>
                    {{__('general.total-paid-this-month')}} {{__('general.for')}} {{$type->name}}: <strong>{{$type->activity->sum('amount')}}</strong> {{__('general.currency')}}.
                </p>
            </div>
            <hr>
            <type-activities-list></type-activities-list>
        </div>
    </div>

@endsection


@section('js')
    <script src="{{mix('js/charts.js')}}"></script>

    <script>
        function displayNewDataOnChart() {
            let dropdown = document.getElementById("selectDataMonth");
            let value = dropdown.options[dropdown.selectedIndex].value;
            axios.put(`/types/${window.balance.type.id}`, {
                typeId: window.balance.type.id,
                month: value
            }).then(({data}) => {
                let response = {
                    label: `{{__('general.for')}} ${value}`,
                    data: data.amounts,
                    fill: false,
                    backgroundColor: 'rgb(0,0,0)',
                    borderColor: 'rgb(255,0,61)',
                    borderWidth: 1
                };
                myChart.data.datasets.push(response);
                myChart.update();
            })
        }
    </script>
@endsection
