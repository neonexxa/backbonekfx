<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/sweetalert.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('training.index') }}">Courses</a></li>
                        <li><a href="{{ route('setting.index') }}">Settting</a></li>
                        
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <script src="js/sweetalert.min.js"></script>

    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    // setting general value for text area
    var text_max = 200;
    $('.count_message').html(text_max + ' remaining');

    // countdown for text area
    $('textarea').keyup(function() {
      var text_length = $(this).val().length;
      var text_balance = $(this).attr('balance');
      var text_remaining = text_max - text_length;
      $('.'+text_balance).html(text_remaining + ' remaining');
    });

    $('.savebtnform').click(function() {
      var form = $(this).attr('form');
      $('.'+form).submit();
    });

    $('button.editcourses').on('click', function (e) {
        // Make sure the click of the button doesn't perform any action
        e.preventDefault();

        // Get the modal by ID
        var modal = $('#editcourse');

        // Set the value of the input fields
        modal.find('#coursename').val($(this).data('coursename'));
        modal.find('#coursedescription').val($(this).data('coursedescription'));
        modal.find('#courseduration').val($(this).data('courseduration'));
        modal.find('#courseprice').val($(this).data('courseprice'));
        modal.find('#coursearticle').val($(this).data('coursearticle'));

        // Update the action of the form
        modal.find('form').attr('action', 'training/' + $(this).data('course'));
    });
    
    </script>
</body>
</html>
