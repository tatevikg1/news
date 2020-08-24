@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 20px;">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="container d-flex flex-wrap">

                <?php foreach ($articles as $article): ?>

                    <div class="card-header col-6 p-4 article" onclick="location.href='/{{ $article->id }}';">
                        <div class="small">
                            {{ $article->updated_at }}
                        </div>

                        <h5><strong>{{ ucwords($article->title) }}</strong></h5>

                        <p>
                            {{ substr($article->content, 0, 200) }}
                        </p>
                    </div>
                    <div class="vertical"></div>

                <?php endforeach; ?>

                <hr>


                    <div style="padding-left:33%;" class="mb-5">
                        {{ $articles->links("pagination::bootstrap-4") }}
                    </div>


            </div>
        </div>
    </div>
</div>
@endsection
