@extends('layouts/app')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
<link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/courses.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/courses_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css')}}">
<style>
    .collapsible {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        margin-top: 20px;
    }

    #course_form input,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 10px;
        margin-bottom: 16px;
        resize: vertical;
    }

    .course_tag a {
        display: block;
        line-height: 31px;
        font-size: 14px;
        color: #FFFFFF;
        font-weight: 400;
        text-align: center;
    }

    select {
        border-radius: 0 !important;
    }

    input {
        border-radius: 0 !important;
    }

    button {
        border-radius: 0 !important;
    }

    .page-link {
        color: black !important;
    }

    .page-item.active .page-link {
        background-color: #27ae60 !important;
        border-color: #27ae60 !important;
    }

    a,
    a:hover,
    a:visited,
    a:active,
    a:link {
        text-decoration: none;
        -webkit-font-smoothing: antialiased;
        -webkit-text-shadow: rgba(0, 0, 0, .01) 0 0 1px;
        text-shadow: rgba(0, 0, 0, .01) 0 0 1px;
    }

    a {
        color: #3490dc;
        text-decoration: none!important;
        background-color: transparent;
    }

    .bg-certificate {
        background-color: #f2f1f8;
    }
</style>
@endsection
@section('content')
<div class="super_container">
    <div class="home">
        <div class="home_background parallax_background parallax-window" data-parallax="scroll" style="background-image: url({{ asset('images/user_courses.jpg')}});" data-speed="0.8"></div>
        <div class="home_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content text-center">
                            <div class="home_title">Dashboard</div>
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="/">Dashboard</a></li>
                                    <li>User</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container dropdown-content mb-2">

        <div class="row">
            <button class="col-12 collapsible pb-4 pt-4 text-center" data-toggle="collapse" data-target="#collapseCourses" aria-expanded="false" aria-controls="collapseExample">
                <strong>Cursos</strong>
            </button>
        </div>

        <div class="row collapse" id="collapseCourses">
            @if($hasCourses)
            @foreach($courses as $course)
            @if($course->is_permitted)
            <form action="/courses/{{$course->id}}" method="GET">
                <div class="row featured_row mt-4">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5 featured_col">
                        <div class="featured_content">
                            <div class="featured_title">
                                <h3>{{$course->name}}</h3>
                            </div>
                            <div class="featured_text">{{$course->description}}</div>
                            <div class="featured_footer d-flex align-items-center justify-content-start">
                                <button style="border:none;" class="featured_tag"><a style="color:white;">Abrir curso</a></button style="border:none;">
                                @if($course->tests_taken != null)
                                @if($course->grade < 50) <div class="featured_sales ml-auto text-danger"><strong>Nota:</strong> {{$course->grade}}% <p><span>Pode repetir o questionário</span></p></div>
                            @else
                            <div class="featured_author_name text-success"><strong>Nota:</strong> {{$course->grade}}%</div>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 featured_col">
                    <!-- Background image artist https://unsplash.com/@jtylernix -->
                    <div class="featured_background" style="background-image:url({{ asset('images/featured.jpg') }})"></div>
                </div>
                <div class="col-lg-1"></div>
            </form>
        </div>
        @endif
        @endforeach
        @else

        @if($isCourseActive)
        <div class="col-12 mt-4 text-center">
            <p>Não existem cursos</p>
        </div>
        @else
        <div class="col-12 mt-4 text-center">
            <p>Este curso não pode ser visualizado de momento</p>
        </div>
        @endif
        @endif

    </div>
    <div class="container dropdown-content mb-2">
        <div class="row">
            <button class="col-12 collapsible pb-4 pt-4 text-center" data-toggle="collapse" data-target="#collapseCertificate" aria-expanded="false" aria-controls="collapseExample">
                <strong>Certificados</strong>
            </button>
        </div>
        <div class="row collapse" id="collapseCertificate">
            @foreach($courses as $course)
            @if($course->certificate != null && $course->grade > 50)
            <div class="p-3 mb-2 mt-2 ml-4 mr-4 d-flex justify-content-between bg-certificate bd-highlight mb-3">
                <div class="p-2 bd-highlight"><img src="{{ asset('/images/logo_qifact_2.png') }}"> {{$course->name}}</div>
                <div class="p-2 bd-highlight"></div>
                <div class="p-2 bd-highlight"><a href="/certificate/{{$course->id}}"><img height="20px" src="{{ asset('/images/download.svg') }}"></a></div>
            </div>
            @endif
            @endforeach

            @if($finishedCourse->date_completion == null)
            <div class="col-12 mt-4 text-center">
                <p>Não tem certificados <a href="/courses" style="color:rgba(0, 0, 0, .01) 0 0 1px;!important">(complete um curso para o obter)</a></p>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
@endsection