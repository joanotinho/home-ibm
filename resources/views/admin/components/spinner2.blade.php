@if ($agent->isDesktop())
    @include('admin.components.desktop.spinner2')
@endif

@if ($agent->isMobile())
    @include('admin.components.mobile.spinner2')
@endif