
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
                <h1 align= "center" >Formulario de Fija</h1>
                <form action="{{ url('/fija')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-row">
                               <div class="form-group col-md-6">
                               <input type="text" id ="nombres" name="nombres" class="form-control" placeholder="Nombres" required>
                               </div>
                               <div class="form-group col-md-6">
                               <input type="number" id ="documento" name="documento" class="form-control" placeholder="Documento de identidad" required>
                               </div>
                               <div class="col-sm-3 col-form-label">
                                <label for="fexpedicion">Fecha de expedicion</label>
                               </div>
                                <div class="form-group col-md-3">
                                    <input type="date" id ="fexpedicion" name="fexpedicion" class="form-control" placeholder="Fecha de venta" required>
                                </div>
                               <div class="form-group col-md-6">

                                <select name="departamento" id="departamento" class="form-control"  required>
                                    <label for="departamento"></label><br>
                                   <option value="">Departamento</option>
                                   @foreach($depto as $departamento)
                                       <option value="{{ $departamento->Id_departamento}}">{{ $departamento->departamento }}</option>
                                   @endforeach
                               </select>
                               </div>
                               <div class="form-group col-md-6">
                                     <select name="id_ciudad" id="id_ciudad" class="form-control" placeholder="Ciudada o municipio" required></select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" id ="barrio" name="barrio" class="form-control" placeholder="Barrio" required>
                                   </div>
                                   <div class="form-group col-md-6">
                                    <input type="text" id ="direccion" name="direccion" class="form-control" placeholder="Direccion" required>
                                </div>
                                <div class="form-group col-md-6">

                                <select name="estrato" id="estrato" class="form-control"  required>
                                        <label for="estrato"></label><br>
                                       <option value="">Estrato</option>
                                       @foreach($estrato as $estratos)
                                           <option value="{{ $estratos->estrato}}">{{ $estratos->estrato }}</option>
                                       @endforeach
                                </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="number" id ="ngrabacion" name="ngrabacion" class="form-control" placeholder="Numero de grabacion" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="number" id ="ncontacto" name="ncontacto" class="form-control" placeholder="Numero de contacto" required>
                                </div>
                                <div class="form-group col-md-6">

                                    <select name="producto" id="producto" class="form-control"  required>
                                            <label for="producto"></label><br>
                                           <option value="">Productos</option>
                                           @foreach($producto as $productos)
                                               <option value="{{ $productos->producto}}">{{ $productos->producto }}</option>
                                           @endforeach
                                    </select>
                                    </div>
                                    <label for="checkbox">Adicionales</label><br>

                                    <div class="form-group col-md-2">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="FOX" id="FOX">
                                        <label class="form-check-label" for="FOX">
                                          FOX
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="HBO" id="HBO">
                                        <label class="form-check-label" for="HBO">
                                          HBO
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="cds_movil" id="cds_movil">
                                        <label class="form-check-label" for="cds_movil">
                                          Cds Movil
                                        </label>
                                      </div>
                                      </div>
                                      <div class="form-group col-md-2">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="cds_fija" id="cds_fija">
                                        <label class="form-check-label" for="cds_fija">
                                          Cds Fijo
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="Paquete_Adultos" id="Paquete_Adultos">
                                        <label class="form-check-label" for="Paquete_Adultos">
                                          Paquete Adultos
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="Decodificador" id="Decodificador">
                                        <label class="form-check-label" for="Decodificador">
                                          Decodificador
                                        </label>
                                      </div>
                                      </div>
                                      <div class="form-group col-md-1">
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="Svas_lineas" id="Svas_lineas">
                                        <label class="form-check-label" for="Svas_lineas">
                                          Svas Linea
                                        </label>
                                      </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <select name="velocidad" id="velocidad" class="form-control" required>
                                            <option value="0">Velocidad</option>
                                            @foreach($velocidad as $velocidads)
                                                <option value="{{ $velocidads->velocidad}}">{{ $velocidads->velocidad }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                        <select name="tecnologia" id="tecnologia" class="form-control" required>
                                            <option value="0">Tecnologia</option>
                                            @foreach($tecnologia as $tecnologias)
                                                <option value="{{ $tecnologias->tecnologia}}">{{ $tecnologias->tecnologia }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                      <div class="form-group col-md-12">
                                        <textarea  id ="observacion" name="observacion" class="form-control" rows="3" placeholder="Observaciones"></textarea>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Enviar
                                            </button>
                                            <a href=({{ url('fija.create')}})><button type="reset"  class="btn btn-danger btn-sm">
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
  'FIJA',
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

