<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/images/logo_qifact_2.png') }}">

    <style>
        html {
            scroll-behavior: smooth;
        }

        .dropdown-item:hover{
            background-color: rgba(56, 193, 114, 0.9)!important;
            color: white!important;
        }

        .a_bar:hover {
            color: rgba(56, 193, 114) !important;
        }

        .bigicon {
            color: white;
        }

        .mix {
            min-height: 370px;
        }

        ul.dropdown-cart {
            min-width: 250px;
            padding: 2px;
            margin: 7px;
            margin-top: 11px;
        }

        ul.dropdown-cart li .item {
            display: block;
            padding: 3px 10px;
            margin: 3px 0;

        }

        ul.dropdown-cart li .item:hover {
            background-color: #c3c5c5;

        }

        ul.dropdown-cart li .item:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0;
        }

        ul.dropdown-cart li .item-left {
            float: left;
        }

        ul.dropdown-cart li .item-left img,
        ul.dropdown-cart li .item-left span.item-info {
            float: left;
        }

        ul.dropdown-cart li .item-left span.item-info {
            margin-left: 10px;
        }

        ul.dropdown-cart li .item-left span.item-info span {
            display: block;
        }

        ul.dropdown-cart li .item-right {
            float: right;
        }

        ul.dropdown-cart li .item-right button {
            margin-top: 14px;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a href="{{ url('/') }}"><img class="navbar-brand" src="{{ asset('/images/logo_qifact_2.png')}}" alt="logo"></a>
                <a class="navbar-brand a_bar" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item"><a class="nav-link a_bar" href="/">Início</a></li>
                        <li class="nav-item"><a class="nav-link a_bar" href="{{ route('all_courses')}}">Cursos</a></li>
                        <!-- <li class="nav-item"><a class="nav-link a_bar" href="#">Programas de Formação</a></li> -->
                        <li class="nav-item"><a class="nav-link a_bar" href="#">Informação Legal</a></li>
                        <li class="nav-item"><a class="nav-link a_bar" href="/contacts">Contacto</a></li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link a_bar" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link a_bar" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle a_bar" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can('admin-only', Auth::user())
                                <a class="dropdown-item" href="{{ url('/admin') }}">Área de administrador</a>
                                @endcan
                                @guest
                                @else
                                <a class="dropdown-item" href="/users/dashboard">
                                    Dashboard
                                </a>
                                @endguest
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <!--Shopping-cart icon-->
                        <ul class="nav navbar-nav mt-2">
                            <li class="dropdown">
                                <a href="#" id="shoppingCart_btn" class="dropdown-toggle" style="color: rgba(0, 0, 0, 0.5)!important; margin-top:2px!important;" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="fa fa-gift bigicon"><img style="height:20px;" src="{{ asset('images/cart.svg')}}" alt="" /></a>
                                <ul class="dropdown-menu dropdown-cart" role="menu">
                                    <li class="text-center mt-4">
                                        <span>Compras</span>
                                    </li>
                                    <form>
                                        @csrf
                                        <div id="itemsCartFill">
                                        </div>
                                    </form>
                                    <li>
                                        <hr>
                                    </li>

                                    <li class="text-center" id="btn_checkout_li">

                                    </li>
                                </ul>
                            </li>
                        </ul>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="padding-top: 0!important;">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 footer_col">
                        <div class="logo_container">
                            <div class="footer_contact d-flex flex-row align-items-end justify-content-end">
                                <div class="logo_img"><img src="{{ asset('images/logo_qifact_2.png')}}" alt="Unavailable"></div>
                                <div class="logo_text mb-2">QIFact</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 footer_col">
                        <div class="footer_contact d-flex flex-row align-items-start justify-content-start">
                            <div class="footer_title">© 2019 QIFact Portugal
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
    <script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('js/popper.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    @yield('scripts')
    <script>
        jQuery(document).ready(function() {
            $('#shoppingCart_btn').click(updateCart);
            $('#toCheckout').click(updateCartPage);
        });

        function addToCart(id) {
            $('#snack').html('');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('/carts') }}",
                method: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    course_id: id
                },
                success: function(response) {
                    console.log(response.success);
                    $('#snack').html('');
                    $('#snack').append('<div id="snackbar">' + response.success + '</div>');
                    viewSnack();
                },
                error: function(response) {
                    console.log(response.responseJSON.error);
                    $('#snack').html('');
                    $('#snack').append('<div id="snackbar">' + response.responseJSON.error + '</div>');
                    viewSnack();
                }
            });
        }

        function buildCart(data) {
            console.log('buildCart');
            $('#itemsCartFill').html('');
            $('#btn_checkout_li').html('');
            let final_cost = 0;
            if (data.length > 0) {
                for (let i = 0; i < data.length; i++) {
                    $('#itemsCartFill').append('<li><hr></li><li><span class="item"><span class="item-left"><img src="{{ asset('images / course_1.jpg ')}}" style="height:40px;" alt="" /><span class="item-info"><span>' + data[i].name + '</span><span>Preço: ' + data[i].cost + '€</span></span></span><span class="item-right"><button onclick="event.preventDefault(); removeCourseFromCart(' + data[i].id + ')" style="margin-top:0;!important" class="btn btn-danger remove_course_from_cart"><i class="fa fa-trash"></i></button></span></span></li>');
                    final_cost += data[i].cost;
                }
                $('#btn_checkout_li').append('<form action="/shopping_carts" method="get"><button id="btn_checkout" style="width:100%;" class="btn btn-success">Checkout - ' + final_cost + '€</button></form>');
            } else {
                $('#btn_checkout_li').append('<button id="btn_checkout" style="width:100%;" class="btn btn-success">Checkout - ' + final_cost + '€</button>');
                $('#btn_checkout').attr("disabled", true);
            }
        }

        function removeCourseFromCart(course_id) {
            console.log('removeCourseFromCart');
            $.ajax({
                url: "{{ url('/carts/" + course_id + "')}}",
                method: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": course_id
                },
                success: function() {
                    updateCart();
                    updateCartPage();
                },
                fail: function() {}
            });
        }

        function updateCart() {
            console.log('updateCart');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/carts/all') }}",
                method: 'get',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    buildCart(data);
                },
                fail: function(data) {}
            });
        }

        function buildCartPage(data) {
            $('#cartBody').html('');
            $('#redirectBTN').html('');
            $('#checkoutBTN').html('');
            $('#totalRow').html('');
            $('#cartHead').html('');
            let courses = [];
            let final_cost = 0;
            if (data.length > 0) {
                $('#cartHead').append('<tr><th scope="col"> </th><th scope="col">Nome</th><th scope="col"></th><th scope="col" class="text-center"></th><th scope="col" class="text-right">Preço</th><th></th></tr>');
                for (let i = 0; i < data.length; i++) {
                    $('#cartBody').append('<tr><td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td><td><p class="mt-2">' + data[i].name + '</p></td><td></td><td></td><td class="text-right">' + data[i].cost + ' €</td><td class="text-right"><button onclick="event.preventDefault(); removeCourseFromCart(' + data[i].item_id + ')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td></tr>');
                    final_cost += data[i].cost;
                    courses[i] = data[i].name;
                }
                courses = data;
                $('#redirectBTN').append('<form action="{{route("all_courses")}}"><button class="btn btn-block btn-secondary">Continuar compras</button></form>');

                $('#checkoutBTN').append('<form action="/carts/checkout" method="#"><button id="toCheckout" class="btn btn-block btn-success text-uppercase">Checkout</button></form>');
                $('#toCheckout').click(function() {
                    checkoutCart();
                });
                //####
            } else {
                $('#cartHead').append('<tr><td></td><td></td><td class="text-center">O carrinho está vazio</td><td></td><td></td><td></td></tr>');
                $('#redirectBTN').append('<form action="{{route("all_courses")}}"><button class="btn btn-block btn-secondary">Voltar para cursos</button></form>');
                $('#itemsCartFill').append('<li><hr></li><li><span class="item text-center">O carrinho está vazio</span></li>');
                $('#checkoutBTN').append('<button class="btn btn-block btn-success text-uppercase" disabled>Checkout</button>');
            }
            $('#totalRow').append('<tr><td></td><td></td><td></td><td></td><td class="text-right"><strong>' + final_cost + ' €</strong></td><td class="text-right"><strong>Total</strong></td></tr>')

        }


        function updateCartPage() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/shopping_carts/all') }}",
                method: 'get',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    buildCartPage(data);
                },
                error: function(data) {}
            });
        }

        function viewSnack() {
            // Get the snackbar DIV
            var x = document.getElementById("snackbar");

            // Add the "show" class to DIV
            x.className = "show";

            // After 3 seconds, remove the show class from DIV
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }

        function checkoutCart() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('/carts/ref') }}",
                method: 'post',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response.success);
                },
                error: function(response) {
                    console.log('Error');
                }
            });
        }
    </script>
    <script src="{{ asset('js/TweenMax.min.js')}}"></script>
    <script src="{{ asset('js/TimelineMax.min.js')}}"></script>
    <script src="{{ asset('js/ScrollMagic.min.js')}}"></script>
    <script src="{{ asset('js/animation.gsap.min.js')}}"></script>
    <script src="{{ asset('js/ScrollToPlugin.min.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.js')}}"></script>
    <script src="{{ asset('js/easing.js')}}"></script>
    <script src="{{ asset('js/video.min.js')}}"></script>
    <script src="{{ asset('js/Youtube.min.js')}}"></script>
    <script src="{{ asset('js/parallax.min.js')}}"></script>
    <script src="{{ asset('js/courses.js')}}"></script>
    <script src="{{ asset('js/custom.js')}}"></script>
</body>

</html>