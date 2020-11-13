@extends('adminlte::page')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container">
    <div class="pull-right">
        <div class="col-md-12">
            <div class="card">


                <body input type = "time" onload="HoraActual(<?php echo date("H").", ".date("i").", ".date("s"); ?>)">
                <div id="contenedor_reloj"></div>
                <link rel="shortcut icon" href="home">
                <img src="\theme\images\movistar.jpg"  align= "center" height="90" width="150">
            </body>

            <h1 align= "center" >Editor de Gestion Fija</h1>



<form name="f1" action="{{ url('/fija/'.$fija->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    @method('PATCH')

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nombres">Nombres</label>
               <input type="text"
               class="form-control"
               id="nombres"
               placeholder="Nombres"
               name="nombres"
               value="{{ old('nombres' , $fija->nombres)}}">

          </div>
          <div class="form-group col-md-6">
            <label for="documento">Documento</label>
               <input type="number"
               class="form-control"
               id="documento"
               placeholder="Documento"
               name="documento"
               value="{{ old('documento' , $fija->documento)}}">

          </div>
          <div class="form-group col-md-6">
            <label for="fexpedicion">Fecha de expedicion</label>
               <input type="date"
               class="form-control"
               id="fexpedicion"
               placeholder="Fecha de expedicion"
               name="fexpedicion"
               value="{{ old('fexpedicion' , $fija->fexpedicion)}}">
          </div>


          <div class="form-group col-md-6">
            <label for="departamento">Departamento</label>
               <input type="text"
               class="form-control"
               id="departamento"
               placeholder="Departamento"
               name="departamento"
               value="{{ old('departamento' , $fija->departamento)}}">
          </div>

          <div class="form-group col-md-6">
            <label for="ciudad">Ciudad</label>
               <input type="text"
               class="form-control"
               id="ciudad"
               placeholder="ciudad"
               name="Ciudad"
               value="{{ old('ciudad' , $fija->ciudad)}}">
          </div>
          <div class="form-group col-md-6">
            <label for="barrio">Barrio</label>
               <input type="text"
               class="form-control"
               id="barrio"
               placeholder="barrio"
               name="Barrio"
               value="{{ old('barrio' , $fija->barrio)}}">
          </div>
          <div class="form-group col-md-6">
            <label for="direccion">Direccion</label>
               <input type="text"
               class="form-control"
               id="direccion"
               placeholder="direccion"
               name="Direccion"
               value="{{ old('direccion' , $fija->direccion)}}">
          </div>
          <div class="form-group col-md-6">
               <label for="estrato">Estrato</label>
               <input type="number" class="form-control"
               id="estrato"
               placeholder="Estrato"
               name="estrato"
               value="{{ old('estrato', $fija->estrato)}}">
          </div>

          <div class="form-group col-md-6">
            <label for="ngrabacion">Numero de grabacion</label>
            <input type="number" class="form-control"
            id="ngrabacion"
            placeholder="Numero de grabacion"
            name="ngrabacion"
            value="{{ old('ngrabacion', $fija->ngrabacion)}}">
       </div>
       <div class="form-group col-md-6">
        <label for="ncontacto">Numero de contacto</label>
        <input type="number" class="form-control"
        id="ncontacto"
        placeholder="Numero de contacto"
        name="ncontacto"
        value="{{ old('ncontacto', $fija->ncontacto)}}">
       </div>

       <div class="form-group col-md-6">
        <label for="producto">Producto</label>
        <input type="text" class="form-control"
        id="producto"
        placeholder="Producto"
        name="producto"
        value="{{ old('producto', $fija->producto)}}">
       </div>
       <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-1">
            <label for="fox">Fox</label>
            <input type="number" class="form-control"
            id="fox"
            placeholder="Fox"
            name="fox"
            value="{{ old('fox', $fija->FOX)}}">
         </div>

         <div class="col col-lg-1">
            <label for="hbo">Hbo</label>
        <input type="number" class="form-control"
        id="hbo"
        placeholder="Hbo"
        name="hbo"
        value="{{ old('hbo', $fija->HBO)}}">
          </div>
          <div class="col col-lg-2">
            <label for="cds_movil">Cds movil</label>
        <input type="number" class="form-control"
        id="cds_movil"
        placeholder="Cds movil"
        name="cds_movil"
        value="{{ old('cds_movil', $fija->cds_movil)}}">
          </div>
          <div class="col col-lg-2">
            <label for="cds_fija">Cds fija</label>
        <input type="number" class="form-control"
        id="cds_fija"
        placeholder="Cds fija"
        name="cds_fija"
        value="{{ old('cds_fija', $fija->CdsFija)}}">
          </div>
          <div class="col col-lg-2">
            <label for="Paquete_Adultos">P adultos</label>
            <input type="number" class="form-control"
            id="Paquete_Adultos"
            placeholder="Paquete adultos"
            name="Paquete_Adultos"
            value="{{ old('deco', $fija->Paquete_Adultos)}}">
          </div>
          <div class="col col-lg-2">
            <label for="Decodificador">Deco</label>
        <input type="number" class="form-control"
        id="Decodificador"
        placeholder="Deco"
        name="Decodificador"
        value="{{ old('Decodificador', $fija->Decodificador)}}">
          </div>

          <div class="col col-lg-2">
            <label for="svas_lineas">Svas_lineas</label>
            <input type="number" class="form-control"
            id="svas_lineas"
            placeholder="Svas_lineas"
            name="svas_lineas"
            value="{{ old('svas_lineas', $fija->Svas_lineas)}}">
          </div>
        </div>
    </div>

