@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h2>Edit Profile</h2>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>
                    <input id="name" 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        name="name" value="{{ old('name') ?? $user->name }}" 
                        required 
                        autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label">{{ __('Email') }}</label>
                    <input id="email" 
                        type="text" 
                        class="form-control @error('email') is-invalid @enderror" 
                        name="email" value="{{ old('email') ?? $user->email }}" 
                        required 
                        autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="bio" class="col-md-4 col-form-label">{{ __('Bio') }}</label>
                    <textarea id="bio"
                        class="form-control @error('bio') is-invalid @enderror" 
                        name="bio"
                        rows="20"
                        required 
                        autocomplete="bio" autofocus
                    >{{ old('bio') ?? $user->bio }}</textarea>

                    @error('bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="profile_picture" class="col-md-4 col-form-label">{{ __('Profile Picture') }}</label>
                    <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                    @error('profile_picture')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary">Update Profile</button>
                </div>

            <div>
        </div> 
    </form>
</div>
@endsection
