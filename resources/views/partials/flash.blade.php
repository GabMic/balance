@section('css')
    <style>
        .notification{
            position: fixed;
            bottom: 1rem; right: 1rem;
            animation: hideFlash 5s forwards;
        }
        @keyframes hideFlash {
            0%   {opacity: 1;}
            90%  {opacity: 1;}
            100% {opacity: 0;}

        }
    </style>
@endsection
<div class="notification is-success">
   {{session('flash')}}
</div>
