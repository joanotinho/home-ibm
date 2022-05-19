@extends('front.layout.master')

@section('description') caja caja caja @endsection

@section('title') Página de caja @endsection

@section('content')
    @if ($agent->isDesktop())
        @include('front.components.desktop.page_title', ['title' => 'Caja'])
        @include('front.pages.checkout.desktop.checkout')
    @endif

    @if ($agent->isMobile())
        @include('front.pages.checkout.mobile.checkout')
    @endif
@endsection