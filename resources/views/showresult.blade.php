@extends('layouts.app')
@section('title', 'Início')
@section('data-page-id', 'home')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
        @include('_form')
    </div>
    <div class="row justify-content-center">
      <div class="col-6">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center" colspan="3">Distância a percorrer: {{ $request->distance }} MGLT</th>
            </tr>
            <tr>
              <th scope="col" class="text-center">Modelo</th>
              <th scope="col" class="text-center">Parada(s)</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reloads as $ship)
            <tr>
              <th scope="row">{{ $ship['shipname'] }}</th>
              <td class="text-center">{{ $ship['stops'] }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop
