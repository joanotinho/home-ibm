@extends('front.layout.master')

@section('description') Contacto contacto contacto @endsection

@section('title') Página de contacto @endsection

@section('content')

    @if($agent->isDesktop())
        @include('front.pages.contact.desktop.contact')
    @endif

    @if($agent->isMobile())
        @include('front.pages.contact.mobile.contact')
    @endif
    
@endsection