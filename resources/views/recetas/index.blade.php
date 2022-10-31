@extends('layouts.app')
@section('botones')
<!--<a href="/receta/create" class="btn btn-primary mr-2 text-white">Crear Receta</a>-->
<a href="{{route('receta.create')}}" class="btn btn-primary mr-2 text-white">Crear Receta</a>
@endsection

@section('content')

<h2 class="text-center mb-5">Administrar tus recetas </h2>

<div class="col-md-10 mx-auto bg-white p-3">
  <table class="table">
    <thead class="bg-primary text-light">
      <tr>
        <th scole="col">Titulo</th>
        <th scole="col">Categoria</th>
        <th scole="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($recetas as $receta)
      <tr>
        <td>{{$receta->titulo}}</td>
        <td>{{$receta->categoria->nombre}}</td>
              <eliminar-receta
              receda-id={{$receta->id}}
              ></eliminar receta>
        <td>
          <form class="" action="{{route('receta.destroy',['receta'=>$receta->id])}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger mb-2 w-100 d-block" value="Eliminar &times;">
          </form>
          <a href="{{route('receta.edit',['receta'=>$receta->id])}}" class="btn btn-dark d-block mb-2">Editar</a>
          <!--<a href="/receta/{{$receta->id}}" class="btn btn-success mr-1">Ver</a>-->
          <a href="{{route('receta.show',['receta'=>$receta->id])}}" class="btn btn-success d-block mb-2">Ver</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection
