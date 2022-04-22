<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        @include('admin.layout.partials.styles')
    </head>
    <body>
        
        @include('admin.layout.partials.header')

        <main id="main">
            @yield('content')
        </main>

        @include('admin.layout.partials.scripts')
    </body>
</html>