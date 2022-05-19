@extends('admin.layout.master')

@section('content')

    <div class="container">
        <div class="users table-container">
            @yield('table')
        </div>
    
        <div class="editor-column form-container">
            @yield('form')
        </div>
    </div>

@endsection