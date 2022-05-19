<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Panel de administración">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Panel de Administración</title>

        @include('admin.layout.partials.styles')
        
        @include('admin.layout.partials.scripts')
    </head>
    <body>
        
        @include('admin.layout.partials.header')

        <main>
            @yield('content')
        </main>

        <x-savedChangesStatus></x-savedChangesStatus>
        <x-deleteConfirmation></x-deleteConfirmation>
        <x-cleanConfirmation></x-cleanConfirmation>
        <x-spinner2></x-spinner2>
    
    </body>
</html>