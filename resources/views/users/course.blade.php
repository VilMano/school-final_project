@extends('layouts/app')
@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Elearn project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
<link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css')}}">
<link href="{{ asset('css/video-js.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/courses.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/courses_responsive.css')}}">
<style>

.video {
    padding-top: 40px!important;
    background: #eee!important;
}

    .bg-custom {
        background-color: #f0f0f0 !important;
    }

    .collapsible {
        background-color: #ddd;
        color: rgba(0, 0, 0, .01) 0 0 1px;
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
        text-decoration: none;
        background-color: transparent;
    }
</style>
@endsection
@section('content')
<div class="super_container">
    <div class="home">
        <div class="home_background parallax_background parallax-window" style="background-image: url({{ asset('images/courses.jpg') }});" data-parallax="scroll" data-speed="0.8"></div>
        <div class="home_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content text-center">
                            <div class="home_title text-white">{{$course->name}}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="home_content text-center">
                            <div class="mt-4"></div>
                            @if($hasLessons)
                            <button href="#courses" class="btn btn-dark"><a class="text-white"  data-toggle="collapse" data-target="#collapseLesson{{$lessons[0]->id}}" aria-expanded="false" aria-controls="collapseExample">Iniciar curso</a></button>
                            @else
                            <button disabled class="btn btn-dark">Iniciar curso</button>
                            @endif
                        </div>
                    </div>
                </div>


                <!--glyphicon glyphicon-arrow-down-->
            </div>
        </div>
    </div>

    <div class="container dropdown-content mb-2" id="courses">
        @if($hasLessons)
        @foreach($lessons as $lesson)
        <div class="row">
            <button class="col-12 collapsible pb-4 pt-4 text-center" data-toggle="collapse" data-target="#collapseLesson{{$lesson->id}}" aria-expanded="false" aria-controls="collapseExample">
                <strong>{{$lesson->name}}</strong>
            </button>
        </div>
        <div class="row collapse" id="collapseLesson{{$lesson->id}}">
            <div class="video mb-4">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="video_container_outer mb-4">
                                <div class="video_container">
                                    <!-- Video poster image artist: https://unsplash.com/@annademy -->
                                    <video id="vid1" class="video-js vjs-default-skin" controls data-setup='{ "poster": "{{ asset("images/video.jpg")}}", "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{$lesson->video_url}}"}], "youtube": { "iv_load_policy": 1 } }'>
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-12 mt-4 text-center">
            <p>Ainda não estão disponiveis aulas para este curso</p>
        </div>
        @endif
        <div class="row">
            <button class="col-12 collapsible pb-4 pt-4 text-center" data-toggle="collapse" data-target="#collapseQuiz" aria-expanded="false" aria-controls="collapseExample">
                <strong>Questionário</strong>
            </button>
        </div>
        <div class="row collapse" id="collapseQuiz">
            <h1 class="text-center mt-4 mb-4 text-success">Responda às seguintes perguntas</h1>
            <form action="/courses/answers" method="POST">
                @csrf
                @method('PUT')
                @foreach($questions as $question)
                <div class="mb-4 card">
                    <h3 class="text-center mt-4">{{$question->body}}</h3>
                    <fieldset id="group{{$question->id}}">
                        @foreach($question->question_options as $option)
                        <div class="custom-control custom-checkbox mb-3 ml-4 p-3 bg-custom text-dark">
                            <label><input type="radio" id="radio" name="group{{$question->id}}" value="{{$option->id}}" required><span class="ml-2">{{$option->body}}</span></label>
                        </div>
                        @endforeach
                    </fieldset>
                </div>
                @endforeach
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Submeter respostas</button>
                </div>
        </div>

        </form>
    </div>
</div>
</div>
</div>
@endsection
@section('scripts')
@endsection