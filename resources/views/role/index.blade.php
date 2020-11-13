@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>Lista de roles</h2></div>

                <div class="card-body">
                @can('haveaccess','role.create')
                    <a href="{{route('role.create')}}"
                      class="btn btn-primary float-right"
                      >Nuevo Rol
                    </a>
                    <br><br>
                @endcan

                    @include('custom.message')

                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Alias</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acceso completo</th>
                            <th colspan="3"></th>
                          </tr>
                        </thead>
                        <tbody>


                            @foreach ($roles as $role)
                            <tr>
                                <th scope="row">{{ $role->id}}</th>
                                <td>{{ $role->name}}</td>
                                <td>{{ $role->slug}}</td>
                                <td>{{ $role->description}}</td>
                                <td>{{ $role['full-access']}}</td>
                                <td>
                                @can('haveaccess','role.show')
                                  <a class="btn btn-info" href="{{ route('role.show',$role->id)}}">Ver</a>
                                @endcan
                                </td>
                                <td>
                                @can('haveaccess','role.edit')
                                  <a class="btn btn-success" href="{{ route('role.edit',$role->id)}}">Editar</a>
                                @endcan
                                </td>

                                <td>
                                @can('haveaccess','role.destroy')
                                  <form action="{{ route('role.destroy',$role->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Borrar</button>
                                  </form>
                                @endcan

                                </td>
                            </tr>
                            @endforeach





                        </tbody>
                      </table>

                      {{ $roles->links() }}




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
