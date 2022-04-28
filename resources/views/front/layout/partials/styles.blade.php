@if ($agent->isDesktop())
    <link rel="stylesheet" href="{{ mix('/front/desktop/css/app.css') }}">
@endif

@if ($agent->isMobile())
    <link rel="stylesheet" href="{{ mix('/front/mobile/css/app-mobile.css')}}">
@endif