@if ($agent->isDesktop())
    @include('admin.components.desktop.delete_confirmation')
@endif

@if ($agent->isMobile())
    @include('admin.components.mobile.delete_confirmation')
@endif