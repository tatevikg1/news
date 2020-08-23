@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 70px;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="container d-flex flex-wrap">

                <?php foreach ($articles as $article): ?>

                    <div class="card-header col-5 m-3 article" style="background-color:lightgreen"
                    onclick="location.href='/{{ $article->id }}';">
                        <div class="small">
                            {{ $article->updated_at }}
                        </div>

                        <h5>{{ $article->title }}</h5>

                        <p>
                            {{ substr($article->content, 0, 50) }}
                        </p>
                    </div>


                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
@endsection
