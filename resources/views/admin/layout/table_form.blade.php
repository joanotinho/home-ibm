@extends('admin.layout.master')

@section('content')

    <div class="container">
        <div class="users">
            @yield('table')
        </div>
    
        <div class="editor-column">
            @yield('form')
        </div>
    </div>

@endsection