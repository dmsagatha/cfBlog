@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
  @can('admin.roles.create')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.roles.create') }}">Agregar Role</a>
  @endcan

  <h1>Lista de Roles</h1>
@stop

@section('content')
  @include('common.messages')

  <div class="card">
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Rol</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
            <tr>
              <td scope="row">{{ $role->id }}</td>
              <td>{{ $role->name }}</td>
              <td width="10px">
                @can('admin.roles.edit')
                  <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-primary btn-sm">Editar</a>
                @endcan
              </td>
              <td width="10px">
                @can('admin.roles.destroy')
                  <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
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