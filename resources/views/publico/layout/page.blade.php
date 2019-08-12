@extends('publico.layout.master')

@section('bona_css')
<link href="{{ asset('public/vendor/bona/layout-1/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendor/bona/layout-1/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendor/bona/category-sidebar/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendor/bona/category-sidebar/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendor/bona/single-post-2/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendor/bona/single-post-2/css/responsive.css') }}" rel="stylesheet">

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="{{ asset('public/vendor/bona/plugins/magnific-popup/dist/magnific-popup.css') }}">
@stack('css')
@yield('css')
@stop

@section('body')
@yield('content')
@stop

@section('bona_js')
    
    @stack('js')
    @yield('js')
@stop

@section('custom_js')
    
@stop
