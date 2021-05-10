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
<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


<style>

	.btn.pill{
	-webkit-border-radius: 16px!important;
	-moz-border-radius: 16px!important;
	border-radius: 16px!important;
	}

	.btn-p{
		text-decoration:none!important;
		color: white!important;
		font-size:12px!important;
		font-weight:bold!important;
		padding:0 15px!important;
		line-height:32px!important;
		height: auto!important;
		display:inline-block!important;
		text-align:center!important;
		background-color: #27AE60!important;
	}

	.mandatory {
		color: red;
	}

	.home_background {
		background: rgba(255, 255, 255, .6);
	}

	.home_container {
		bottom: 200px;
	}

	.home_title {
		color: #44425a;
	}

	.row {
		margin-bottom: 50px;

	}

	.section_subtitle {
		margin-top: 30px;
	}

	.courses {
		padding-top: 70px;
		padding-bottom: 0px;
	}

	#course_form input,
	textarea {
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
		resize: vertical
			/* Allow the user to vertically resize the textarea (not horizontally) */
	}

	#question_form input,
	textarea {
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
		resize: vertical
			/* Allow the user to vertically resize the textarea (not horizontally) */
	}

	#lesson_form input,
	textarea {
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
		resize: vertical
			/* Allow the user to vertically resize the textarea (not horizontally) */
	}

	#course_form_submit {
		background-color: #27AE60;
		color: white;
		padding: 12px 20px;
		/* border: none; */
		cursor: pointer;
		width: 25%;
		float: right;
		clear: both;
	}

	.contact select {
		margin-left: 10px;
	}

	.collapsible,
	.collapsible_ajax {
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

	.active,
	.collapsible:hover,
	.collapsible_ajax:hover {
		background-color: #ccc;
	}

	#demo,
	#add_demo,
	#quiz_demo,
	#question_demo {
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

	.collapsible_ajax:after {
		content: '\02193';
		/* Unicode character for "plus" sign (+) */
		line-height: 25px;
		font-size: 30px;
		color: #27AE60;
		float: right;
		margin-left: 5px;
	}

	/* .collapsible_ajax .collapse{
		content: "\02796";
		line-height: 25px;
		font-size: 30px;
		color: #27AE60; 
	} */

	input[type="radio"]+.label-text:before {
		content: "\f10c";
		font-family: "FontAwesome";
		speak: none;
		font-style: normal;
		font-weight: normal;
		font-variant: normal;
		text-transform: none;
		line-height: 1;
		-webkit-font-smoothing: antialiased;
		width: 1em;
		display: inline-block;
		margin-right: 5px;
	}

	input[type="radio"]:checked+.label-text:before {
		content: "\f192";
		color: #8e44ad;
		animation: effect 250ms ease-in;
	}

	input[type="radio"]:disabled+.label-text {
		color: #aaa;
	}

	input[type="radio"]:disabled+.label-text:before {
		content: "\f111";
		color: #ccc;
	}


	@keyframes effect {
		0% {
			transform: scale(0);
		}

		25% {
			transform: scale(1.3);
		}

		75% {
			transform: scale(1.4);
		}

		100% {
			transform: scale(1);
		}
	}
</style>

@endsection

@section('content')
<div class="super-container">
	<div class="home">
		<!-- Background image artist https://unsplash.com/@thepootphotographer -->
		<div class="home_background parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('images/building_block.png') }}"></div>
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
				<div class="col-lg-12">
					<!-- offset-lg-1 -->
					<div class="section_title text-center">
						<h2>Gerir curso</h2>
					</div>
					<!-- <div class="section_subtitle">{{$course->name}}</div> -->
				</div>
			</div>

			<!-- 1st row edit curso-->
			<div class="row">

				<div class="col-lg-6 grouped_col">

					<!-- <button type="button" class="collapsible">Editar curso</button> -->
					<div class="content">
						<div class="contact d-flex flex-row align-items-start justify-content-start">
							<form id="course_form" action="/admin-courses/courses/{{$course->id}}" method="POST" enctype="multipart/form-data">
								@csrf
								<!-- perguntar andré se csrf actua em todos os campos -->
								@method('PUT')
								@if($errors->any())
								<div class="alert alert-danger">
									<ul>
										<li>Dados inseridos incorretamente</li>
									</ul>
								</div>
								@endif
								<label for="fname">Nome:</label><span class="mandatory-name mandatory"></span>
								<input type="text" id="fname" name="name" required value="{{$course->name}}">

								<label for="lang">Linguagem:</label><span class="mandatory-lang mandatory"></span>
								<input type="text" id="lang" name="language" required value="{{$course->language}}">

								<label for="ccost">Preço (€):</label><span class="mandatory-cost mandatory"></span>
								<input type="number" id="ccost" name="cost" required value="{{$course->cost}}"> <!-- assegurar formato correcto c JS -->

								<label for="desc">Descrição</label>
								<textarea id="desc" name="description" required style="height:100px">{{$course->description}}</textarea>

								<label for="image">Imagem</label>
								<input type="file" id="image" name="image_url" required class="btn btn-success" value="{{$course->image_url}}" placeholder="">

								<label for="pdf">Certificado</label>
								<input type="file" id="pdf" name="certificate" required class="btn btn-success" value="{{$course->certificate}}" placeholder="">
								<!-- <input type="submit" class="course_form_submit" value="Guardar">								 -->
							</form>
						</div>
						<div>
							<label>Curso visível: </label>
							@if($course->is_active==0)
							<label class="ml-4"><input type="radio" required class="label-text" form="course_form" name="is_active" value="0" checked>Não</label>
							<label class="ml-4"><input type="radio" required class="label-text" form="course_form" name="is_active" value="1">Sim</label>
							@else
							<label class="ml-4"><input type="radio" required class="label-text" form="course_form" name="is_active" value="0">Não</label>
							<label class="ml-4"><input type="radio" required class="label-text" form="course_form" name="is_active" value="1" checked>Sim</label>
							@endif
						</div>

						<div class="contact d-flex flex-row align-items-start justify-content-start">
							<label class="mt-2" for="level">Nível: </label>
							<select name="level" id="level" required class="btn btn-light mb-2" form="course_form">
								<option value="none" selected disabled hidden>Seleccione</option>
								@foreach ($levels as $level)
								<option value="{{$level->id}}">{{$level->type}}</option>
								@endforeach
							</select>
						</div>

						<div>
							<label>Duração: </label>
							<input type="number" form="course_form" id="duration_number" value="{{$course->duration->number}}" style="width:50px;" name="duration_number" min="1" max="100">
							@foreach ($duration_types as $duration_type)
							<label class="ml-4"><input type="radio" required class="label-text" form="course_form" name="duration_type" value="{{$duration_type->id}}">{{$duration_type->type}}</label>
							@endforeach
						</div>

						<div class="contact d-flex flex-row align-items-start justify-content-start">
							<button class="btn btn-success mt-4 w-100" type="submit" id="course_form_submit" onclick="checkFilled()" form="course_form">Guardar</button>
						</div>
					</div>
				</div>
				<div class="col-lg-6 featured_col mt-1">
					<!-- Background image artist https://unsplash.com/@jtylernix -->
				@if($course->image_url!=null)
					<div class="featured_background mt-5">
						<img style="width:100%;" src="{{ asset($course->image_url) }}" alt="Smiley face">
					</div>
				@else
					<div class="featured_background mt-5">
						<img style="width:100%;"src="{{ asset('images/course_2.jpg') }}" alt="Smiley face">
					</div>
				@endif
				</div>
				<!-- <div class="col-lg-6 grouped_col">					 -->
				<!-- <button type="button" class="collapsible_ajax" data-toggle="collapse" data-target="#demo">Editar curso</button>
					<div id="demo" class="collapse">

								<div class="panel panel-default">
									<div class="panel-heading" style="text-align:center;">
										<h3>Cursos</h3>
									</div>
									<div class="panel-body">
										<div class="form-group">
											<input type="text" class="form-controller" id="search" name="search" placeholder="Pesquise um curso...">
										</div>
										<table class="table table-sm table-bordered table-hover w-auto">
											<thead>
												<tr>
													<th>Nome</th>
													<th>Preço</th>
													<th>Nível</th> 
													<th>Duração</th>
													<th>Tipo de duração</th>
													<th>Idioma</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div> -->
				<!-- </div>
						</div>							 -->
				<!-- <div class="card" style="width: 18rem;">
							<img src="..." class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">Cras justo odio</li>
								<li class="list-group-item">Dapibus ac facilisis in</li>
								<li class="list-group-item">Vestibulum at eros</li>
							</ul>
							<div class="card-body">
								<a href="#" class="card-link">Card link</a>
								<a href="#" class="card-link">Another link</a>
							</div>
						</div> -->
				<!-- </div> -->
			</div>

			<!-- 2nd row edit lessons-->

			<div class="row">

				<div class="col-lg-6 grouped_col">
					<button type="button" class="collapsible_ajax" data-toggle="collapse" data-target="#demo">Ver lições</button>
					<div id="demo" class="collapse">
						<!-- <div class="container">
							<div class="row"> -->
						<!-- <div class="panel panel-default">
									<div class="panel-heading" style="text-align:center;">
										<h3>Cursos</h3>
									</div>
									<div class="panel-body">
										<div class="form-group">
											<input type="text" class="form-controller" id="search" name="search" placeholder="Pesquise um curso...">
										</div>
										<table class="table table-sm table-bordered table-hover w-auto">
											<thead>
												<tr>
													<th>Nome</th>
													<th>Preço</th>
													<th>Nível</th> 
													<th>Duração</th>
													<th>Tipo de duração</th>
													<th>Idioma</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div> -->
						<!-- </div>
						</div>							 -->
						<div class="card text-dark" style="width: 32rem; background-color:#eee;">
							@if($course->lessons->count())
							@foreach($course->lessons as $lesson)
							<div class="card-body">
								<h5 class="card-title">{{$lesson->number}} - {{$lesson->name}}</h5>
							</div>
							<!-- <ul class="list-group list-group-flush">
										<li class="list-group-item"><a href="#" class="card-link">Ver lição</a></li>
									</ul> -->
							<!-- <div class="card-body">
										<a href="#" class="card-link">Card link</a>
										<a href="#" class="card-link">Another link</a>
									</div> -->
							@endforeach
							<a class="btn-p pill" href="/admin-courses/courses/{{$course->id}}/lessons">Editar lições</a>
							@else
							<div class="card-body">
								<h5 class="card-title text-dark">Não tem lições criadas</h5>
							</div>
							@endif
						</div>
					</div>

				</div>

				<div class="col-lg-6 grouped_col">
					<button type="button" class="collapsible_ajax" data-toggle="collapse" data-target="#add_demo">Criar lições</button>
					<div id="add_demo" class="collapse">
						<!-- <div class="container">
							<div class="row"> -->
						<!-- <div class="panel panel-default">
									<div class="panel-heading" style="text-align:center;">
										<h3>Cursos</h3>
									</div>
									<div class="panel-body">
										<div class="form-group">
											<input type="text" class="form-controller" id="search" name="search" placeholder="Pesquise um curso...">
										</div>
										<table class="table table-sm table-bordered table-hover w-auto">
											<thead>
												<tr>
													<th>Nome</th>
													<th>Preço</th>
													<th>Nível</th> 
													<th>Duração</th>
													<th>Tipo de duração</th>
													<th>Idioma</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div> -->
						<!-- </div>
						</div>							 -->
						<div class="card text-white" style="width: 32rem; background-color:#27AE60;">
							<div class="card-body">
								<form id="lesson_form" action="/admin-courses/courses/{{$course->id}}/lessons_store" method="POST">
									@csrf
									<h5 class="card-title" style="color:white;">Quantas lições deseja criar?
										<input type="number" form="lesson_form" style="width:60px;" name="lessons_to_create" min="1" max="20"><input type="submit" style="margin-left:10px; width:65px;" value="Criar">
									</h5>
								</form>
							</div>
						</div>
					</div>

				</div>

			</div>

			<!-- 3rd row edit questions-->

			<div class="row">

				<div class="col-lg-6 grouped_col">
					<button type="button" class="collapsible_ajax" data-toggle="collapse" data-target="#quiz_demo">Ver questionário</button>
					<div id="quiz_demo" class="collapse">
						<!-- <div class="container">
							<div class="row"> -->
						<!-- <div class="panel panel-default">
									<div class="panel-heading" style="text-align:center;">
										<h3>Cursos</h3>
									</div>
									<div class="panel-body">
										<div class="form-group">
											<input type="text" class="form-controller" id="search" name="search" placeholder="Pesquise um curso...">
										</div>
										<table class="table table-sm table-bordered table-hover w-auto">
											<thead>
												<tr>
													<th>Nome</th>
													<th>Preço</th>
													<th>Nível</th> 
													<th>Duração</th>
													<th>Tipo de duração</th>
													<th>Idioma</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div> -->
						<!-- </div>
						</div>							 -->
						<div class="card text-dark" style="width: 32rem; background-color:#eee;">
							@if($course->questions->count())
							@foreach($course->questions as $question)
							<div class="card-body">
								<p class="card-title">{{$question->number}} - {{$question->body}}</p>
							</div>
							<!-- <ul class="list-group list-group-flush">
										<li class="list-group-item"><a href="#" class="card-link">Ver lição</a></li>
									</ul> -->
							<!-- <div class="card-body">
										<a href="#" class="card-link">Card link</a>
										<a href="#" class="card-link">Another link</a>
									</div> -->
							@endforeach
							<a class="btn-p pill" href="/admin-courses/courses/{{$course->id}}/questions">Editar questões</a>
							@else
							<div class="card-body">
								<h5 class="card-title text-dark">Não tem questões criadas</h5>
							</div>
							@endif
						</div>
					</div>

				</div>

				<div class="col-lg-6 grouped_col">
					<button type="button" class="collapsible_ajax" data-toggle="collapse" data-target="#question_demo">Criar questões</button>
					<div id="question_demo" class="collapse">
						<!-- <div class="container">
							<div class="row"> -->
						<!-- <div class="panel panel-default">
									<div class="panel-heading" style="text-align:center;">
										<h3>Cursos</h3>
									</div>
									<div class="panel-body">
										<div class="form-group">
											<input type="text" class="form-controller" id="search" name="search" placeholder="Pesquise um curso...">
										</div>
										<table class="table table-sm table-bordered table-hover w-auto">
											<thead>
												<tr>
													<th>Nome</th>
													<th>Preço</th>
													<th>Nível</th> 
													<th>Duração</th>
													<th>Tipo de duração</th>
													<th>Idioma</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div> -->
						<!-- </div>
						</div>							 -->
						<div class="card text-white" style="width: 32rem; background-color:#27AE60;">
							<div class="card-body">
								<form id="question_form" action="/admin-courses/courses/{{$course->id}}/questions_store" method="POST">
									@csrf
									<h5 class="card-title" style="color:white;">Quantas questões deseja criar?
										<input type="number" form="question_form" style="width:60px;" name="questions_to_create" min="1" max="20"><input type="submit" style="margin-left:10px; width:65px;" value="Criar">
									</h5>
								</form>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>
	</div>
</div>
<!-- <script type="text/javascript">
	$('#search').on('keyup',function(){
		$value=$(this).val();
		if($value=="")
			return $('tbody').html('');
		$.ajax({
			type: 'get',
			url: '{{URL::to('search')}}',
			data:{'search':$value},
			success:function(data){
				$('tbody').html(data);
			}
		});
	})
</script>
<script>
	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script> -->
<!-- <script>
	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
		coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.maxHeight){
			content.style.maxHeight = null;
			} else {
			content.style.maxHeight = content.scrollHeight + "px";
			}
		});
	}
</script> -->



@endsection
@section('scripts')
<script>
	$(document).ready(function() {
		let name = $('#fname').val();
		let lang = $('#lang').val();
		let price = $('#ccost').val();
		$('.mandatory-name').html('');
		$('.mandatory-lang').html('');
		$('.mandatory-cost').html('');

		$('#course_form_submit').onclick(checkFilled());
	});

	function checkFilled() {
		let name = $('#fname').val();
		let lang = $('#lang').val();
		let price = $('#ccost').val();
		if (name == null || name == "") {
			$('.mandatory-name').html('*');
		} else {
			$('.mandatory-name').html('');
		}
		if (lang == null || lang == "") {
			$('.mandatory-lang').html('*');
		} else {
			$('.mandatory-lang').html('');
		}
		if (price == null || price == "") {
			$('.mandatory-cost').html('*');
		} else {
			$('.mandatory-cost').html('');
		}
	}
</script>
@endsection