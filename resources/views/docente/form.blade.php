
<h1>{{ $modo }} Docente</h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
<ul>
        @foreach( $errors->all() as $error)
       <li> {{ $error}} </li>
        @endforeach
</ul>
    </div>


@endif


<div class="form-group">

    <label for="Nombres">Nombres:</label>
    <input type="text" class="form-control" name="Nombres" value="{{ isset($docente->Nombres)?$docente->Nombres:old('Nombres') }}"  id="Nombres">

</div>
<div class="form-group">
    <label for="Apellidos">Apellidos:</label>
    <input type="text" class="form-control" name="Apellidos" value="{{ isset($docente->Apellidos)?$docente->Apellidos:old('Apellidos') }}" id="Apellidos">

</div>
<div class="form-group">
    <label for="Titulo">Titulo:</label>
    <input type="text" class="form-control" name="Titulo" value="{{isset($docente->Titulo)?$docente->Titulo:old('Titulo') }}" id="Titulo">

</div>
<div class="form-group">
    <label for="Correo">Correo:</label>
    <input type="text" class="form-control" name="Correo" value="{{ isset($docente->Correo)?$docente->Correo:old('Correo') }}" id="Correo">

</div>
<div class="form-group">

    <label for="Foto"></label>
    @if(isset($docente->Foto))   
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$docente->Foto }}" width="100"  alt="" >
    @endif
    <input type="file" class="form-control" name="Foto" value="" id="Foto">
    </div>

    <input class="btn btn-success" type="submit" value="{{ $modo }} datos">

    <a class="btn btn-primary" href="{{ url('docente/') }}">Regresar</a>
    <br/>
