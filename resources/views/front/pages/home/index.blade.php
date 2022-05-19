@extends('front.layout.master')

@section('description') Inicio inicio inicio @endsection

@section('title') Página de inicio @endsection

@section('content')

    @if ($agent->isDesktop())
        @include('front.components.desktop.page_title', ['title' => 'Inicio'])
        @include("front.pages.home.desktop.home")
    @endif

    @if ($agent->isMobile())
        @include("front.pages.home.mobile.home")
    @endif
@endsection