@extends('front.layout.master')

@section('description') faqs faqs faqs @endsection

@section('title') Página de faqs @endsection

@section('content')
    @if ($agent->isDesktop())
        @include('front.pages.faqs.desktop.faqs')
    @endif

    @if ($agent->isMobile())
        @include('front.pages.faqs.mobile.faqs')
    @endif
@endsection