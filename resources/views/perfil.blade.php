@extends('plantilla')

@section("titulo")
  {{$usuario->name}}
  @endsection

  @section("principal")

    <div class="container">
      <h1>Bienvenido a tu perfil, {{$usuario->name}}</h1>
      <img src="/storage/{{$usuario->avatar}}" alt="" width="100" height="100">
      <table class="table">
        <tr>
          <th>Nombre:</th>
          <td>{{$usuario->name}}</td>
        </tr>
        <tr>
          <th>Email:</th>
          <td>{{$usuario->email}}</td>
        </tr>
        <tr>
          <th>Pais:</th>
          <td>{{$usuario->country}}</td>
        </tr>
        <tr>
          <th>Tipo de cuenta:</th>
          @if ($usuario->type == 1)
          <td>Cliente</td>
          @else
          <td>Admin</td>
          @endif
        </tr>
      </table>
      <p></p>
    </div>


@endsection
