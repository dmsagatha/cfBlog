@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Listado de Posts</h1>
@stop

@section('content')
  @livewire('admin.posts-index')
@stop