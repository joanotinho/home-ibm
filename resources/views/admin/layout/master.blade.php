<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="@yield('description')">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>

        @include('admin.layout.partials.styles')
        
        @include('admin.layout.partials.scripts')
    </head>
    <body>
        
        @include('admin.layout.partials.header')

        <main>
            @yield('content')
        </main>

    </body>
</html>