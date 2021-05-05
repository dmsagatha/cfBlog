@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content')
  @include('common.messages')

  @livewire('admin.users-index')
@stop