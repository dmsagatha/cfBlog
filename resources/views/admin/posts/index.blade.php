@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary btn-sm float-right">Nuevo Post</a>
  <h1>Listado de Posts</h1>
@stop

@section('content')
  @livewire('admin.posts-index')
@stop