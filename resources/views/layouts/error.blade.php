@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <h1>404, Page not found!</h1>
        <!-- @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif -->
    </div>
</div>
@endsection
