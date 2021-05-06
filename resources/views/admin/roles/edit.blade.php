@extends('adminlte::page')

@section('title', 'Actualzar Rol')

@section('content_header')
  <h1>Editar Rol</h1>
@stop

@section('content')  
  <div class="card">
    <div class="card-body">
      {{ Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT']) }}
        @include('admin.roles._form')

        {{ Form::submit('Actualizar Rol', ['class' => 'btn btn-primary']) }}
      {{ Form::close() }}
    </div>
  </div>
@stop