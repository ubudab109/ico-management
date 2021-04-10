@extends('layouts.base')

@section('body')
    <body class="login">
        @livewire('auth.login')

        <!-- BEGIN: JS Assets-->
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->

        @yield('script')
    </body>
@endsection
