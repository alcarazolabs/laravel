@extends('plantilla.plantilla')
@section('titulo','Editar Producto')

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
@section('subtitulo','Editar Producto')

@section('contenido')
<hr>
<form method='POST', action="{{ route('producto.update',$producto->id)}}">
@method('PUT')
@csrf
    <div class="form-group">
       <p>Nombre:</p>
       <input type="text" class="form-control" name="nombre" value="{{ $producto->nombre }}">
    </div>
    <div class="form-group">
       <p>Precio:</p>
       <input type="text" class="form-control" name="precio" value="{{ $producto->precio }}">
    </div>
    <div class="form-group">
       <p>Cantidad:</p>
       <input type="text" class="form-control" name="cantidad" value="{{ $producto->cantidad }}">
    </div>
    <div class="form-group">
       <p>Categoria:</p>
       <!--
       <select name="categoria" class="form-control">
       <option value="{{ $producto->categoria_id }}">{{ $producto->categoria->nombre }}</option>
       
        @foreach($categorias as $categoria)
        @if($categoria->id != $producto->categoria_id)
        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
        @endif
        
        @endforeach
       </select>
       -->
       <select name="categoria" class="form-control">
        @foreach($categorias as $categoria)
        
        <option
         @if($categoria->id == $producto->categoria_id)
         selected="true"
        @endif value="{{$categoria->id}}"> {{$categoria->nombre}}</option>
 
        @endforeach
       </select>
    </div>
    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Actualizar</button>
     <a href="{{ route('cancelar_producto') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
</form>

@endsection