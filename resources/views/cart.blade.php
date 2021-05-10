@extends('layouts/app')
@section('head')
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Elearn project">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
<link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
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

.collapsible{
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
}

#course_form input, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 10px;
    margin-bottom: 16px;
    resize: vertical;
}

.obligatory{
    color: red;
}
</style>
@endsection

@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading" id="title">O seu carrinho</h1>
     </div>
</section>

<div class="container dropdown-content mb-2">
    <div class="row">
        <button class="col-12 collapsible" onclick="updateCartPage()">
            Abrir carrinho
        </button>
    </div>
</div>
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead id="cartHead">
                    </thead>
                    <tbody id="cartBody">                     
                    </tbody>
                    <tbody id="totalRow">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div id="redirectBTN" class="col-sm-12  col-md-6">
                </div>
                <div id="checkoutBTN" class="col-sm-12 col-md-6 text-right">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-2">
        <div class="row">
            <button id="userData" onclick="buildUserInfo();" class="col-12 collapsible">
                Dados de faturação (opcional)
            </button>
            <div class="col-12 grouped_col mt-4">
					<div id="update-info" class="content">
					      
                    </div>
                    <button id="autoFill" class="btn btn-success mt-2" onclick="getUsersInfo()">Preenchimento automático</button>
            </div>
        </div>
</div>
<div id="showSnack">

