@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>Creacion de Roles</h2></div>

                <div class="card-body">
                   @include('custom.message')



                    <form action="{{ route('role.store')}}" method="POST">
                     @csrf

                     <div class="container">

                        <h3>Datos requeridos</h3>

                         <div class="form-group">
                            <input type="text" class="form-control"
                            id="name"
                            placeholder="Nombre"
                            name="name"
                            value="{{ old('name')}}"
                            >
                          </div>

                          <div class="form-group">
                            <input type="text"
                            class="form-control"
                            id="slug"
                            placeholder="Alias"
                            name="slug"
                            value="{{ old('slug')}}"
                            >
                          </div>

                          <div class="form-group">

                            <textarea class="form-control" placeholder="Descripción" name="description" id="description" rows="3">
                             {{ old('description')}}
                            </textarea>
                          </div>

                          <hr>

                          <h3>Acceso completo</h3>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes"
                            @if (old('full-access')=="yes")
                              checked
                            @endif


                            >
                            <label class="custom-control-label" for="fullaccessyes">Si</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no"
                            @if (old('full-access')=="no")
                              checked
                            @endif
                            @if (old('full-access')===null)
                              checked
                            @endif

                            >
                            <label class="custom-control-label" for="fullaccessno">No</label>
                          </div>

                          <hr>


                          <h3>Lista de permisos</h3>


                          @foreach($permissions as $permission)


                          <div class="custom-control custom-checkbox">
                            <input type="checkbox"
                            class="custom-control-input"
                            id="permission_{{$permission->id}}"
                            value="{{$permission->id}}"
                            name="permission[]"

                            @if( is_array(old('permission')) && in_array("$permission->id", old('permission'))    )
                            checked
                            @endif
                            >
                            <label class="custom-control-label"
                                for="permission_{{$permission->id}}">
                                {{ $permission->id }}
                                -
                                {{ $permission->name }}
                                <em>( {{ $permission->description }} )</em>

                            </label>
                          </div>


                          @endforeach
                          <hr>
                          <input class="btn btn-primary" type="submit" value="Guardar">









                     </div>




















                    </form>








                </div>
            </div>
        </div>
    </div>
</div>
@endsection
