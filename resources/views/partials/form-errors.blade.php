@if($errors->any())
    <div class="card">
    <div class="card-header">
        <div class="card-header-title">{{__('general.form-errors')}}</div>
    </div>
    <div class="card-content">
        @foreach ($errors->all() as $message)
            <ul>
                <li style="color: #cd0930">{{$message}}</li>
            </ul>
        @endforeach
    </div>
</div>
@endif
