@extends('front.layout.master')

@section('description') productos productos productos @endsection

@section('title') Página de productos @endsection

@section('content')
    @if ($agent->isDesktop())
        @include('front.components.desktop.page_title', ['title' => 'Productos'])
        @include('front.pages.products.desktop.products')
    @endif

    @if ($agent->isMobile())
        @include('front.pages.products.mobile.products')
    @endif
@endsection