@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('New Article') }}</div>

                <div class="card-body">
                    <form class="" action="/articles" method="post" id="newArticle">
                        @csrf

                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Title" id="title">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <textarea name="content" class="mt-3 form-control @error('content') is-invalid @enderror" rows="12" form="newArticle" placeholder="Content" id="content" >
                            {{ old('content') }}
                        </textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="d-flex mt-3">
                            <?php foreach ($themes as  $key => $theme): ?>
                                <div class="mr-4 ">
                                    <label for="theme{{ $theme->id }}">
                                        <input type="checkbox" name="themes[{{ $key }}]" id="theme{{ $theme->id }}" value="{{ $theme->id }}">

                                        {{ $theme->theme }}
                                     </label>
                                </div>
                            <?php endforeach; ?>

                        </div>

                        @error('themes')
                        <span class="invalid-feedback" role="alert">
                            <strong>Select at least one theme.</strong>
                        </span>
                        @enderror

                        <input type="submit" value="Save" class="mt-3 btn btn-dark">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
