<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        @include('front.layout.partials.styles')
    </head>
    <body>
        
        @include('front.layout.partials.header')

        <main id="main">
            @yield('content')
        </main>

        @include('front.layout.partials.footer')

        @include('front.layout.partials.scripts')
    </body>
</html>