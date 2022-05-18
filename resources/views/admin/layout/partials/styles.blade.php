@if ($agent->isDesktop())
    <link rel="stylesheet" href="{{ mix('admin/desktop/css/app.css') }}">
@endif

@if ($agent->isMobile())
    <link rel="stylesheet" href="{{ mix('admin/mobile/css/mobile-app.css')}}">
@endif