
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
                    <h1 align= "center" >Formulario de Rechazos</h1>
                    <form action="{{ url('/rechazos')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="number" id ="numero_de_celular" name="numero_de_celular" class="form-control" placeholder="Numero de celular" required>
                            </div>
                            <div class="form-group col-md-6">
                            <input type="text" id ="nombres" name="nombres" class="form-control"  placeholder="Nombres y Apellidos del Cliente" required>
                        </div>


                        <div class="form-group col-md-6">
                            <input type="number" id ="documento" name="documento" class="form-control" placeholder="Documento" required>
                        </div>

                        <div class="form-group col-md-6">

                        <select name="causal" id="causal" class="form-control"  required>
                            <option value="0">Causales de Rechazo</option>
                            @foreach($causales as $causal)
                                <option value="{{ $causal->causal}}">{{ $causal->causal }}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group col-md-6">

                        <select name="linea" id="linea" class="form-control"  required>
                            <option value="0">Linea</option>
                            @foreach($linea as $lineas)
                                <option value="{{ $lineas->linea}}">{{ $lineas->linea }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-sm-3 col-form-label">
                            <label for="frechazo">Fecha de rechazo</label>
                            </div>
                            <div class="form-group col-md-3">
                            <input type="date" id ="frechazo" name="frechazo" class="form-control" placeholder="Fecha del rechazo"required>
                          </div>

                            <div class="form-group col-md-6">
                                <textarea  id ="observacion" name="observacion" class="form-control" rows="3" placeholder="Observaciones"></textarea>
                            </div>




                        </form>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                 <i class="fa fa-dot-circle-o"></i> Enviar
                            </button>
                            <a href=({{ url('rechazos.create')}})><button type="reset"  class="btn btn-danger btn-sm">
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
          'RECHAZOS',
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

