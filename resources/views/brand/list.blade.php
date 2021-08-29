@extends('layout')
@section('title', 'Marcas')
@section('encabezado', 'Lista de Marcas') 
@section('content')
    <a href="{{ route('brandAñadir') }}" class="btn btn-primary">Nueva marca</a>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brandList as $brand)
                <tr>
                    <td>{{ $brand->name}}</td>
                    <td>
                        <a href="{{ route('brandAñadir',['id'=>$brand->id]) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('brandDelete', ['id' => $brand->id]) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
