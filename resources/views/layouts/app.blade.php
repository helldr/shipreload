@extends('layouts.base')

@section('body')
    <!--Site Wrapper -->
    <div class="site_wrapper">
        @yield('content')
        
        <div class="notify text-center"></div>
    </div>
@stop