@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Articles') }}</div>

                <div class="card-body">
                    <ol>
                        <?php foreach ($articles as $article): ?>
                            <li>
                                {{ $article->title }}
                                {{ $article->created_at }}
                                @if ($article->confirmed == 'false')
                                    <a href="/articles/edit">Edit</a>
                                @endif
                            </li>
                        <?php endforeach; ?>
                    </ol>
                    <div class="">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
