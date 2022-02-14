@extends('app')

@section('content')
<div class="container w-25 border p-4 my-4"><div class="row mx-auto">
    @if (session('success'))
        <h6 class= "alert alert-success">{{session('success')}}</h6>
    @endif
    @if (session('error'))
        <h6 class= "alert alert-danger">{{session('error')}}</h6>
    @endif
    
<div id="form_inicio">       
        <form action="{{route('inicio_sesion')}}" method="POST">
        {{ csrf_field() }} 
            <label for="nombre_usuario">Usuario: </label><input type="text" name="nombre_usuario" id="nombre_usuario"><br>
            <label for="password_usuario">Contraseña: </label><input type="password" name="password_usuario" id="password_usuario"><br><br>
            <input type="submit" value="Iniciar sesión">
        </form><br><br>
        <a href="/pag_registro">Registrarse</a>
    </div></div>

@endsection
