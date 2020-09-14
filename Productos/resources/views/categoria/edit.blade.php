@extends('plantilla.plantilla')
@section('titulo','Editar Categoría')

@section('cabecera')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link " href="{{ route('producto.index') }}">Productos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('categoria.index') }}">Categorias</a>
    </li>

    </ul>

@endsection
@section('subtitulo','Editar Categoria')

@section('contenido')
<hr>
<form method='POST', action="{{ route('categoria.update',$categoria->id)}}">
@method('PUT')
@csrf
    <div class="form-group">
       <p>Nombre:</p>
       <input type="text" class="form-control" name="nombre" value="{{ $categoria->nombre }}">
    </div>
    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i>Actualizar</button>
     <a href="{{ route('cancelar_categoria') }}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
</form>

@endsection