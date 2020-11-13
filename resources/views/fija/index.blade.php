@extends('adminlte::page')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="container">
    <div class="pull-right">
        <div class="col-md-12">
            <div class="card">
                <br>
                <div class="col-md-4"   >
                <form action="/searchfija" method="GET">
                <div class="input-group">
        <input type="searchfija" name="searchfija" class="form-control">
        <span class="input-group-prepend">
            <button type="submit" class="btn btn-primary">Buscar</button>
            </span>
        </div>
    </form>
</div>
<br>
                <table class="table table-ligth table-hover">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Numero de contacto</th>
        <th scope="col">Nombres</th>
        <th scope="col">Documento</th>
        <th scope="col">Producto</th>
        <th scope="col">Agente</th>
        <th scope="col">Revision</th>
        <th colspan="3">Acciones</th>
        </tr>
</thead>
<tbody>
@foreach ($fija as $fija)
     <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$fija->ncontacto}}</td>
        <td>{{$fija->nombres}}</td>
        <td>{{$fija->documento}}</td>
        <td>{{$fija->producto}}</td>
        <td>{{$fija->agente}}</td>
        <td>{{$fija->revisado}}</td>
        <td>
            <form action="{{url('/fija/'.$fija->id)}}" method="post">
                @csrf
                @method('DELETE')
        <a href="{{url('/fija/'.$fija->id.'/edit')}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">Editar</a>
        <button class="btn btn-danger btn-sm" onclick="return confirm('Borrar?');" type="submit"aria-pressed="true">Borrar</button>
        </form>
            </td>
            </tr>
            @endforeach
            </tbody>
         </table>
      </div>
        <p>
        clic <a href="{{route('fija.excel')}}">Aqui</a>
        para descargar en Excel la base de fija
        </p>

<script src="{{asset('js/app.js')}}"></script>
</body>
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script>
Swal.fire(
'FIJA',
'Lista de registros',
'success'
)
</script>
@stop
@endsection


