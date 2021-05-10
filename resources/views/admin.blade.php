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

	.hover_img_green:hover{
		background-color: green!important;
		border-radius: 50%;
	}

	.hover_img_red:hover{
		background-color: red!important;
		border-radius: 50%;
	}

	.a_table:hover{
		color:rgba(0, 0, 0, .6)!important;
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

	#demo {
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
		max-height: 0;
		overflow: hidden;
		transition: max-height 0.2s ease-out;
	}

	.collapsible:after {
		content: '\02193';
		/* Unicode character for "plus" sign (+) */
		line-height: 25px;
		font-size: 30px;
		color: #27AE60;
		float: right;
		margin-left: 5px;
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

	/* .active:after {
		content: "\2796"; Unicode character for "minus" sign (-)
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
							<!-- <div class="breadcrumbs">
								<ul>
									<li><a href="/">Início</a></li>
									<li>Cursos</li>
								</ul>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="courses">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="section_title text-center">
						<h2>Criar curso</h2>
					</div>
					<div class="section_subtitle">Suspendisse tincidunt magna eget massa hendrerit efficitur. Ut euismod pellentesque imperdiet. Cras laoreet gravida lectus, at viverra lorem venenatis in. Aenean id varius quam. Nullam bibendum interdum dui, ac tempor lorem convallis ut</div>
				</div>
			</div>

			<!-- <div class="row">
				<div class="col-lg-12">
					<div class="error">
						<h6>houve um erro</h6>
					</div>
				</div>
			</div> -->

			<!-- Course Search -->
			<div class="row">

				<div class="col-lg-6 grouped_col">

					<button type="button" class="collapsible">Criar curso</button>
					<div class="content">
						<div class="contact d-flex flex-row align-items-start justify-content-start">
							<form id="course_form" action="/courses" method="POST" enctype="multipart/form-data">
								@csrf

								@if($errors->any())
								<div class="alert alert-danger">
									<ul>
										<li>Dados inseridos incorretamente</li>
									</ul>
								</div>
								@endif
								<label for="fname">Nome</label>
								<input type="text" id="fname" required name="name" placeholder="Exemplo: HTML">

								<label for="lang">Linguagem</label>
								<input type="text" id="lang" required name="language" placeholder="Exemplo: Português">

								<label for="ccost">Preço (€)</label>
								<input type="text" id="ccost" required name="cost" placeholder="Formato: 0,00"> <!-- assegurar formato correcto c JS -->

								<label for="desc">Descrição</label>
								<textarea id="desc" name="description" required placeholder="Exemplo: O curso de HTML é composto por..." style="height:100px"></textarea>

								<label for="image">Imagem</label>
								<input type="file" class="btn btn-success" required id="image" name="image_url" placeholder="">

								<label for="pdf">Certificado</label>
								<input type="file" id="pdf" required name="certificate" required class="btn btn-success" placeholder="">
								<!-- <input type="submit" class="course_form_submit" value="Guardar">								 -->
							</form>
						</div>
						<div class="contact d-flex flex-row align-items-start justify-content-start">
							<label class="mt-2" for="level">Nível: </label>
							<select name="level" required class="bg-light btn mb-4" id="level" form="course_form">
								<option value="none" selected disabled hidden>Seleccione</option>
								@foreach ($levels_array as $data)
								<option value="{{$data->id}}">{{$data->type}}</option>
								@endforeach
							</select>
						</div>

						<div class="contact d-flex flex-row align-items-start justify-content-start">
							<div class="mr-2 mt-2"> Duração: </div>
							<input type="number" form="course_form" required id="duration_number" name="duration_number" min="1" max="100">
							@foreach ($duration_types_array as $data)
							<label class="ml-4"><input type="radio" required form="course_form" name="duration_type" value="{{$data->id}}"><span class="ml-2">{{$data->type}}</span></label>
							@endforeach
						</div>
						<button class="btn btn-success w-100 mt-4" id="course_form_submit" form="course_form">Guardar</button>
					</div>
				</div>
				<div class="col-lg-6 grouped_col">
					<button type="button" class="collapsible_ajax" data-toggle="collapse" data-target="#demo">Pesquisar curso</button>
					<div id="demo" class="collapse">
						<!-- <div class="container">
							<div class="row"> -->
						<div class="panel panel-default">
							<div class="panel-heading" style="text-align:center;">
								<h3>Cursos</h3>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<input type="text" class="form-control" id="search" name="search" placeholder="Pesquise um curso...">
								</div>
								<div class="table-responsive" id="table-request">
									<table class="table">
										<thead class="thead-dark">
											<tr>
												<th scope="col">Nome</th>
												<th scope="col">Preço</th>
												<th scope="col">Nível</th>
												<th scope="col">Duração</th>
												<th scope="col">Tipo de duração</th>
												<th scope="col">Linguagem</th>
											</tr>
										</thead>
										<tbody id="courses">
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- </div>
						</div>							 -->
					</div>
				</div>
			</div>

			<!-- Featured Course -->
			<div class="row">
				<div class="col-lg-12 grouped_col">
					<div id="courseEN" class="collapseEN">
						<!-- <div class="container">
							<div class="row"> -->
						<div class="panel panel-default">
							<div class="panel-heading mb-4" style="text-align:center;">
								<h3>Inscrições pendentes</h3>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
										<thead class="thead-dark">
											<tr>
												<th scope="col">Utilizador</th>
												<th scope="col">Curso</th>
												<th class="text-right" scope="col">Opções</th>
											</tr>
										</thead>
										<tbody id="requests">
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- </div>
						</div>							 -->
					</div>
				</div>
			</div>

			<div class="row featured_row" style="margin-top:0px;">
				<div class="col-lg-6 featured_col">
					<div class="featured_content">
						<div class="featured_header d-flex flex-row align-items-center justify-content-start">
							<div class="featured_tag"><a href="#">Estatística 2</a></div>
						</div>
						<!-- <div class="featured_title">
						</div>
						<div class="featured_text">Maecenas rutrum viverra sapien sed fermentum. Morbi tempor odio eget lacus tempus pulvinar. Donec vehicula efficitur nibh, in pretium nulla interdum lacus vehicula efficitur nibh, in pretiumvehicula efficitur nibh, in pretium tempus non.</div>
						<div class="featured_footer d-flex align-items-center justify-content-start">
							<div class="featured_author_image"><img src="{{ asset('images/featured_author.jpg')}}" alt=""></div>
							<div class="featured_author_name">By <a href="#">James S. Morrison</a></div>
							<div class="featured_sales ml-auto"><span>352</span> Sales</div>
						</div> -->
					</div>
				</div>
				<div class="col-lg-6 featured_col">
					<div class="featured_content">
						<div class="featured_header d-flex flex-row align-items-center justify-content-start">
							<div class="featured_tag"><a href="#">Estatística 3</a></div>
						</div>
						<!-- <div class="featured_title">
						</div>
						<div class="featured_text">Maecenas rutrum viverra sapien sed fermentum. Morbi tempor odio eget lacus tempus pulvinar. Donec vehicula efficitur nibh, in pretium nulla interdum lacus vehicula efficitur nibh, in pretiumvehicula efficitur nibh, in pretium tempus non.</div>
						<div class="featured_footer d-flex align-items-center justify-content-start">
							<div class="featured_author_image"><img src="{{ asset('images/featured_author.jpg')}}" alt=""></div>
							<div class="featured_author_name">By <a href="#">James S. Morrison</a></div>
							<div class="featured_sales ml-auto"><span>352</span> Sales</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$('#requests').html('');
	getRequests();
});


	$('#search').on('keyup', function() {
		$value = $(this).val();
		if ($value == "")
			return $('#courses').html('');
		$.ajax({
			type: 'get',
			url: '{{URL::to('search')}}',
			data: {
				'search': $value
			},
			success: function(data) {
				$('#courses').html(data);
			}
		});
	})



	function getRequests(){
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
                });
                $.ajax({
                    url: "{{ url('/admin_requests') }}",
                    method: 'get',
                    data: {
                            _token: "{{ csrf_token() }}",
                },
                success: function(data){
					showRequests(data);
					console.log(data);
                },
                error: function(data){
					$('#table-request').html('');
					$('#table-request').append('<div class="text-center mt-2"><label>'+data.responseJSON.error+'</label></div>');
                }
                });
    }


	function showRequests(requests){
		$('#requests').html('');
		let i;
		for(i = 0; i < requests.success.length; i++){
			$('#requests').append('<tr><td>'+requests.success[i].username+'</td><td>'+requests.success[i].name+'</td><td><div class=""><div class="text-right"><form>@csrf @method("put")<img class="hover_img_green" height="15px" src="{{asset("/images/accept.svg")}}" onclick="acceptRequest('+requests.success[i].courseID+','+requests.success[i].userID+')" id="acceptbtn"></form><form>@csrf @method("delete")<img class="hover_img_red" height="12px" src="{{asset("/images/deny.svg")}}" onclick="deleteRequest('+requests.success[i].id+')" id="deletebtn"></a></form></div></div></td></tr>');
		}		
	}

	function acceptRequest(course, user){
		$.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
                });
                $.ajax({
                    url: "{{ url('/admin_request/update') }}",
                    method: 'put',
                    data: {
                            _token: "{{ csrf_token() }}",
							courseID: course,
							userID: user
                },
                success: function(info){
					getRequests();
                },
                error: function(){

                }
                });
	}

	function deleteRequest(id){
		$.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
                });
                $.ajax({
                    url: "{{ url('/request_delete') }}",
                    method: 'delete',
                    data: {
                            _token: "{{ csrf_token() }}",
							courseID: id
                },
                success: function(info){
					getRequests();
                },
                error: function(){

                }
                });
	}


</script>
<script>
	$.ajaxSetup({
		headers: {
			'csrftoken': '{{ csrf_token() }}'
		}
	});
</script>
<script>
	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
		coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.maxHeight) {
				content.style.maxHeight = null;
			} else {
				content.style.maxHeight = content.scrollHeight + "px";
			}
		});
	}
</script>



@endsection