</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            //button de preenchimento automatico
            $('#autoFill').hide();
            
            $('#userData').click(function(){
                $('#autoFill').show();
            });
            
           $('#autoFill').click(function(){
            let name = $('#fname').val();
            let address = $('#faddress').val();
            let postal_code = $('#fpostalCode').val();
            let city = $('#fcity').val();
            let country = $('#fcountry').val();
            let nif = $('#fnif').val();
            let full_name = splitString(name);
            let first_name = full_name[0];
            let last_name = full_name[1];
            //################################

            //verificar se os campos estao preenchidos, caso nao, class é aplicada
            verifyFields(name, address, postal_code, city, country, nif);
            //################################
           }); 
        });

        //atualiza na database a informacao do user
        function updateUser(){
            $('#showSnack').html('');
            let name = $('#fname').val();
            let address = $('#faddress').val();
            let postal_code = $('#fpostalCode').val();
            let city = $('#fcity').val();
            let country = $('#fcountry').val();
            let nif = $('#fnif').val();
            let full_name = splitString(name);
            let first_name = full_name[0];
            let last_name = full_name[1];
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
                });
                jQuery.ajax({
                url: "{{ url('/shopping_carts/updateUser') }}",
                method: 'put',
                data: {
                    _token: "{{ csrf_token() }}",
                    name: first_name,
                    last_name: last_name,
                    address: address,
                    postal_code: postal_code,
                    city: city,
                    country: country,
                    nif: nif
                },
                success: function(response){
                    console.log(response.success);
                    $('#showSnack').append('<div id="snackbar">'+response.success+'</div>');
                    viewSnack();
                },
                error: function(response){
                    console.log(response.responseJSON.error);
                    $('#showSnack').append('<div id="snackbar">'+response.responseJSON.error+'</div>');
                    viewSnack();
                }
                });
                    
        }
        //################################

        //vai buscar a informacao do user à database
        function getUsersInfo(){
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
                });
                $.ajax({
                    url: "{{ url('/shopping_carts/retrieveInfo') }}",
                    method: 'get',
                    data: {
                            _token: "{{ csrf_token() }}",
                },
                success: function(data){
                    updatePageInfo(data);
                    verifyFields(data.name, data.address, data.postal_code, data.city, data.country, data.nif);
                },
                fail: function(data){
                }
                });
        }
        //################################

        //preenche automaticamente os campos do user
        function updatePageInfo(data){
            $('#update-info').html('');
            data = ifNull(data);
            $('#update-info').append('<div class="contact d-flex flex-row align-items-start justify-content-start"><form id="course_form" action="/shopping_carts/updateUser" method="POST">@csrf @method("PUT")<label><span class="obligatory-name obligatory">*</span> Nome</label><input type="text" id="fname" required name="name" value="'+data.name+ ' ' + data.lastname+'"/><label><span class="obligatory-address obligatory">*</span> Morada </label><input type="text" required id="faddress" name="address" value="'+data.address+'"><label><span class="obligatory-postalCode obligatory">*</span> Código Postal</label><input type="text" required id="fpostalCode" name="postal_code" onkeyup="addHyphen(this)" value="'+data.postal_code+'"><label><span class="obligatory-city obligatory">*</span> Cidade</label><input type="text" required id="fcity" name="city" value="'+data.city+'"/><label><span class="obligatory-country obligatory">*</span> Pais</label><input type="text" required id="fcountry" name="country" value="'+data.country+'"/><label><span class="obligatory-nif obligatory">*</span> NIF</label><input type="text" id="fnif" required name="nif" value="'+data.nif+'"><span>*Se todos os campos estiverem preenchidos, carregue em <strong><a id="toCheckout" style="text-decoration: none; color:#27ae60;" href="#title">CHECKOUT</a></strong></span></br><span class="obligatory" id="obligatory">Todos os campos são obrigatórios</span><div class="contact d-flex flex-row align-items-start justify-content-start"><button id="saveBTN" onclick="event.preventDefault(); updateUser();" class="btn btn-success">Guardar</button></div></form></div> ');
            let name = data.name;
            let address = data.address;
            let postal_code = data.postal_code;
            let city = data.city;
            let country = data.country;
            let nif = data.nif;
            verifyFields(name, address, postal_code, city, country, nif);
        }
        //################################

        //adiciona html com campos para o user preencher
        function buildUserInfo(){
            let name = $('#fname').val();
            let address = $('#faddress').val();
            let postal_code = $('#fpostalCode').val();
            let city = $('#fcity').val();
            let country = $('#fcountry').val();
            let nif = $('#fnif').val();
            $('#update-info').html('');
            $('#update-info').append('<div class="contact d-flex flex-row align-items-start justify-content-start"><form id="course_form" action="/shopping_carts/updateUser" method="POST">@csrf @method("PUT")<label><span class="obligatory-name obligatory">*</span> Nome</label><input type="text" required id="fname" name="name"/><label><span class="obligatory-address obligatory">*</span> Morada </label><input required type="text" id="faddress" name="address"><label><span class="obligatory-postalCode obligatory">*</span> Código Postal</label><input type="text" required id="fpostalCode" name="postal_code" onkeyup="addHyphen(this)"><label><span class="obligatory-city obligatory">*</span> Cidade</label><input type="text" required id="fcity" name="city"/><label><span class="obligatory-country obligatory">*</span> Pais</label><input type="text" required id="fcountry" name="country"/><label><span class="obligatory-nif obligatory">*</span> NIF</label><input type="text" required id="fnif" name="nif"><span>*Se todos os campos estiverem preenchidos, carregue em <strong><a id="toCheckout" style="text-decoration: none; color:#27ae60;" href="#title">CHECKOUT</a></strong></span></br><span class="obligatory" id="obligatory">Todos os campos são obrigatórios</span><div class="contact d-flex flex-row align-items-start justify-content-start"><button id="saveBTN" onclick="event.preventDefault(); updateUser();" class="btn btn-success">Guardar</button></div></form></div>');
            verifyFields(name, address, postal_code, city, country, nif);
        }
        //################################

        function splitString(name){
            let full_name = name.split(" ", 2);
            return full_name;
        }

        function addHyphen (element) {
            let ele = document.getElementById(element.id);
            ele = ele.value.split('-').join('');

            let finalVal = ele.match(/.{1,4}/g).join('-');
            document.getElementById(element.id).value = finalVal;
        }

        //verificar se os campos estao preenchidos, caso nao, class é aplicada
        function verifyFields(name, address, postal_code, city, country, nif){
            //I am not proud of this
            if(name == ''){
                $('.obligatory-name').show();
            }else{
                $('.obligatory-name').hide();
            }

            if(address == ''){
                $('.obligatory-address').show();
            }else{
                $('.obligatory-address').hide();
            }

            if(postal_code == ''){
                $('.obligatory-postalCode').show();
            }else{
                $('.obligatory-postalCode').hide();
            }

            if(city == ''){
                $('.obligatory-city').show();
            }else{
                $('.obligatory-city').hide();
            }

            if(country == ''){
                $('.obligatory-country').show();
            }else{
                $('.obligatory-country').hide();
            }

            if(nif == ''){
                $('.obligatory-nif').show();
            }else{
                $('.obligatory-nif').hide();
            }
        }
        //###################################################

        //caso as strings sejam nulls, returna as strings como ''
        function ifNull(data){
            if(data.name == null){
                data.name = '';
            }

            if(data.lastname == null){
                data.lastname = '';
            }

            if(data.address == null){
                data.address = '';
            }

            if(data.postal_code == null){
                data.postal_code = '';
            }

            if(data.city == null){
                data.city = '';
            }

            if(data.country == null){
                data.country = '';
            }

            if(data.nif == null){
                data.nif = '';
            }
            return data;
        }
        //###################################

        //snackbar
        function viewSnack() {
            // Get the snackbar DIV
            var x = document.getElementById("snackbar");

            // Add the "show" class to DIV
            x.className = "show";

            // After 3 seconds, remove the show class from DIV
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }

        //verifica se está tudo preenchido
        function checkFill(name, address, postal_code, city, country, nif){
            console.log(name, address, postal_code, city, country, nif);
            if(name == ""){
                return false;
            }

            if(address == ""){
                return false;
            }

            if(postal_code == ""){
                return false;
            }

            if(city == ""){
                return false;
            }

            if(country == ""){
                return false;
            }

            if(nif == ""){
                return false;
            }
            return true;
        }
    </script>
@endsection