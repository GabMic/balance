<!DOCTYPE html>
<html lang="{{auth()->check() ? auth()->user()->locale : 'en'}}" dir="{{auth()->check() && auth()->user()->locale == 'he' ? 'rtl' : 'ltr'}}">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="windows-1255">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#FFFFFF">
    <link rel="shortcut icon" href="{{asset('storage/icons/favicon.ico')}}" type="image/x-icon">
    @yield('meta-description')
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef&amp;display=swap">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.7.95/css/materialdesignicons.min.css">
    <style>
        body{font-family: 'Alef', sans-serif;}
    </style>
    @yield('css')
</head>
<body>
    <div id="app">
        @include('partials.navbar')
        @include('partials.typesBar')
        <main class="container">
            @yield('content')
            <flash message="{{session('flash')}}"></flash>
        </main>
    </div>
    @include('partials.footer')
    <script src="{{ mix('js/app.js') }}" ></script>
    <script>
        function setLanguage(lang){
            axios.post('/language/'+ lang).then(() => {
               location.reload()
            })
        }
    </script>
     @yield('js')
</body>
</html>
