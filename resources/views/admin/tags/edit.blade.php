@extends('adminlte::page')

@section('title', 'Actualzar Etiqueta')

@section('content_header')
  <h1>Editar Etiqueta</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
      {{ Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'PUT']) }}

        @include('admin.tags._form')

        {{ Form::submit('Actualizar Etiqueta', ['class' => 'btn btn-primary']) }}
      {{ Form::close() }}
    </div>
  </div>
@stop

@section('js')
  <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
  <script>
    $(document).ready( function() {
      $("#name").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
      });
    });
  </script>
@stop