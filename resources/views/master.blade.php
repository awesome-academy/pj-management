<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title')</title>
        <link rel="apple-touch-icon" href="{{ config('app.logo') }}">
        <link rel="shortcut icon" href="{{ config('app.logo') }}">
        <link rel="stylesheet" href="{{ asset('js/datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('../css/template-css.css') }}" />
    </head>
    <body>
        @include('shared.menu')
        @if (Auth::check())
        @include('shared.sidebar')
        @endif
        <div class="page-container">
            <div class="main-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('js/jquery.js') }}">
        </script>
        <script type="text/javascript" src="{{ asset('js/bootstrap1.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/datepicker.js') }}"></script>
        <script type="text/javascript">
            $('.date').datepicker({
                format: 'yyyy-mm-dd',
            });
        </script>
        <script src="{{ asset('js/template-js.js') }}"></script>
        <script src="{{ asset('js/Chart.min.js') }}"></script>
        <script src="{{ asset('js/template-jquery.js') }}"></script>
        <script src="{{ asset('js/default.js') }}"></script>
    </body>
</html>
