@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-light" disabled>Permissions</button>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('core.permissions.index') }}" class="btn btn-sm btn-light">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('core.permissions.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="input-name" class="col-sm-4 col-form-label text-md-right">Name</label>
                        <div class="col-sm-6">
                            <input type="test" class="form-control @error('name') is-invalid @enderror" id="input-name" placeholder="Permission Name" name="name" autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
