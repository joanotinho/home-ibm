@extends('front.layout.master')

@section('content')

    <div class="faqs-container">

        <div class="faqs-title">
            <h1>Faqs</h1>
        </div>        

        <div class="faqs">
            @include('front.components.desktop.faqs')
            @include('front.components.desktop.faqs')
            @include('front.components.desktop.faqs')
        </div>
    </div>
    
@endsection
        