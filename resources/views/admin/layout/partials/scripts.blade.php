@if ($agent->isDesktop())
    <script type="module" src="{{ mix('/admin/desktop/js/app.js') }}"></script>
@endif

@if ($agent->isMobile())
    <script type="module" src="{{ mix('/admin/mobile/js/app-mobile.js') }}"></script>
@endif