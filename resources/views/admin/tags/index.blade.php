@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Lista de Etiquetas</h1>
@stop

@section('content')
  @if (session('danger'))
    <div class="alert alert-danger">
      <strong>{{  session('danger') }}</strong>
    </div>
  @endif
  @if (session('info'))
    <div class="alert alert-success">
      <strong>{{  session('info') }}</strong>
    </div>
  @endif

  <div class="card">
    <div class="card-header">
      <a href="{{ route('admin.tags.create') }}" class="btn btn-secondary">Agregar Etiqueta</a>
    </div>
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th colspan="2">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tags as $tag)
            <tr>
              <td scope="row">{{ $tag->id }}</td>
              <td>{{ $tag->name }}</td>
              <td width="10px">
                <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-primary btn-sm">Editar</a>
              </td>
              <td width="10px">
                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                  @csrf
                  @method('delete')

                  <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@stop