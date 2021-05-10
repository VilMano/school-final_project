@extends('layouts/app')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css')}}">
<script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
<link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/video-js.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/courses.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/courses_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css')}}">
<meta name="_token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


<style>
    /* .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    } */

    /* .active, .accordion:hover {
        background-color: #ccc; 
    } */

    /* .panel {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;
    } */
	.mandatory{
		color: red;
	}
    .home_background{
        background: rgba(255, 255, 255, .6);
    }
    .home_container{
        bottom:200px;
    }
    .home_title{
        color: #44425a;
    }
	.row{
		margin-bottom: 50px;
	
	}
	.section_subtitle{
		margin-top: 30px;
	}
	.courses{
		padding-top: 70px;
    	padding-bottom: 70px;
	}
	#lesson_form input, textarea {
		width: 100%;
		/* Full width */
		padding: 12px;
		/* Some padding */
		border: 1px solid #ccc;
		/* Gray border */
		border-radius: 4px;
		/* Rounded borders */
		box-sizing: border-box;
		/* Make sure that padding and width stays in place */
		margin-top: 10px;
		/* Add a top margin */
		margin-bottom: 16px;
		/* Bottom margin */
		resize: vertical/* Allow the user to vertically resize the textarea (not horizontally) */

	}
	#option_form input, textarea {
		width: 100%;
		/* Full width */
		padding: 12px;
		/* Some padding */
		border: 1px solid #ccc;
		/* Gray border */
		border-radius: 4px;
		/* Rounded borders */
		box-sizing: border-box;
		/* Make sure that padding and width stays in place */
		margin-top: 10px;
		/* Add a top margin */
		margin-bottom: 16px;
		/* Bottom margin */
		resize: vertical/* Allow the user to vertically resize the textarea (not horizontally) */

	}
	#lesson_form_submit{
		background-color: #27AE60;
		color: white;
		padding: 12px 20px;
		/* border: none; */
		cursor: pointer;
		width: 25%;
		float: center;
		clear: both;
	}
	#option_form_submit{
		background-color: #27AE60;
		color: white;
		padding: 12px 20px;
		/* border: none; */
		cursor: pointer;
		width: 25%;
		float: center;
		clear: both;
	}
	.contact select{
		margin-left:10px;
	}
	/* .collapsible, .collapsible_ajax {
		background-color: #eee;
		color: #444;
		cursor: pointer;
		padding: 18px;
		width: 100%;
		border: none;
		text-align: left;
		outline: none;
		font-size: 15px;
		margin-top:20px;
	} */
	
	/* .active, .collapsible:hover, .collapsible_ajax:hover {
		background-color: #ccc;
	} */

	#demo, #add_demo, #quiz_demo, #question_demo {
		margin-top: 20px;
		padding: 0 18px;
		background-color: white;
		overflow: hidden;
		transition: max-height 0.2s ease-out;
	}
	.content {
		margin-top: 20px;
		padding: 0 18px;
		background-color: white;
		/* max-height: 0; */
		overflow: hidden;
		transition: max-height 0.2s ease-out;
	}
	/* .collapsible:after {
		content: '\02795'; 
		font-size: 13px;
		color: white;
		float: right;
		margin-left: 5px;
	} */
	/* .collapsible_ajax:after
	.active:after {
		content: "\2796"; 
	} */

</style>

@endsection

