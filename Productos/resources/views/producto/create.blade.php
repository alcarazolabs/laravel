@extends('plantilla.plantilla')
@section('titulo','Crear Producto')

@section('cabecera')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('producto.index') }}">Productos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('categoria.index') }}">Categorias</a>
    </li>

    </ul>

@endsection
@section('subtitulo','Registrar Producto')

@section('contenido')
<hr>
<form method='POST', action="{{ route('producto.store')}}">
@csrf
    <div class="form-group">
       <p>Nombre:</p>
       <input type="text" class="form-control" name="nombre"">
    </div>
    <div class="form-group">
       <p>Precio:</p>
       <input type="text" class="form-control" name="precio"">
    </div>
    <div class="form-group">
       <p>Cantidad:</p>
       <input type="text" class="form-control" name="cantidad"">
    </div>
    <div class="form-group">
       <p>Categoria:</p>
       <select class="form-control" name="categoria">
        @foreach($categorias as $categoria)
        <option value="{{ $categoria->id }}">{{$categoria->nombre}}</option>
        @endforeach
       </select>
    </div>

    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Guardar</button>
     <a href="{{ route('cancelar_producto') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
</form>

@endsection