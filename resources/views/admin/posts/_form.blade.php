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
      @isset ($post->image)
        <img id="picture" src="{{ Storage::url($post->image->url) }}">
      @else
        <img id="picture" src="https://cdn.pixabay.com/photo/2021/04/13/14/22/panther-6175825_960_720.jpg">
      @endisset
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