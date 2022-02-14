@extends('app')

@section('content')
<div class="container w-25 border p-4 my-4"><div class="row mx-auto">
    <div id="form_inicio">

        @if(session('error_pwd'))
        <h6 class= "alert alert-danger">{{session('error_pwd')}}</h6>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <h6 class= "alert alert-danger">{{$error}}</h6>
            @endforeach
        @endif
        
        <form action="{{route('registro')}}" method="POST">
        {{ csrf_field() }} 
            <label for="nombre_usuario">Usuario: </label><input type="text" name="nombre_usuario" id="nombre_usuario"><br>
            <label for="password_usuario">Contraseña: </label><input type="password" name="password_usuario" id="password_usuario"><br><br>
            <label for="password_usuario2">Confirmar contraseña: </label><input type="password" name="password_usuario2" id="password_usuario2"><br><br>
            <input type="submit" value="Registrarse">
        </form><br><br>
        <a href="{{route('index')}}">Volver al inicio</a>
    </div></div>

@endsection