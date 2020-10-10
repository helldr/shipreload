@extends('layouts.app')
@section('title', 'Início')
@section('data-page-id', 'home')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      @include('_form')
    </div>
  </div>
@stop
