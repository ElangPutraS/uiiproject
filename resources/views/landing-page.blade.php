<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/utility.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{-- Navbar --}}
        <nav class="ui basic blue navbar segment">
            <div class="ui fluid page dimmer" id="dimmer-mobile-menu">           
                <div class="ui fluid vertical menu" id="mobile-menu">
                    <div class="inverted menu" style="background: #d9d9d9;">
                        <div class="ui item" style="justify-content: space-between;">
                            Menu
                            <i class="close icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui secondary borderless pointing menu">
                <div class="header item">
                    <img class="ui small image" src="{{ asset('logo.png') }}" alt="Logo navbar">
                </div>
                <div class="right menu d-flex d-md-none">
                    <div class="ui item">
                        <div class="large ui icon button" id="nav-menu-toggler">
                            <i class="large bars icon"></i>
                        </div>
                    </div>
                </div>
                <div class="right menu d-none d-md-flex" id="nav-menu">
                    <a href="#" class="ui item active">Home</a>
                    <a href="#" class="ui item">Projects</a>
                    <a href="#" class="ui item">About</a>
                    <a href="#" class="ui item">Sign in</a>
                    <div class="ui item">
                        <a href="#" class="ui primary button">Post a Project</a>
                    </div>
                </div>
            </div>
        </nav>
        {{-- End Navbar --}}

        {{-- JUMBOTRON --}}
        <div class="ui two column stackable padded divided grid" style="min-height: 75vh; background-size: 75%; background-repeat: no-repeat; background-position: bottom right; background-image:url({{ asset('img/bg-jumbrotron.png') }})">
            <div class="column">
                <div class="ui basic segment">
                    <div class="ui header">
                        <h1 class="content">
                            Get the project done flexibly and faster.
                        </h1>
                        <h2 class="sub header">UII Project makes it easy for project owners and students to connect, collaborate, and get the project done flexibly and faster</h2>
                    </div>
                    <div class="mt-4" style="text-align: center;">
                        <div class="ui small unstackable steps d-none d-md-flex" style="text-align:">
                            <div class="step">
                                <i class="handshake outline icon"></i>
                                <div class="content">
                                    Connect
                                </div>
                            </div>
                            <div class="step">
                                <i class="comments outline icon"></i>
                                <div class="content">
                                    Collaborate
                                </div>
                            </div>
                            <div class="step">
                                <i class="smile outline icon"></i>
                                <div class="content">
                                    Level up
                                </div>
                            </div>
                        </div>
                        <div class="ui vertical animated big blue button">
                            <div class="visible content">Are you ready ?</div>
                            <div class="hidden content">Get Started !</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END JUMBOTRON --}}

        {{-- SEARCH --}}
        <div class="ui center aligned padded stackable grid" style="margin-top: -10vh !important;">
            <div class="ten wide column">
                <div class="ui segment">
                    <div class="ui search">
                        <div class="ui fluid big floated icon input">
                            <input type="text" class="prompt" placeholder="Search ...">
                            <i class="search icon"></i>
                        </div>
                        <div class="result"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END SEARCH --}}
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
