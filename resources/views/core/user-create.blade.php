@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-light" disabled>Users</button>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('core.users.index') }}" class="btn btn-sm btn-light">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('core.users.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="input-name" class="col-sm-4 col-form-label text-md-right">Name</label>
                        <div class="col-sm-6">
                            <input type="test" class="form-control @error('name') is-invalid @enderror" id="input-name" name="name" autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input-email" class="col-sm-4 col-form-label text-md-right">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="input-email" autocomplete="email" name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="select-role" class="col-sm-4 col-form-label text-md-right">Role</label>
                        <div class="col-sm-6">
                            <select class="form-control @error('role') is-invalid @enderror" id="select-role" name="role" autocomplete="role">
                                @foreach ($roles as $r)
                                <option value="{{ $r->name }}">{{ $r->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input-password" class="col-sm-4 col-form-label text-md-right">Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="input-password" name="password" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input-password-confirm" class="col-sm-4 col-form-label text-md-right">Confirm Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="input-password-confirm" name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
