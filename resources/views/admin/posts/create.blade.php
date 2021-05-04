@extends('adminlte::page')

@section('title', 'Crear Post')

@section('content_header')
  <h1>Crear nuevo Post</h1>
@stop

@section('content')
  @if (session('info'))
    <div class="alert alert-success">
      <strong>{{  session('info') }}</strong>
    </div>
  @endif
  
  <div class="card">
    <div class="card-body">
      {{ Form::open(['route' => 'admin.posts.store']) }}
      
        <div class="form-group">
          {{ Form::label('name', 'Nombre') }}
          {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Post']) }}
          {!! $errors->first('name', '<div class="text-danger">:message</div>') !!}
        </div>

        <div class="form-group">
          {{ Form::label('slug', 'Slug') }}
          {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la Etiqueta', 'readonly']) }}
          {!! $errors->first('slug', '<div class="text-danger">:message</div>') !!}
        </div>

        <div class="form-group">
          {{ Form::label('category_id', 'Categorías:') }}
          {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
          {!! $errors->first('category_id', '<div class="text-danger">:message</div>') !!}
        </div>

        <div class="form-group">
          <p class="font-weight-bold">Etiquetas:</p>

          @foreach ($tags as $tag)
            <label class="mr-2">
              {{ Form::checkbox('tags[]', $tag->id, null) }}
              {{ $tag->name }}
              {!! $errors->first('tag_id', '<div class="text-danger">:message</div>') !!}
            </label>
          @endforeach
        </div>

        <div class="form-group">
          <p class="font-weight-bold">Estado:</p>

          <label class="mr-2">
            {{ Form::radio('status', 1, true) }} Borrador
            {{ Form::radio('status', 2, false) }} Publicado
          </label>
        </div>

        <div class="form-group">
          {{ Form::label('extract', 'Extracto:') }}
          {{ Form::textarea('extract', null, ['class' => 'form-control']) }}
          {!! $errors->first('extract', '<div class="text-danger">:message</div>') !!}
        </div>

        <div class="form-group">
          {{ Form::label('body', 'Descripción:') }}
          {{ Form::textarea('body', null, ['class' => 'form-control']) }}
          {!! $errors->first('body', '<div class="text-danger">:message</div>') !!}
        </div>

        {{ Form::submit('Crear Post', ['class' => 'btn btn-primary']) }}
      {{ Form::close() }}
    </div>
  </div>
@stop

@section('js')
  <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

  <script>
    $(document).ready( function() {
      $("#name").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
      });
    });

    ClassicEditor
      .create( document.querySelector( '#extract' ) )
      .catch( error => {
          console.error( error );
      });

    ClassicEditor
      .create( document.querySelector( '#body' ) )
      .catch( error => {
          console.error( error );
      });
  </script>
@stop