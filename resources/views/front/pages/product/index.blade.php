@extends('front.layout.master')

@section('description') producto producto producto @endsection

@section('title') Página de producto @endsection

@section('content')
    @if ($agent->isDesktop())
        @include('front.components.desktop.page_title', ['title' => 'Producto'])
        @include('front.pages.product.desktop.product')
    @endif

    @if ($agent->isMobile())
        @include('front.pages.product.mobile.product')
    @endif
@endsection