@extends('front.layout.master')

@section('description') productos productos productos @endsection

@section('title') Página de productos @endsection

@section('content')
    @if ($agent->isDesktop())
        @include('front.components.desktop.page_title', ['title' => '¡Compra realizada!'])
        @include('front.pages.purchase_success.desktop.purchase_success')
    @endif

    @if ($agent->isMobile())
    @include('front.pages.purchase_success.mobile.purchase_success')
    @endif
@endsection