<div class="form-group col-lg-3">
    <label for="velocidad">Velocidad</label>
    <input type="text" class="form-control"
    id="velocidad"
    placeholder="Velocidad"
    name="velocidad"
    value="{{ old('velocidad', $fija->velocidad)}}">
   </div>

   <div class="form-group col-lg-3">
    <label for="tecnologia">Tecnologia</label>
    <input type="text" class="form-control"
    id="tecnologia"
    placeholder="Tecnologia"
    name="tecnologia"
    value="{{ old('tecnologia', $fija->tecnologia)}}">
   </div>



       <div class="form-group col-md-6">
        <label for="observacion">Observacion</label>
        <input type="text" class="form-control"
        id="observacion"
        placeholder="observacion"
        name="observacion"
        value="{{ old('observacion', $fija->observacion)}}">
       </div>






    <div class="form-group col-md-12">
        <label for="revisado">Revision</label>
        <select name=revisado onchange="cambia_estadorevisado()" class="form-control">

    <option value="0" selected>Seleccione...
    <option value="1">Ok
    <option value="2">Recuperar
    <option value="3">Perdida
    </select>
    </div>

    <div class="form-group col-md-12">
    <label for="estadorevisado">Estado de la revision</label>
    <select name=estadorevisado class="form-control">
    <option value="-">-
    </select>
    <div class="form-group col-md-12">
        <textarea class="form-control"  id ="obs2" name="obs2" rows="3" placeholder="Observaciones BackOficce"></textarea>
        </div>
    </div>
</div>

    <input class="btn btn-lg btn-primary" type="submit" value="EDITAR">


    <a href="{{route('fija.index')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">VOLVER</a>

    </div>

    </form>
      <script>
      var estadorevisados_1=new Array("Ok");
      var estadorevisados_2=new Array("Escoja una opcion","Cliente en mora","Error Aplicativo","Recahzo PCO","Cliente no Paso Confronta","Pendiente Ingreso");
      var estadorevisados_3=new Array("Escoja una opcion","Rechazo PCO","Cliente Tiene una Solicitud Abierta");


      var todasestadorevisados = [
        [],
        estadorevisados_1,
        estadorevisados_2,
        estadorevisados_3,

      ];

      function cambia_estadorevisado(){
           //tomo el valor del select del revisado elegido
           var revisado
           revisado = document.f1.revisado[document.f1.revisado.selectedIndex].value
           //miro a ver si el revisado está definido
           if (revisado != 0) {
              //si estaba definido, entonces coloco las opciones de la estadorevisado correspondiente.
              //selecciono el array de estadorevisado adecuado
              mis_estadorevisados=todasestadorevisados[revisado]
              //calculo el numero de estadorevisados
              num_estadorevisados = mis_estadorevisados.length
              //marco el número de estadorevisados en el select
              document.f1.estadorevisado.length = num_estadorevisados
              //para cada estadorevisado del array, la introduzco en el select
              for(i=0;i<num_estadorevisados;i++){
                 document.f1.estadorevisado.options[i].value=mis_estadorevisados[i]
                 document.f1.estadorevisado.options[i].text=mis_estadorevisados[i]
              }
           }else{
              //si no había estadorevisado seleccionada, elimino las estadorevisados del select
              document.f1.estadorevisado.length = 1
              //coloco un guión en la única opción que he dejado
              document.f1.estadorevisado.options[0].value = "-"
              document.f1.estadorevisado.options[0].text = "-"
           }
           //marco como seleccionada la opción primera de estadorevisado
           document.f1.estadorevisado.options[0].selected = true
    }
    </script>


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
      'FIJA',
      'Aqui podras editar los datos ya registrados',
      'success'
    )
    </script>
    @stop



    @endsection



