@extends('layout')
@section('title', 'Categorias')
@section('encabezado', 'Lista de Categorias') 
@section('content')
    <a href="{{ route('categoryAñadir') }}" class="btn btn-primary">Nueva marca</a>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categoryList as $category)
                <tr>
                    <td>{{ $category->name}}</td>
                    <td>{{ $category->description}}</td>
                    <td>
                        <a href="{{ route('categoryAñadir',['id'=>$category->id]) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('categoryDelete', ['id' => $category->id]) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
