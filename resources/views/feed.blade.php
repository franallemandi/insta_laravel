@extends('app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('feed-todos')}}">INSTAGRAM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('feed-uno',['usuario'=>session('usuario')])}}">Mi Perfil</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
@if (session('usuario'))
    <h3>Bienvenido, {{session('usuario')}}</h3>
@endif
<div class="container w-25 border p-4 my-4"><div class="row mx-auto">
@if(isset($lista))
@foreach($lista as $publi)
    <img src="{{ asset('/imgs/1481.png') }}">
    <p><strong>{{$publi->usuario}}</strong>: {{$publi->comentario}}</p><br><br>
@endforeach
@endif

<div id="form_inicio">       
        <form action="{{route('postear')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }} 
            <input type="hidden" name="usuario" value="{{session('usuario')}}">
            <label for="foto">Foto: </label><input type="file" name="upload_file" id="foto" value="" required><br>
            <label for="pie">Comentario: </label><textarea rows="3" cols="30" name="comentario" id="pie"></textarea><br><br>
            <button type="submit" name="upload">POSTEAR</button>
        </form><br><br>
    </div>
</div>
@if(isset($publis_usuario))
    @if(isset($msg))
    <h6 class= "alert alert-danger">{{ $msg }}</h6>
    @endif

    @foreach($publis_usuario as $publis)
    <img src="imgs\{{$publis->foto}}">
    <p>{{$publis->comentario}}</p><br><br>
    @endforeach
@endif

@endsection