@extends('adminlte::page')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="container">
    <div class="pull-right">
        <div class="col-md-22">
            <div class="card">
                <body input type = "time" onload="HoraActual(<?php echo date("H").", ".date("i").", ".date("s"); ?>)">
                <div id="contenedor_reloj"></div>
                <link rel="shortcut icon" href="home"><img src="\theme\images\movistar.jpg"  align= "center" height="90" width="150">
            </body>
            <h1 align= "center" >Formulario de Portabilidad</h1>
                <form action="{{ url('/porta')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
                <div class="form-row">
                <div class="form-group col-md-6">
                <input type="number" id ="numero" name="numero" class="form-control" placeholder="Numero Celular" required>
                </div>
                <div class="form-group col-md-6">
                 <input type="number" id ="documento" name="documento" class="form-control" placeholder="Documento de identidad" required>
                </div>
                <div class="form-group col-md-6">
                 <input type="text" id ="nombres" name="nombres" class="form-control" placeholder="Nombres" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" id ="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="mail" id ="correo" name="correo" class="form-control" placeholder="Ingrese correo electronico ejemplo@gmail.com" required>
                  </div>
                <div class="form-group col-md-6">
                   <select name="departamento" id="departamento" class="form-control"  required>
                      <option value="">Departamento</option>
                      @foreach($depto as $departamento)
                          <option value="{{ $departamento->Id_departamento}}">{{ $departamento->departamento }}</option>
                      @endforeach
                </select>
                  </div>
                  <div class="form-group col-md-6">
                        <select name="id_ciudad" id="id_ciudad" class="form-control" placeholder="Ciudad o municipio" required></select>
                    </div>

                  <div class="form-group col-md-6">
                    <input type="text" id ="barrio" name="barrio" class="form-control" placeholder="Barrio"required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" id ="direccion" name="direccion" class="form-control" placeholder="Direccion" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="number" id ="nip" name="nip" class="form-control" placeholder="NIP" required>
                  </div>
                  <div class="form-group col-md-6">
                    <select name="tipocliente" id="tipocliente" class="form-control-sm form-control" required>
                        <option value="0">Tipo de cliente</option>
                        @foreach($tipoCliente as $tipoClientes)
                            <option value="{{ $tipoClientes->tipo_cliente}}">{{ $tipoClientes->tipo_cliente }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                  <select name="planadquiere" id="planadquiere" class="form-control"  required>
                        <option value="0">Plan que adquire</option>
                        @foreach($planadquiere as $planadquieres)
                            <option value="{{ $planadquieres->planadquiere }}">{{ $planadquieres->planadquiere }}</option>
                        @endforeach
                  </select>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="number" id ="ncontacto" name="ncontacto" class="form-control" placeholder="Numero de contacto"required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="number" id ="imei" name="imei" class="form-control" placeholder="Imei"required>
                  </div>
                  <div class="col-sm-3 col-form-label">
                    <label for="fvc">FVC</label>
                    <input type="date" id ="fvc" name="fvc" class="form-control" placeholder="FVC"required>
                  </div>
                  <div class="col-sm-3 col-form-label">
                    <label for="fentrega">Fecha Entrega</label>
                    <input type="date" id ="fentrega" name="fentrega" class="form-control" placeholder="Fecha de entrega"required>
                  </div>
                  <div class="col-sm-3 col-form-label">
                    <label for="fexpedicion">Fecha Expedición</label>
                    <input type="date" id ="fexpedicion" name="fexpedicion" class="form-control" placeholder="Fecha de expedición"required>
                  </div>
                  <div class="col-sm-3 col-form-label">
                    <label for="fnacimiento">Fecha Nacimiento</label>
                    <input type="date" id ="fnacimiento" name="fnacimiento" class="form-control" placeholder="Fecha de Nacimiento"required>
                  </div>
                  <div class="form-group col-md-6">
                  <select name="origen" id="origen" class="form-control"  required>
                        <option value="0">Origen de la migracion</option>
                        @foreach($origen as $origens)
                            <option value="{{ $origens->origen }}">{{ $origens->origen }}</option>
                        @endforeach
                  </select>
                  </div>
                  <div class="form-group col-md-6">
                  <input type="number" id ="ngrabacion" name="ngrabacion" class="form-control"  placeholder="Numero de grabacion" required>
                  </div>
                  <div class="form-group col-md-12">
                  <textarea  id ="observaciones" name="observaciones" class="form-control" rows="3" placeholder="Observaciones"></textarea>
                  </div>

                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">
                      <i class="fa fa-dot-circle-o"></i> Enviar
                  </button>
                  <a href=({{ route('porta.create')}})><button type="reset"  class="btn btn-danger btn-sm">
                      <i class="fa fa-ban"></i> atras
                  </button></a>
               </div>
            </form>
            <script src="{{asset('js/app.js')}}"></script>
                    </body>
                    @section('css')
                    <link rel="stylesheet" href="/css/admin_custom.css">
                    @stop
                    @section('js')
            <script>
            Swal.fire(
              'PORTABILIDAD',
              'Consigna todos los datos de forma correcta',
              'success'
            )
            </script>
            @stop




<script>
$(document).ready(function() {
     $('#departamento').on('change', function(e) {
         var id = $('#departamento').val();
         $.ajax({

             url: "{{ route('Ciudad')}}",
             data: "id="+id+"&_token={{ csrf_token()}}",
             dataType: "json",
             method: "POST",
             success: function(result)
             {

            $('#id_ciudad').empty();
            $('#id_ciudad').append("<option value=''>Ingrese Ciudad o Municipio</option>");
            $.each(result, function(index,value){

                     $('#id_ciudad').append("<option value='"+value.Municipio+"'>"+value.Municipio+"</option>");
                 });
             }
         });
     });
 });
</script>
@endsection
