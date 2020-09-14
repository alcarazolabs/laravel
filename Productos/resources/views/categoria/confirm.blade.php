@extends('plantilla.plantilla')
@section('titulo','Eliminar Categoría')

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
@section('subtitulo','Eliminar Categoria')

@section('contenido')
<hr>
<h5>¿Realmente desea eliminar la categoria?</h5>
<form method='POST', action="{{ route('categoria.destroy', $categoria->id)}}">
@method('DELETE')
@csrf
    <div class="form-group">
       <p>Nombre:</p>
       <input type="text" class="form-control" name="nombre" value="{{ $categoria->nombre }}" disabled="true">
    </div>
    <button type="submit" class="btn btn-info"><i class="fas fa-trash-alt"></i> Eliminar</button>
     <a href="{{ route('cancelar_categoria') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
</form>

@endsection