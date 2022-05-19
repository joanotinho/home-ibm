@if ($agent->isDesktop())
    @include('admin.components.desktop.clean_confirmation')
@endif

@if ($agent->isMobile())
    @include('admin.components.mobile.clean_confirmation')
@endif