@extends('layout')
@section('title', $product-> id ? 'Actualizar Producto' : ' Nuevo Producto')
@section('encabezado', $product-> id ? 'Actualizar Producto' : 'Añadir Productos') 
@section('content')

<form action="{{ route('prodSave') }}"  method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ old('id') ? old('id'): $product->id }}">
    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') ? old('name') : $product->name }}">
    @error('name')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
    <input type="number" class="form-control" id="cost" name="cost" placeholder="Cost" value="{{ old('cost') ? old('cost'): $product->cost }}">
    @error('cost')
    <div class="text-danger">
        {{ $message }}
    </div>
@enderror
    <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price') ? old('price'): $product->price }}">
    @error('price')
    <div class="text-danger">
        {{ $message }}
    </div>
@enderror
    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="{{ old('quantity') ? old('quantity'): $product->quantity }}">
    @error('quantity')
    <div class="text-danger">
        {{ $message }}
    </div>
@enderror
    <select name="brand" class="form-select">
        @foreach ($brands as $brand)
        <option value="{{ $brand->id }}" {{ $product->brand->id = $brand->id ? "selected" : "" }}>
            {{ $brand->name }}
        </option>
        @endforeach
    </select>
    @error('brand')
    <div class="text-danger">
        {{ $message }}
    </div>
@enderror
<a href="/products" class="btn btn-secondary">Cancelar</a>
    <button class="btn btn-primary" type="submit">Guardar</button>
</form>
@endsection