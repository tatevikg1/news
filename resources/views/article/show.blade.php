@extends('layouts.staff')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $article->title }}</h3>
                        <h5 class="mt-3">

                            {{ $article->content }}

                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
