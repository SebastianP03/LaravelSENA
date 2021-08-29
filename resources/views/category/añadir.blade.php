@extends('layout')
@section('title', $brand-> id ? 'Actualizar Marca' : ' Nuevo Marca')
@section('encabezado', $brand-> id ? 'Actualizar Marca' : 'Añadir Marcas') 
@section('content')

<form action="{{ route('brandSave') }}"  method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ old('id') ? old('id'): $brand->id }}">
    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') ? old('name') : $brand->name }}">
    @error('name')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
<a href="/brands" class="btn btn-secondary">Cancelar</a>
    <button class="btn btn-primary" type="submit">Guardar</button>
</form>
@endsection