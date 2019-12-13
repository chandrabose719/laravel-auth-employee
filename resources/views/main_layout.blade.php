<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <link href="<?= asset('images/favicon.png'); ?>" rel="shortcut icon" type="image/x-icon">
        <title>Laravel</title>

        {{-- Bootstrap --}}
        <link href="<?= asset('library/bootstrap-four/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?= asset('library/bootstrap-four/css/fontawesome-all.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?= asset('library/bootstrap-four/css/animate.min.css'); ?>" rel="stylesheet" type="text/css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        {{-- <link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet"> --}}
        <link href="https://fonts.googleapis.com/css?family=Rajdhani:500&display=swap" rel="stylesheet">
        
        {{-- Custom CSS --}}
        <link href="<?= asset('library/custom/css/common.css'); ?>" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div id="main-wrapper">
            
            @include('components.main_header')
            
            @if($message = Session::get('success'))
                <div class="alert-message">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> {{ $message }}
                    </div>
                </div>
            @endif
            @if($message = Session::get('warning'))
                <div class="alert-message">
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Warning!</strong> {{ $message }}
                    </div>
                </div>
            @endif        
            
            <div id="main-body">
                @yield('content')
            </div>    
            
        </div>
        
        {{-- Bootstrap & JQuery --}}
        <script src="<?= asset('library/bootstrap-four/js/jquery.min.js'); ?>"></script>
        <script src="<?= asset('library/bootstrap-four/js/bootstrap.min.js'); ?>"></script>
        <script src="<?= asset('library/bootstrap-four/js/bootstrap.bundle.min.js'); ?>"></script>

        {{-- Custom JS         --}}
        <script src="<?= asset('library/custom/js/custom.js'); ?>" type="text/javascript"></script>

    </body>
</html>
