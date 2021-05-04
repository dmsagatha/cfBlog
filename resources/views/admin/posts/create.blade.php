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
      {{ Form::open(['route' => 'admin.posts.store', 'files' => true]) }}

        {!! Form::hidden('user_id', auth()->user()->id) !!}
      
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
            </label>
          @endforeach

          {!! $errors->first('tags', '<div class="text-danger">:message</div>') !!}
        </div>

        <div class="form-group">
          <p class="font-weight-bold">Estado:</p>

          <label class="mr-2">
            {{ Form::radio('status', 1, true) }} Borrador
            {{ Form::radio('status', 2, false) }} Publicado
          </label>
        </div>

        <div class="row mb-3">
          <div class="col">
            <div class="image-wrapper">
              <img id="picture" src="https://cdn.pixabay.com/photo/2021/04/13/14/22/panther-6175825_960_720.jpg" alt="">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              {{ Form::label('file', 'Imagen que se mostrará en el Post') }}
              {{ Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) }}
              {!! $errors->first('file', '<div class="text-danger">:message</div>') !!}
            </div>

            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti adipisci blanditiis hic consectetur a non sunt quam est, dolor, consequuntur aut ab? Autem, animi? Quis sit ipsum esse fugit facilis?</p>
          </div>
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

@section('css')
  <style>
    .image-wrapper {
      position: relative;
      padding-bottom: 56.25%;
    }

    .image-wrapper img {
      position: absolute;
      object-fit: cover;
      width: 100%;
      height: 100%;
    }
  </style>
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
    
    // Cambiar la imagen
    document.getElementById("file").addEventListener('change', cambiarImagen);

    function cambiarImagen(event) {
      var file = event.target.files[0];

      var reader = new FileReader();
      reader.onload = (event) => {
        document.getElementById("picture").setAttribute('src', event.target.result);
      };

      reader.readAsDataURL(file);
    }
  </script>
@stop