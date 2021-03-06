<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Deped  Palawan') }}</title> -->
    <title> @yield('title', 'DepEd Palawan')</title>
    <link rel="icon" href="{!! asset('backend/img/logo.ico') !!}"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/grid.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

</head>
<body>
    <div id="app">
        @include('layouts.frontend.navbar')

        @yield('content')

        @include('layouts.frontend.footer')
       
    </div>  
    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

    @yield('script')
</body>
</html>
