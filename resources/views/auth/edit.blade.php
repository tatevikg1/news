@extends('layouts.staff')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="/profile/update">
                        @csrf

                        <div class="row justify-content-center">
                            <div class="form-group col-6">
                                <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                                <input readonly type="text" class="form-control" value="{{ $user->name }}">
                            </div>

                            <div class="form-group col-6">
                                <label for="" class="col-form-label text-md-right">{{ __('E-mail') }}</label>
                                <input readonly type="text" class="form-control" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6 ">
                                <label for="email" class="col-form-label text-md-right">{{ __('New E-mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="password" class="col-form-label text-md-right">{{ __('New Password') }}</label>
                                <input id="password" value="{{ old('password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="biography" class="col-form-label text-md-right">{{ __('Biography') }}</label>
                            <textarea name="biography" id="biography" class="form-control @error('biography') is-invalid @enderror" rows="8">
                                {{ $user->biography }}
                            </textarea>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 btn-hover">
                                <button type="submit" class="btn btn-link">
                                    {{ __('Save Changes') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
