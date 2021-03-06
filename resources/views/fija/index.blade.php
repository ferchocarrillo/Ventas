@extends('adminlte::page')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="container">
    <div class="pull-right">
        <div class="col-md-12">
            <div class="card" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
              <h6>Cantidad de Registros:  {{ $portaPLNs->total() }}</h6>
                <br>

                <div class="card-header"><h2>Lista de Planes Portabilidad, Porta Digital , Upgrade, Fija</h2></div>

                <div class="card-body">
                @can('haveaccess','portaplnew.create')
                    <a href="{{route('portaplnew.create')}}"
                      class="btn btn-primary float-right"
                      >Nuevo Plan
                    </a>
                    <br><br>
                @endcan




                <table class="table  table-hover">
    <thead class="thead-dark ">
    <tr>
        <th scope="col" style="font-size: 22px">ID</th>
        <th scope="col" style="font-size: 22px">&nbsp;&nbsp;&nbsp;  </th>



        <th scope="col"  style="font-size: 22px">LISTADO DE PLANES</th>

        <th colspan="3"></th>
        </tr>
</thead>

<tbody>
            @foreach ($portaPLNs as $portaPLN)
        <tr>
            <td style="font-size: 22px">{{$portaPLN->id}}</td>
            <td>{{$portaPLN->xxxxx}}</td>








      <strong>  <td style="font-size: 22px">{{$portaPLN->planadquiere}}</td></strong>


        <td>


<form method="POST" action="{{url('/portaplnew/'.$portaPLN->id) }}">
{{ csrf_field() }}
@method('DELETE')
<button type="submit" onclick="return confirm ('¡estas a punto de borrar un plan de la base!, este proceso no tiene reversa');" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Borrar</button>

       <a href="{{url('/portaplnew/'.$portaPLN->id.'/edit')}}" class="btn btn-success btn-sm" role="button" aria-pressed="true"> <i class="fas fa-pen-square"></i>Editar</a>
    </form>








    </td>
</tr>
@endforeach
</tbody>
</table>

{{ $portaPLNs->links() }}
</div>
{{--
<p>
clic <a href="{{route('porta.excel')}}">Aqui</a>
para descargar en Excel la base de portablilidad
</p>
--}}
<script src="{{asset('js/app.js')}}"></script>
</body>
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script>
Swal.fire(
'PORTABILIDAD',
'Lista de registros',
'success'
)
</script>
@stop






@endsection

