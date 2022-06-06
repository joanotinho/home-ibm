@extends('front.layout.master')

@section('description') faqs faqs faqs @endsection

@section('title') Página de faqs @endsection

@section('content')
    @if ($agent->isDesktop())
        @include('front.components.desktop.page_title', ['title' => 'FAQs'])
        @include('front.pages.faqs.desktop.faqs', ['faqs' => $faqs])
    @endif

    @if ($agent->isMobile())
        @include('front.pages.faqs.mobile.faqs')
    @endif
@endsection