<html>
    <head>
        <title>MyLara-@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/mycss.css') }}" />
        <script src="{{ url('/js/myjs.js') }}"></script>     
        @stack('css')
    </head>
    <body>
        <!-- @section('sidebar')
            This is the master sidebar.
        @show -->

        <div class="container">
            <h1>Master Layout</h1>
            @yield('content')
        </div>

        <!-- Javascript - @{{ myvar1 }} -->

        <!-- @unless (Auth::check())
            You are not signed in.
        @endunless -->
    
    @stack('js')
    </body>
</html>