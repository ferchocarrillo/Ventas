
@extends('adminlte::page')

@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="container">
    <div class="pull-right">
        <div class="col-md-12">
            <div class="card">

                <body input type = "time" onload="HoraActual(<?php echo date("H").", ".date("i").", ".date("s"); ?>)">
                    <div id="contenedor_reloj"></div>
                    <link rel="shortcut icon" href="home">

                    <img src="\theme\images\movistar.jpg"  align= "center" height="90" width="150">
                </body>
                    <h1 align= "center" >Formulario de Upgrade</h1>
                    <form action="{{ url('/upgrade')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" id ="nombres" name="nombres" class="form-control"  placeholder="Nombres y Apellidos" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="number" id ="documento" name="documento" class="form-control" placeholder="Documento" required>
                        </div>
                        <div class="col-sm-3 col-form-label">
                        <label for="fventa">Fecha de venta</label>
                    </div>
                        <div class="form-group col-md-3">
                            <input type="date" id ="fventa" name="fventa" class="form-control" placeholder="Fecha de venta" required>
                        </div>
                        <div class="form-group col-md-6">

                            <input type="number" id ="numero" name="numero" class="form-control" placeholder="Numero de celular" required>
                        </div>
                        <div class="form-group col-md-6">

                            <select name="corte" id="corte" class="form-control"  required>
                                <option value="0">Corte</option>
                                @foreach($corte as $cortes)
                                    <option value="{{ $cortes->corte}}">{{ $cortes->corte }}</option>
                                @endforeach
                            </select>
                            </div>
                        <div class="form-group col-md-6">

                            <select name="planhistorico" id="planhistorico" class="form-control"  required>
                                <option value="0">Planes Historicos</option>
                                @foreach($planhistorico as $planhistoricos)
                                    <option value="{{ $planhistoricos->historico}}">{{ $planhistoricos->historico }}</option>
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

                                    <select name="activacion" id="activacion" class="form-control"  required>
                                        <option value="0">Activacion</option>
                                        @foreach($activacion as $activaciones)
                                            <option value="{{ $activaciones->activacion}}">{{ $activaciones->activacion }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                        <div class="form-group col-md-6">
                            <input type="number" id ="ngrabacion" name="ngrabacion" class="form-control" placeholder="Numero de Grabacion" required>
                        </div>
                        <div class="form-group col-md-12">
                            <textarea  id ="observacion" name="observacion" class="form-control" rows="3" placeholder="Observaciones"></textarea>
                        </div>


                            </div>

                        </div>



                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Enviar
                            </button>
                            <a href=({{ url('upgrade.create')}})><button type="reset"  class="btn btn-danger btn-sm">
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
      'UPGRADE',
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

