<div class="form-group">
  {{ Form::label('name', 'Nombre') }}
  {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la Etiqueta']) }}
  {!! $errors->first('name', '<div class="text-danger">:message</div>') !!}
</div>

<div class="form-group">
  {{ Form::label('slug', 'Slug') }}
  {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la Etiqueta', 'readonly']) }}
  {!! $errors->first('slug', '<div class="text-danger">:message</div>') !!}
</div>

<div class="form-group">
  {{-- <label for="">Color:</label>

  <select name="color" id="" class="form-control">
    <option value="red">Color rojo</option>
    <option value="green">Color verde</option>
    <option value="blue">Color azul</option>
  </select> --}}

  {{ Form::label('color', 'Color:') }}
  {{ Form::select('color', $colors, null, ['class' => 'form-control']) }}
  {!! $errors->first('color', '<div class="text-danger">:message</div>') !!}
</div>