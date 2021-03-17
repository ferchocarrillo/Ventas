@extends('adminlte::page')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container">
    <div class="pull-right">
        <div class="col-md-12">
            <div class="card" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
            </body>
            <center style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
                <img src="\theme\images\pngegg.png" float="left" height="120" width="300">
                <h3 aline="center">Editor de Gestion Prepost</h3>
            </center>
<form name="f1" action="{{ url('/prepostdigital/'.$prepost->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    @method('PATCH')

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="number">Numero</label>
             <input type="number" class="form-control-new"
             id="numero"
             placeholder="Numero"
             name="numero"
             value="{{ old('numero', $prepost->numero)}}">

        </div>
        <div class="form-group col-md-6">
            <label for="nombres">Nombres</label>
               <input type="text"
               class="form-control-new"
               id="nombres"
               placeholder="Nombres"
               name="nombres"
               value="{{ old('nombres' , $prepost->nombres)}}">
        </div>

        <div class="form-group col-md-6">
            <label for="documento">Documento</label>
               <input type="number"
               class="form-control-new"
               id="documento"
               placeholder="Documento"
               name="documento"
               value="{{ old('documento' , $prepost->documento)}}">
          </div>

          <div class="form-group col-md-6">
            <label for="fexpedicion">Fecha de expedicion</label>
               <input type="date"
               class="form-control-new"
               id="fexpedicion"
               placeholder="Fecha de expedicion"
               name="fexpedicion"
               value="{{ old('fexpedicion' , $prepost->fexpedicion)}}">
          </div>

          <div class="form-group col-md-6">
            <label for="tipocliente">Tipo cliente</label>
               <input type="text"
               class="form-control-new"
               id="tipocliente"
               placeholder="tipo cliente"
               name="tipocliente"
               value="{{ old('tipocliente' , $prepost->tipocliente)}}">
          </div>

          <div class="form-group col-md-6">
            <label for="correo">Correo</label>
               <input type="text"
               class="form-control-new"
               id="correo"
               placeholder="Correo"
               name="correo"
               value="{{ old('correo' , $prepost->correo)}}">
          </div>
          <div class="form-group col-md-6">
            <label for="selector">Selector</label>
               <input type="text"
               class="form-control-new"
               id="selector"
               placeholder="Selector"
               name="selector"
               value="{{ old('selector' , $prepost->selector)}}">
          </div>

          <div class="form-group col-md-6">
            <label for="departamento">Departamento</label>
               <input type="text"
               class="form-control-new"
               id="departamento"
               placeholder="Departamento"
               name="departamento"
               value="{{ old('departamento' , $prepost->departamento)}}">
          </div>

          <div class="form-group col-md-6">
            <label for="ciudad">Ciudad</label>
               <input type="text"
               class="form-control-new"
               id="ciudad"
               placeholder="ciudad"
               name="Ciudad"
               value="{{ old('ciudad' , $prepost->ciudad)}}">
          </div>

          <div class="form-group col-md-6">
            <label for="barrio">Barrio</label>
               <input type="text"
               class="form-control-new"
               id="barrio"
               placeholder="barrio"
               name="Barrio"
               value="{{ old('barrio' , $prepost->barrio)}}">
          </div>

          <div class="form-group col-md-6">
            <label for="direccion">Direccion</label>
               <input type="text"
               class="form-control-new"
               id="direccion"
               placeholder="direccion"
               name="Direccion"
               value="{{ old('direccion' , $prepost->direccion)}}">
          </div>

          <div class="form-group col-md-6">
               <label for="corte">Corte</label>
               <input type="number" class="form-control-new"
               id="corte"
               placeholder="Corte"
               name="corte"
               value="{{ old('corte', $prepost->corte)}}">
          </div>

          <div class="form-group col-md-3">
            <label for="planventa">Plan venta</label>
            <input type="number" class="form-control-new"
            id="planventa"
            placeholder="Plan venta"
            name="planventa"
            value="{{ old('planventa', $prepost->planventa)}}">
           </div>

           <div class="form-group col-md-3">
            <label for="activacion">Activacion</label>
            <input type="text" class="form-control-new"
            id="activacion"
            placeholder="Activacion"
            name="activacion"
            value="{{ old('activacion', $prepost->activacion)}}">
           </div>

           <div class="form-group col-md-3">
            <label for="token">Token</label>
            <input type="number" class="form-control-new"
            id="token"
            placeholder="Token"
            name="token"
            value="{{ old('token', $prepost->token)}}">
           </div>

           <div class="form-group col-md-3">
            <label for="orden">Numero de Orden</label>
            <input type="number" class="form-control-new"
            id="orden"
            placeholder="Numero de Orden"
            name="orden"
            value="{{ old('orden', $prepost->orden)}}">
           </div>

           <div class="form-group col-md-12">
            <label for="observacion">Observacion</label>
            <input type="text" class="form-control-new"
            id="observaciones"
            placeholder="observaciones"
            name="observaciones"
            value="{{ old('observaciones', $prepost->observaciones)}}">
           </div>

           <div class="form-group col-md-6">
            <label for="revisados">Revision</label>

             <select name="revisados" id="revisados" class="form-control-new"  required>
                <option value="">Revisión</option>
                @foreach($revisadoses as $revisados)
                    <option value="{{ $revisados->estado}}">{{ $revisados->estado }}</option>
                @endforeach
          </select>
            </div>

            <div class="form-group col-md-6">
             <label for="estadorevisados">Estado de la revision</label>
             <select name="estadorevisado" id="estadorevisado" class="form-control-new" placeholder="Estado de la revisión" required></select>
         </div>


    <div class="form-group col-md-12">
        <textarea class="form-control-new"  id ="obs2" name="obs2" rows="3" placeholder="Observaciones BackOficce"></textarea>
        </div>



    <input class="btn btn-lg btn-primary" type="submit" value="EDITAR">


    <a href="{{route('prepostdigital.index')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">VOLVER</a>

    </div>

    </form>



    </div>

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
      'PREPOST',
      'Aqui podras editar los datos ya registrados',
      'success'
    )
    </script>
    @stop
    <script>
        $(document).ready(function() {
             $('#revisados').on('change', function(e) {
                 var id = $('#revisados').val();
                 $.ajax({

                     url: "{{ route('Revisado')}}",
                     data: "id="+id+"&_token={{ csrf_token()}}",
                     dataType: "json",
                     method: "POST",
                     success: function(result)
                     {

                         $('#estadorevisado').empty();
                         $('#estadorevisado').append("<option value=''>Escoja una Opcion</option>");
                         $.each(result, function(index,value){

                             $('#estadorevisado').append("<option value='"+value.estado+"'>"+value.estado+"</option>");
                         });
                     }
                 });
             });
         });
     </script>


    @endsection


