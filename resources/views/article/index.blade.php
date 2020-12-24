@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Articles') }} bla bla</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <?php foreach ($articles as $article): ?>
                            <tr class="table_row">
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>{{ $article->updated_at }}</td>
                                
                                @if ($article->published == 'true')
                                    <td>
                                        <a href="/{{ $article->id }}" class="btn btn-outline-success">Published</a>
                                    </td>
                                @elseif($article->user_id == 1)
                                    <td>
                                        <a href='articles/{{ $article->id }}/edit' class="btn btn-outline-secondary">Edit</a>
                                    </td>
                                @elseif ($article->sent == 'true' )
                                    <td>
                                        <a href='articles/{{ $article->id }}' class="btn btn-outline-secondary">Sent</a>
                                    </td>
                                @else
                                    <td>
                                        <send-button url="/articles/{{ $article->id }}/edit" article-id="{{ $article->id }}" sent="{{ $article->sent }}"></send-button>
                                    </td>
                                @endif
                                <td>{{ $article->sent }} </td>
                            </tr>

                        <?php endforeach; ?>
                    </table>
                    <div style="padding-left:35%">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
