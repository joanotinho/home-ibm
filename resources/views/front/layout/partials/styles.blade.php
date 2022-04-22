@if ($agent->isDesktop())
    <link rel="stylesheet" href="{{ mix('/front/desktop/css/app.min.css') }}">
@endif

@if ($agent->isMobile())
    <link rel="stylesheet" href="{{ mix('/front/mobile/css/app-mobile.css')}}">
@endif