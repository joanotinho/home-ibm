@extends('front.layout.master')

@section('description') Carrito carrito carrito @endsection

@section('title') Página de carrito @endsection

@section('content')
    @if ($agent->isDesktop())
        @include('front.pages.cart.desktop.cart')
    @endif

    @if ($agent->isMobile())
        @include('front.pages.cart.mobile.cart')
    @endif
@endsection