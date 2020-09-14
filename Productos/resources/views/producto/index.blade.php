@extends('plantilla.plantilla')
@section('titulo','Productos')

@section('cabecera')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href=" {{ route('producto.index') }} ">Productos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('categoria.index') }}">Categorias</a>
    </li>

    </ul>

@endsection
@section('subtitulo','Lista de Productos')

@section('contenido')

<div class="row float-left">
    <a href="{{ route('producto.create') }}" class="btn btn-info"><i class="fas fa-user-plus"></i> Nuevo Producto</a>
</div>
<br>
@if(session('datos'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('datos') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif


@if(session('cancelar'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
{{ session('cancelar') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif

<nav class="navbar navbar-light float-right">
  <form class="form-inline">
    <input name="buscarpornombre" class="form-control mr-sm-2" type="search" placeholder="Nombre.." aria-label="Search">
    
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
  </form>
</nav>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Categoría</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
  @foreach($productos as $producto)
    <tr>
      <th scope="row">{{$producto->id}}</th>
      <td>{{$producto->nombre}}</td>
      <td>{{$producto->precio}}</td>
      <td>{{$producto->cantidad}}</td>
      <td>{{$producto->categoria->nombre}}</td>
    <td>
      <a href="{{ route('producto.edit',$producto->id)}}" class="btn btn-success">
       <i class="fa fa-edit"></i> Editar  </a>
        <a href="{{ route('producto.confirm',$producto->id)}}" class="btn btn-danger">
        <i class="fa fa-trash-alt"></i> Eliminar  </a>
     </td>

    </tr>
  @endforeach
   </tbody>
   </table>

  {{ $productos }}
 
@endsection