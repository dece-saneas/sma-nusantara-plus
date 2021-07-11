@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-light" disabled>Role</button>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('core.roles.index') }}" class="btn btn-sm btn-light">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('core.roles.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="input-name" class="col-sm-4 col-form-label text-md-right">Name</label>
                        <div class="col-sm-6">
                            <input type="test" class="form-control @error('name') is-invalid @enderror" id="input-name" placeholder="Role Name" name="name" autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="select-permission" class="col-sm-4 col-form-label text-md-right">Permission</label>
                        <div class="col-sm-6">
                            <select class="form-control @error('role') is-invalid @enderror" id="select-permission" multiple data-live-search="true" name="permission[]" autocomplete="permission">
                                @foreach ($permissions as $p)
                                <option value="{{ $p->name }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
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
