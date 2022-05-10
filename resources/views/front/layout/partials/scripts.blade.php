
@if ($agent->isDesktop())
    <script src="{{ mix('/front/desktop/js/app.js') }}"></script>
@endif

@if ($agent->isMobile())
    <script src="{{ mix('/front/mobile/js/app-mobile.js') }}"></script>
@endif