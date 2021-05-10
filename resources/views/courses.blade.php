@extends('layouts/app')
@section('head')
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Elearn project">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
<link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/video-js.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/courses.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/courses_responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css')}}">

<style>

#snackbar {
  visibility: hidden; /* Hidden by default. Visible on click */
  min-width: 250px; /* Set a default minimum width */
  margin-left: -125px; /* Divide value of min-width by 2 */
  background-color: #333; /* Black background color */
  color: #fff; /* White text color */
  text-align: center; /* Centered text */
  border-radius: 2px; /* Rounded borders */
  padding: 16px; /* Padding */
  position: fixed; /* Sit on top of the screen */
  z-index: 1; /* Add a z-index if needed */
  left: 50%; /* Center the snackbar */
  bottom: 30px; /* 30px from the bottom */
}

/* Show the snackbar when clicking on a button (class added with JavaScript) */
#snackbar.show {
  visibility: visible; /* Show the snackbar */
  /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
  However, delay the fade out process for 2.5 seconds */
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

/* Animations to fade the snackbar in and out */
@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
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

	<!-- COMENTADO POIS NAO APARECE NA VIEW -->

	<!-- Header Search Panel
	<div class="header_search_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
						<form action="#" class="header_search_form">
							<input type="search" class="search_input" placeholder="Search" required="required">
							<button class="header_search_button d-flex flex-column align-items-center justify-content-center">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</header>

	Menu

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
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
		<!-- Background image artist https://unsplash.com/@thepootphotographer -->
		<div class="home_background parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('images/courses.jpg')}}" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">Cursos</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="/">Início</a></li>
									<li>Cursos</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Courses -->

	 <div class="courses">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="section_title text-center">
						<h2>Choose your course</h2>
					</div>
					<div class="section_subtitle">Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam. Nullam bibendum interdum dui, ac tempor lorem convallis ut</div>
				</div>
			</div>

			<!-- Pesquisa/Filtros -->

			<form action=" {{ route('all_courses')}} " method="GET" style="width:100%; margin-top:100px;">
				<div class="row">
					<div class="col-lg-2">
						<input id="name-search" name="name_search" type="text" class="form-control" placeholder="nome/categoria">
					</div>
					<div class="col-lg-2">
						<select id="duration-search" name="duration_search" class="form-control">
							<option>Duração</option>
							@foreach($duration_type as $duration)
							<option> {{$duration->type}} </option>
							@endforeach
						</select>
					</div>
					<div class="col-lg-1">
						<select id="duration_num-search" name="duration_num_search" class="form-control">
							<option>---</option>
							@foreach($durations as $duration)
							<option> {{$duration->number}} </option>
							@endforeach
						</select>
					</div>
					<div class="col-lg-2">
						<select id="cost-search" name="cost_search" class="form-control">
							<option>Preço</option>
							<option>Ascendente</option>
							<option>Descendente</option>
						</select>
					</div>
					<div class="col-lg-2">
						<select id="level-search" name="level_search" class="form-control">
							<option>Nível</option>
							@foreach($levels as $level)
							<option> {{$level->type}} </option>
							@endforeach
						</select>
					</div>
					<div class="col-lg-1">
						<button id="search_btn" class="btn btn-success">Procurar</button>
					</div>
					<div class="col-lg-1">
						<button class="btn btn-danger" id="delete_btn_search">Remover filtros</button>
					</div>
				</div>
			</form>


			<!-- Featured Course -->
			<div class="row featured_row">
				<div class="col-lg-6 featured_col">
					<div class="featured_content">
						<div class="featured_header d-flex flex-row align-items-center justify-content-start">
							<div class="btn btn-success"><a>Curso mais frequentado</a></div>
							<div class="featured_price ml-auto">Preço:<span> {{$topCourse[0]->course->cost}}€</span></div>
						</div>
						<div class="featured_title">
							<h3>{{$topCourse[0]->course->name}}</h3>
						</div>
						<div class="featured_text">Maecenas rutrum viverra sapien sed fermentum. Morbi tempor odio eget lacus tempus pulvinar. Donec vehicula efficitur nibh, in pretium nulla interdum lacus vehicula efficitur nibh, in pretiumvehicula efficitur nibh, in pretium tempus non.</div>
						<div class="featured_footer d-flex align-items-center justify-content-start">
							<div class="featured_author_image"><img src="{{ asset('images/featured_author.jpg')}}" alt=""></div>
							<div class="featured_author_name">By <a href="#">James S. Morrison</a></div>
							<div class="featured_sales ml-auto"><span>375</span> Sales</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 featured_col">
					<!-- Background image artist https://unsplash.com/@jtylernix -->
					<div class="featured_background" style="background-image:url({{ asset('images/featured.jpg')}})"></div>
				</div>
			</div>
			<div class="row courses_row" id="courses">
				<!-- Course -->
				@foreach($courses as $course)
					<div class="col-lg-4 col-md-6">
					<form id="myForm">
						<div class="course" id="course">
							@if($course->image_url == null)
							<div class="course_image"><img src="{{ asset('images/defaultcourse.jpg')}}" alt=""></div>
							@else
							<div class="course_image"><img src="{{ asset($course->image_url) }}" alt=""></div>
							@endif
							<div class="course_body">
								<div class="course_title">
									<h3 style="text-align:center;"><a href="courses.html" name="name"> {{$course->name}} </a></h3>
								</div>
								<div class="course_text text-center mb-4">Maecenas rutrum viverra sapien sed ferm entum. Morbi tempor odio eget lacus tempus pulvinar.</div>
								<div class="d-flex justify-content-center">
									<div class="course_tag" style="display:inline-block;"><a href="#" data-toggle="collapse" data-target="#collapseDiv-{{$course->id}}" aria-expanded="false" aria-controls="collapseDiv">Ver mais</a></div>
									@guest
									<div class="course_tag" style="display:inline-block;"><a href="/login">Comprar</a></div>
									@else
									<button class="course_tag btn_buy_class" style="display:inline-block;" onclick="event.preventDefault(); addToCart({{$course->id}});">Comprar</button>
									@endguest
								</div>
								<div class="course_footer collapse" id="collapseDiv-{{$course->id}}">
									<div class="course_footer d-flex flex-column align-items-center justify-content-center">
										@if($course->number > 1)
										<div class="course_details" name="duration">Duração: {{$course->number}} {{$course->type}}s </div>
										@else
										<div class="course_details" name="duration">Duração: {{$course->number}} {{$course->type}} </div>
										@endif
										<div class="course_details" name="level">Nível: {{$course->level}} </div>
										<div class="course_details" name="language">Idioma: {{$course->language}} </div>
										<div class="course_details" id="cost" name="cost">Preço:<span style="color: green; font-weight:bold;" name="cost">{{$course->cost}} €</span> </div>
									</div>
								</div>
							</div>
						</div>
						</form>
					</div>
				@endforeach
			</div>
			<!-- Pagination -->
			{{ $courses->links() }}
		</div>
		
		<div id="snack">
		
		</div>
		
	<!-- </div> -->
	@endsection
	@section('scripts')
	<script>
		$("#duration_num-search").hide();
		

		if ((window.location.href === "http://127.0.0.1:8000/courses") || (window.location.href === "http://127.0.0.1:8000/courses?name_search=&duration_search=Dura%C3%A7%C3%A3o&duration_num_search=---&cost_search=Pre%C3%A7o&level_search=N%C3%ADvel") || (window.location.href === "http://127.0.0.1:8000/courses?")) {
			$("#delete_btn_search").hide();
		} else {
			$("#delete_btn_search").show();
		}

		$("#duration-search").click(function() {
			$("#duration_num-search").show();
		});

		
	</script>
	@endsection