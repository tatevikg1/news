@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Articles') }}</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <?php foreach ($articles as $article): ?>
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>{{ $article->updated_at }}</td>

                                @if ($article->confirmed == 'false')
                                    <td>
                                        <a href="/articles/{{ $article->id }}/edit" class='badge badge-warning'>Edit</a>
                                    </td>
                                    <td>
                                        <a href="/articles/{{ $article->id }}/send" class="badge badge-success">Send</a>
                                    </td>

                                @endif

                            </tr>

                        <?php endforeach; ?>
                    </table>
                    <div class="">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
