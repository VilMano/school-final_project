@extends('layouts/app')

@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Elearn project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
<link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css')}}">
<link href="{{ asset('css/video-js.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css')}}">
<style>
    .navbar-light .navbar-nav .nav-link:hover,
    .navbar-light .navbar-nav .nav-link:focus {
        color: #27AE60 !important;
    }
</style>


@endsection

@section('content')
<div class="super_container">

    <!-- Menu -->

    <!-- <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
        <div class="menu_close_container">
            <div class="menu_close">
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="search">
            <form action="#" class="header_search_form menu_mm">
                <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
                <button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                    <i class="fa fa-search menu_mm" aria-hidden="true"></i>
                </button>
            </form>
        </div>
        <nav class="menu_nav">
            <ul class="menu_mm">
                <li class="menu_mm"><a href="index.html">Home</a></li>
                <li class="menu_mm"><a href="courses.html">Courses</a></li>
                <li class="menu_mm"><a href="instructors.html">Instructors</a></li>
                <li class="menu_mm"><a href="#">Events</a></li>
                <li class="menu_mm"><a href="blog.html">Blog</a></li>
                <li class="menu_mm"><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
        <div class="menu_extra">
            <div class="menu_phone"><span class="menu_title">phone:</span>(009) 35475 6688933 32</div>
            <div class="menu_social">
                <span class="menu_title">follow us</span>
                <ul>
                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div> -->

    <!-- Home -->

    <div class="home">
        <div class="home_slider_container">

            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">

                <!-- Slider Item -->
                <div class="owl-item">
                    <!-- Background image artist https://unsplash.com/@benwhitephotography -->
                    <div class="home_slider_background" style="background-image:url(images/index.jpg)"></div>
                    <div class="home_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_content text-center">
                                        <!-- <div class="home_logo"><img src="images/home_logo.png" alt=""></div> -->
                                        <div class="home_text">
                                            <div class="home_title">Aprender é crescer</div>
                                            <div class="home_subtitle">Aproveita para crescer connosco!</div>
                                        </div>
                                        <div class="home_buttons">
                                            <!-- <div class="button home_button"><a href="#">learn more<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div> -->
                                            <div class="button home_button"><a href="{{route('all_courses')}}">ver todos os cursos<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Item -->
                <div class="owl-item">
                    <!-- Background image artist https://unsplash.com/@benwhitephotography -->
                    <div class="home_slider_background" style="background-image:url(images/index.jpg)"></div>
                    <div class="home_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_content text-center">
                                        <!-- <div class="home_logo"><img src="images/home_logo.png" alt=""></div> -->
                                        <div class="home_text">
                                            <div class="home_title">Aprender é crescer</div>
                                            <div class="home_subtitle">Maecenas rutrum viverra sapien sed fermentum. Morbi tempor odio eget lacus tempus pulvinar. Praesent vel nisl fermentum, gravida augue ut, fermentum ipsum.</div>
                                        </div>
                                        <div class="home_buttons">
                                            <div class="button home_button"><a href="#">ver mais<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
                                            <div class="button home_button"><a href="{{route('all_courses')}}">ver todos os cursos<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Item -->
                <div class="owl-item">
                    <!-- Background image artist https://unsplash.com/@benwhitephotography -->
                    <div class="home_slider_background" style="background-image:url(images/index.jpg)"></div>
                    <div class="home_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_content text-center">
                                        <!-- <div class="home_logo"><img src="images/home_logo.png" alt=""></div> -->
                                        <div class="home_text">
                                            <div class="home_title">Aprender é crescer</div>
                                            <div class="home_subtitle">Maecenas rutrum viverra sapien sed fermentum. Morbi tempor odio eget lacus tempus pulvinar. Praesent vel nisl fermentum, gravida augue ut, fermentum ipsum.</div>
                                        </div>
                                        <div class="home_buttons">
                                            <div class="button home_button"><a href="#">ver mais<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
                                            <div class="button home_button"><a href="{{route('all_courses')}}">ver todos os cursos<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Featured Course -->

    <div class="featured">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Home Slider Nav -->
                    <div class="home_slider_nav_container d-flex flex-row align-items-start justify-content-between">
                        <div class="home_slider_nav home_slider_prev trans_200"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                        <div class="home_slider_nav home_slider_next trans_200"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Sections -->

    <div class="grouped_sections">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 grouped_col">
                    <!-- <div class="intro">		não utilizado				 -->
                    <div class="intro_post d-flex flex-row align-items-start justify-content-start">
                        <div class="index_image">
                            <img src="{{ asset('images/grouped_sections_1.png')}}" alt="Unavailable">
                        </div>
                    </div>
                </div>

                <!-- Intro -->
                <div class="col-lg-6 grouped_col">
                    <div class="grouped_title">Educação</div>
                    <div class="grouped_subtitle">Na QIFact queremos crescer contigo enquanto cresces connosco. Disponibilizamos cursos de formação para que possas evoluir e preparar-te para a tua vida académica e/ou profissional</div>
                    <div class="intro">

                        <div class="intro_post d-flex flex-row align-items-start justify-content-start">
                            <div class="intro_post_image"><img src="{{ asset('images/grouped_sections_icon_1.png')}}" alt="Unavailable"></div>
                            <div class="intro_post_body">
                                <!-- <div class="intro_post_date">April 02, 2018</div> -->
                                <div class="intro_post_title"><a href="">Aprende várias temáticas</a></div>
                                <!-- <div class="intro_post_author">By <a href="#">William Smith</a></div> -->
                            </div>
                        </div>
                        <div class="intro_post d-flex flex-row align-items-start justify-content-start">
                            <div>
                                <div class="intro_post_image"><img src="{{ asset('images/grouped_sections_icon_2.png')}}" alt="Unavailable"></div>
                            </div>
                            <div class="intro_post_body">
                                <!-- <div class="intro_post_date">April 02, 2018</div> -->
                                <div class="intro_post_title"><a href="">Cria o teu perfil de formando?</a></div>
                                <!-- <div class="intro_post_author">By <a href="#">William Smith</a></div> -->
                            </div>
                        </div>
                        <div class="intro_post d-flex flex-row align-items-start justify-content-start">
                            <div>
                                <div class="intro_post_image"><img src="{{ asset('images/grouped_sections_icon_3.png')}}" alt="Unavailable"></div>
                            </div>
                            <div class="intro_post_body">
                                <!-- <div class="intro_post_date">April 02, 2018</div> -->
                                <div class="intro_post_title"><a href="news.html">Envia-nos um email!</a></div>
                                <!-- <div class="intro_post_author">By <a href="#">William Smith</a></div> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Platform -->
    <div class="platform">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="platform_title text-center">Disponibilizamos</div>
                </div>
            </div>
            <div class="row platform_row">
                <div class="col-lg-4 col-md-6">
                    <div class="platform_image"><img src="{{ asset('images/online_test.png')}}" alt="Unavailable"></div>
                    <div class="platform_title"><a href="#">Testes online</a></div>
                    <div class="platform_subtitle">Lorem Ipsum</div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="platform_image"><img src="{{ asset('images/expert_professor.png')}}" alt="Unavailable"></div>
                    <div class="platform_title"><a href="#">Formadores especializados</a></div>
                    <div class="platform_subtitle">Lorem Ipsum</div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="platform_image"><img src="{{ asset('images/trusted_certification.png')}}" alt="Unavailable"></div>
                    <div class="platform_title"><a href="#">Certificado</a></div>
                    <div class="platform_subtitle">Lorem Ipsum</div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="platform_image"><img src="{{ asset('images/scientific_research.png')}}" alt="Unavailable"></div>
                    <div class="platform_title"><a href="#">Várias áreas científicas</a></div>
                    <div class="platform_subtitle">Lorem Ipsum</div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="platform_image"><span class="platform_helper"><img src="{{ asset('images/audio_video.png')}}" alt="Unavailable"></span></div>
                    <div class="platform_title"><a href="#">Vídeos explicativos</a></div>
                    <div class="platform_subtitle">Lorem Ipsum</div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="platform_image"><img src="{{ asset('images/professional_course.png')}}" alt="Unavailable"></div>
                    <div class="platform_title"><a href="#">Pacotes de cursos</a></div>
                    <div class="platform_subtitle">Lorem Ipsum</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses -->

    <div class="courses">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- Courses Slider -->
                    <div class="courses_slider_container">
                        <div class="owl-carousel owl-theme courses_slider">
                            @foreach($topCourses as $top)
                            <!-- Slider Item -->
                            <div class="owl-item">
                                <div class="course">
                                    <div class="course_image"><img src="{{ asset('images/course_1.jpg')}}" alt=""></div>
                                    <div class="course_body">
                                        <div class="course_title">
                                            <h3 style="text-align:center;"><a href="courses.html">{{$top->name}} </a></h3>
                                        </div>
                                        <div class="course_text text-center mb-4">Maecenas rutrum viverra sapien sed ferm entum. Morbi tempor odio eget lacus tempus pulvinar.</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Courses Slider Nav -->
                        <div class="courses_slider_nav courses_slider_prev trans_200"><i class="fa fa-angle-left" aria-hidden="false"></i></div>
                        <div class="courses_slider_nav courses_slider_next trans_200"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Milestones -->

    <div class="milestones">
        <!-- Background image artis https://unsplash.com/@thepootphotographer -->
        <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/milestones.jpg" data-speed="0.8"></div>
        <div class="container">
            <div class="row milestones_container">

                <!-- Milestone -->
                <div class="col-lg-4 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="{{ asset('images/milestone_1.svg')}}" alt=""></div>
                        <div class="milestone_counter" data-end-value="{{ $totalCourses }}">0</div>
                        <div class="milestone_text">Cursos Online</div>
                    </div>
                </div>

                <!-- Milestone -->
                <div class="col-lg-4 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="{{ asset('images/milestone_2.svg')}}" alt=""></div>
                        <div class="milestone_counter" data-end-value="{{ $totalUsers }}">0</div>
                        <div class="milestone_text">Utilizadores</div>
                    </div>
                </div>
                <!-- Milestone -->
                <div class="col-lg-4 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="{{ asset('images/milestone_4.svg')}}" alt=""></div>
                        <div class="milestone_counter" data-end-value="{{ $totalSpecs }}">0</div>
                        <div class="milestone_text">Especializações</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Video -->

    <div class="video pb-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="video_container_outer">
                        <div class="video_container">
                            <!-- Video poster image artist: https://unsplash.com/@annademy -->
                            <video id="vid1" class="video-js vjs-default-skin" controls data-setup='{ "poster": "images/video.jpg", "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "https://youtu.be/5_MRXyYjHDk"}], "youtube": { "iv_load_policy": 1 } }'>
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Join -->

    <div class="join bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section_title text-center">
                        <h2>Junta-te a Nós, Hoje</h2>
                    </div>
                    <div class="section_subtitle">Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam. Nullam bibendum interdum dui, ac tempor lorem convallis ut</div>
                </div>
            </div>
        </div>
        <div class="button join_button"><a href="/">regista-te<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
    </div>
</div>
@endsection