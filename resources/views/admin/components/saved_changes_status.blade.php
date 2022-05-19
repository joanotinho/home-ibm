@if ($agent->isDesktop())
    @include('admin.components.desktop.saved_changes_status')
@endif

@if ($agent->isMobile())
    @include('admin.components.mobile.saved_changes_status')
@endif