@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-between d-flex ">
                    <div>{{ __('Themes') }}</div>
                    <div>
                        <a href="{{route('theme.create')}}" class="btn btn-outline-success">
                            Add
                        </a>
                    </div>
                </div>


                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <th>Created at</th>
                            <th colspan="2">Action</th>
                        </tr>

                        <?php foreach ($themes as $theme): ?>
                            <tr class="table_row">
                                <td>{{ ucfirst($theme->theme) }}</td>
                                <td>{{ $theme->created_at }}</td>
                                <td><a href="{{route('theme.delete', ['theme' => $theme->id])}}" class="btn btn-outline-danger">
                                        Delete
                                    </a>
                                </td>                         
                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
