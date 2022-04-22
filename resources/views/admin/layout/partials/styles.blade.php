@if ($agent->isDesktop())
    <link rel="stylesheet" href="{{ mix('/admin/desktop/css/app.min.css') }}">
@endif

@if ($agent->isMobile())
    <link rel="stylesheet" href="{{ mix('/admin/mobile/css/app-mobile.css')}}">
@endif