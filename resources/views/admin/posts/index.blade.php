@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary btn-sm float-right">Nuevo Post</a>
  <h1>Listado de Posts</h1>
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
  
  @livewire('admin.posts-index')
@stop