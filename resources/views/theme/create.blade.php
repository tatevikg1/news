@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('New Theme') }}</div>

                <div class="card-body">
                    <form class="" action="{{route('theme.store')}}" method="post" id="saveForm">
                        @csrf

                        <input type="text" name="theme" class="form-control @error('theme') is-invalid @enderror"
                            value="{{  old('theme') }}"  id="theme">

                        @error('theme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </form>

                    <div class="d-flex justify-content-around">
                        <input type="submit" form="saveForm" value="Save" class="mt-3 btn btn-outline-success">
                        <a href="{{ route('theme.create') }}" class="mt-3 ml-3 btn btn-outline-secondary">Cancel</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
