@extends('layouts.app')
@section('content')
<div class="container">


    @if(Session:: has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}
    <button type="button"  class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif



<a href="{{ url('docente/create') }}" class="btn btn-success" >Registrar nuevo empleado</a>
<br>
<br>
<div class="table table-bordered">
    <table class="table table-success">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Foto</th>
                <th scope="col">Nombres </th>
                <th scope="col">Apellidos</th>
                <th scope="col">Titulo</th>
                <th scope="col">Correo</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $docentes as $docente )
            <tr class="">
                <td scope="row">{{ $docente ->id }}</td>

                <td>
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$docente->Foto }}" width="100" alt="" >
                </td>

                <td>{{ $docente ->Nombres }}</td>
                <td>{{ $docente ->Apellidos }}</td>
                <td>{{ $docente ->Titulo }}</td>
                <td>{{ $docente ->Correo }}</td>
                <td>
                    
                <a href="{{ url('/docente/'.$docente->id.'/edit') }}" class="btn btn-warning">
                        Editar 
                </a>   
                |          
                <form action="{{ url('/docente/'.$docente->id) }}" class="d-inline" method="post">
                  @csrf
                  {{ method_field('DELETE') }}  
                 <input class="btn btn-danger"type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">  
                
                </form>
                
            </tr>
            @endforeach
        </tbody>
    </table>
   {!! $docentes->links() !!}
</div>
@endsection
