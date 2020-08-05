@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('New Article') }}</div>

                <div class="card-body">
                    <form class="" action="/articles/{{ $article->id }}" method="post" id="newArticle">
                        @csrf
                        @method('PUT')

                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{  old('title') ?? $article->title }}"  id="title">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <textarea name="content" class="mt-3 form-control @error('content') is-invalid @enderror"
                            rows="12" form="newArticle"  id="content" >

                            @if ( old('content') )

                                    {{ old('content') }}
                            @else
                                    {{ $article->content ?? '' }}
                            @endif
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
                                        <input type="checkbox" name="themes[]" id="theme{{ $theme->id }}"
                                            value="{{ $theme->id }}"
                                            @if (old('themes'))
                                                @if(is_array(old('themes')) && in_array($theme->id, old('themes'))) checked @endif
                                            @else
                                                @if(in_array($theme->id, $article->themes->id)) checked @endif
                                            @endif>

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

                        <div class="d-flex">
                            <input type="submit" value="Save" class="mt-3 btn btn-dark">
                            <a href="/articles" class="mt-3 ml-3 btn btn-dark">Cancel</a>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
