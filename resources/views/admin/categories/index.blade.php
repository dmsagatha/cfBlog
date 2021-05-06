@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
  @can('admin.categories.create')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.categories.create') }}">Agregar Categoría</a>
  @endcan

  <h1>Lista de Categorías</h1>
@stop

@section('content')
  @include('common.messages')

  <div class="card">
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
            <tr>
              <td scope="row">{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
              <td width="10px">
                @can('admin.categories.edit')
                  <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary btn-sm">Editar</a>
                @endcan
              </td>
              <td width="10px">
                @can('admin.categories.destroy')
                  <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                    @csrf
                    @method('delete')

                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                  </form>
                @endcan
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@stop