@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card d-flex">
                <div class="card-header">
                    {{ __('Reporters') }}
                    <a href="/register" class="btn btn-success" style="margin-left:70%">Add Reporter</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Number of Articles</th>
                            <th>Works since</th>

                        </tr>
                        <?php foreach ($reporters as $reporter): ?>
                            <tr>
                                <td>{{ $reporter->name }}</td>
                                <td>{{ count($reporter->articles) }}</td>
                                <td>{{ $reporter->created_at->format('d/m/Y') }}</td>

                            </tr>

                        <?php endforeach; ?>
                    </table>
                    <div class="">
                        {{ $reporters->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
