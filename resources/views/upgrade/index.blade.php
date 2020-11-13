@extends('adminlte::page')

@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="container">
    <div class="pull-right">
        <div class="col-md-12">
            <div class="card">
                <br>

                <div class="col-md-4"   >
                <form action="/searchupgrade" method="GET">
                <div class="input-group">
        <input type="searchupgrade" name="searchupgrade" class="form-control">
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
        <th scope="col">Numero</th>
        <th scope="col">Documento</th>
        <th scope="col">Numero</th>
        <th scope="col">Plan venta</th>
        <th scope="col">Fecha de venta</th>
        <th scope="col">Agente</th>
        <th scope="col">Observaciones</th>
        <th scope="col">Revision</th>
        <th colspan="3">Acciones</th>
        </tr>
</thead>
<tbody>
@foreach ($upgrade as $upgrade)
     <tr>

        <td>{{$loop->iteration}}</td>
        <td>{{$upgrade->numero}}</td>
        <td>{{$upgrade->documento}}</td>
        <td>{{$upgrade->numero}}</td>
        <td>{{$upgrade->planventa}}</td>
        <td>{{$upgrade->fventa}}</td>
        <td>{{$upgrade->agente}}</td>
        <td>{{$upgrade->observaciones}}</td>
        <td>{{$upgrade->revisado}}</td>

        <td>
        <a href="{{url('/upgrade/'.$upgrade->id.'/edit')}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">Editar</a>

        <form action="{{url('/upgrade/'.$upgrade->id)}}" method="post">

        @csrf

        @method('DELETE')




        <button class="btn btn-danger btn-sm" onclick="return confirm('Borrar?');" type="submit"aria-pressed="true">Borrar</button>




</form>

        </td>

    </tr>
@endforeach
</tbody>
</table>
    </div>


    <p>
        clic <a href="{{route('upgrade.excel')}}">Aqui</a>
        para descargar en Excel la base de upgrade

        </p>








    <script src="{{asset('js/app.js')}}"></script>
</body>
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script>
Swal.fire(
'UPGRADE',
'Lista de registros',
'success'
)
</script>
@stop






@endsection

