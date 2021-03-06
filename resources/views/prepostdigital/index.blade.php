@extends('adminlte::page')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="container">
    <div class="pull-right">
        <div class="col-md-12">
            <div class="card" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
                <h6>Cantidad de Registros:  {{ $preposts->total() }}</h6>
                <br>
                <div class="col-md-4"   >
                <form action="/searchprepost" method="GET">
                <div class="input-group">
        <input type="searchprepost" name="searchprepost" class="form-control">
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
        <th scope="col">Nombres</th>
        <th scope="col">Documento</th>
        <th scope="col">Plan venta</th>
        <th scope="col">Observaciones</th>
        <th scope="col">Fecha venta</th>
        <th scope="col">Revision</th>
        <th scope="col">Causal</th>
        <th scope="col">Agente</th>


        <th colspan="3">Acciones</th>
       </tr>
    </thead>
  <tbody>
    @foreach ($preposts as $prepost)
<tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$prepost->numero}}</td>
        <td>{{$prepost->nombres}}</td>
        <td>{{$prepost->documento}}</td>
        <td>{{$prepost->planventa}}</td>
        <td>{{$prepost->observaciones}}</td>
        <td>{{$prepost->created_at}}</td>
        <td>{{$prepost->revisados}}</td>
        <td>{{$prepost->estadorevisado}}</td>
        <td>{{$prepost->agente}}</td>
        <td>
            <form action="{{url('/prepostdigital/'.$prepost->id)}}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{url('/prepostdigital/'.$prepost->id.'/edit')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Editar</a>

                <button class="btn btn-warning btn-sm" onclick="return confirm('Borrar?');" type="submit"aria-pressed="true">Borrar</button>
              </form>
        </td>
     </tr>
@endforeach
</tbody>
</table>

{{  $preposts->links()  }}
        </div>
    </form>
    <p>
        clic <a href="{{route('prepostDigital.excel')}}">Aqui</a>
        para descargar en Excel la base de Prepost digital
        </p>
    <script src="{{asset('js/app.js')}}"></script>
</body>
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script>
Swal.fire(
'PRE POST',
'Lista de registros',
'success'
)
</script>
@stop
@endsection

