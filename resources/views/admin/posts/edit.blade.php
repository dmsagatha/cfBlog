@extends('adminlte::page')

@section('title', 'Editar Post')

@section('content_header')
  <h1>Editar Post</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
      {{ Form::model($post, ['route' => ['admin.posts.update', $post], 'files' => true, 'method' => 'PUT']) }}
      
        @include('admin.posts._form')

        {{ Form::submit('Actualizar Post', ['class' => 'btn btn-primary']) }}
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