@section('content')
<div class="super-container">
    <div class="home">
		<!-- Background image artist https://unsplash.com/@thepootphotographer -->
		<div class="home_background parallax_background parallax-window" data-parallax="scroll" data-image-src="images/building_block.png" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">Gestão de cursos</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="courses">
		<div class="container">
			<div class="row">
				<div class="col-lg-12"> <!-- offset-lg-1 -->
					<div class="section_title text-center">
						<h2>{{$course->name}}</h2>
					</div>
					<div class="section_subtitle">Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam. Nullam bibendum interdum dui, ac tempor lorem convallis ut</div>
				</div>
            </div>
            
            <div class="row">
				<div class="col-lg-12 grouped_col">
					@if(!$course->lessons->count())
					<h4 style="text-align: center">Não tem lições definidas para este curso</h4>
					@else
					<div class="accordion" id="accordionExample">
						@foreach($lessons as $lesson)
						<div class="card">
							<div class="card-header" id="headingOne">
								<h2 class="mb-0">
									<button class="btn btn-link" style="color:#27AE60" type="button" data-toggle="collapse" data-target="#collapse{{$lesson->number}}" aria-expanded="true" aria-controls="collapse{{$lesson->number}}">
										Lição {{$lesson->number}}
									</button>
								</h2>
							</div>

							<div id="collapse{{$lesson->number}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									<div class="row" style="margin-bottom:30px;"> 
										<div class="col-lg-12 grouped_col">
											<div class="flex-row align-items-center justify-content-center">
												<form id="lesson_form" action="/admin-courses/courses/{{$course->id}}/lessons/{{$lesson->id}}" method="POST">
												@csrf
												@method('PUT')
													@if($errors->any())
													<div class="alert alert-danger">
														<ul>
															<li>Dados inseridos incorretamente</li>
														</ul>
													</div>
													@endif
													<label for="desc">Título da lição:</label><span class="mandatory-desc mandatory"> *</span>
													<input type="text" id="desc" name="name" required style="width:100%;" value="{{$lesson->name}}">
													<label for="dest">Vídeo da lição:</label><span class="mandatory-dest mandatory"> *</span>
													<input type="text" id="dest" name="video_url" required style="width:100%;" value="{{$lesson->video_url}}">
													@if($lesson->is_active==0)
													<label class="radio-inline"><input type="radio" style="width:50px;" name="is_active" value="0" checked>Inactiva</label>
													<label class="radio-inline"><input type="radio" style="width:50px;" name="is_active" value="1">Activa</label>
													@else
													<label class="radio-inline"><input type="radio" style="width:50px;" required name="is_active" value="0">Inactiva</label>
													<label class="radio-inline"><input type="radio" style="width:50px;" required name="is_active" value="1" checked>Activa</label>
													@endif
														<div class="d-flex flex-row align-item-center justify-content-center">
															<input type="submit" style="width:150px;" id="lesson_form_submit" value="Guardar lição">
														</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						<!-- <div class="card">
							<div class="card-header" id="headingTwo">
								<h2 class="mb-0">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Collapsible Group Item #2
									</button>
								</h2>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
								<div class="card-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								</div>
							</div>
						</div> -->
					</div>
					@endif
				</div>
            </div>
			<!-- 
			Pagination
			<div class="row featured_row" style="margin-top:0px;">
				<div class="col-lg-6 featured_col">
					<div class="featured_content">
						<div class="featured_header d-flex flex-row align-items-center justify-content-start">
							<div class="featured_tag"><a href="#">STATS 2</a></div>
						</div>
						<div class="featured_title">
						</div>
						<div class="featured_text">Maecenas rutrum viverra sapien sed fermentum. Morbi tempor odio eget lacus tempus pulvinar. Donec vehicula efficitur nibh, in pretium nulla interdum lacus vehicula efficitur nibh, in pretiumvehicula efficitur nibh, in pretium tempus non.</div>
						<div class="featured_footer d-flex align-items-center justify-content-start">
							<div class="featured_author_image"><img src="images/featured_author.jpg" alt=""></div>
							<div class="featured_author_name">By <a href="#">James S. Morrison</a></div>
							<div class="featured_sales ml-auto"><span>352</span> Sales</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 featured_col">
					<div class="featured_content">
						<div class="featured_header d-flex flex-row align-items-center justify-content-start">
							<div class="featured_tag"><a href="#">STATS 2</a></div>
						</div>
						<div class="featured_title">
						</div>
						<div class="featured_text">Maecenas rutrum viverra sapien sed fermentum. Morbi tempor odio eget lacus tempus pulvinar. Donec vehicula efficitur nibh, in pretium nulla interdum lacus vehicula efficitur nibh, in pretiumvehicula efficitur nibh, in pretium tempus non.</div>
						<div class="featured_footer d-flex align-items-center justify-content-start">
							<div class="featured_author_image"><img src="images/featured_author.jpg" alt=""></div>
							<div class="featured_author_name">By <a href="#">James S. Morrison</a></div>
							<div class="featured_sales ml-auto"><span>352</span> Sales</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row courses_row" id="courses">


			</div> -->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
        panel.style.display = "none";
        } else {
        panel.style.display = "block";
        }
    });
    }
</script> -->

<script>
	$(document).ready(function() {
		let name = $('#desc').val();
		let video = $('#dest').val();
		$('.mandatory-desc').html('');
		$('.mandatory-dest').html('');

		$('#lesson_form_submit').onclick(checkFilled());
	});

	function checkFilled() {
		let name = $('#desc').val();
		let video = $('#dest').val();
		if (name == null || name == "") {
			$('.mandatory-desc').html('*');
		} else {
			$('.mandatory-desc').html('');
		}
		if (video == null || video == "") {
			$('.mandatory-dest').html('*');
		} else {
			$('.mandatory-dest').html('');
		}
	}
</script>

@endsection