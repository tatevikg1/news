@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-4 p-3 mb-5">
                <h3>
                    <strong>{{ ucfirst($article->title) }}</strong>
                </h3>
                <small>{{ $article->updated_at }}</small>

                <p>{{  $article->content}}</p>
                <strong>{{ $author->name }}</strong>

            </div>
        </div>
    </div>
</div>
@endsection
