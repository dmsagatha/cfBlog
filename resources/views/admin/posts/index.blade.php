@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
  <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary btn-sm float-right">Nuevo Post</a>
  <h1>Listado de Posts</h1>
@stop

@section('content')
  @include('common.messages')
  
  @livewire('admin.posts-index')
@stop