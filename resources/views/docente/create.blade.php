@extends('layouts.app')
@section('content')
<div class="container">

<!--enctype="multipart/form-data": atributo para enviar fotos o archivos-->
<form action="{{ url('/docente')}}" method="post" enctype="multipart/form-data">
@csrf
@include('docente.form',['modo'=>'Crear']);     

</form>
</div>
@endsection

