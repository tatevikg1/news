@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card d-flex">
            
                <div class="card-header justify-content-between d-flex ">
                    <div>{{ __('Reporters') }}</div>
                    <div>
                        <a href="/register" class="btn btn-outline-success">
                            Add
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Number of Articles</th>
                            <th>Works since</th>
                            <th>Action</th>

                        </tr>
                        <?php foreach ($reporters as $reporter): ?>
                            <tr>
                                <td>{{ $reporter->name }}</td>
                                <td>{{ count($reporter->articles) }}</td>
                                <td>{{ $reporter->created_at->format('d/m/Y') }}</td>
                                <td><a href="/profile/edit" class="btn">Edit</a></td>
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
