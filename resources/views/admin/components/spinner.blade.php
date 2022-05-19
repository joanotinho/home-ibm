@if ($agent->isDesktop())
    @include('admin.components.desktop.spinner')
@endif

@if ($agent->isMobile())
    @include('admin.components.mobile.spinner')
@endif