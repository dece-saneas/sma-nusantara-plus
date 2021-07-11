@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button class="btn btn-sm btn-light" disabled>Permissions</button>
                        <a href="{{ route('core.permissions.create') }}" class="btn btn-sm btn-light">+</a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('core.users.index') }}" class="btn btn-sm btn-light">Users</a>
                        <a href="{{ route('core.roles.index') }}" class="btn btn-sm btn-light">Roles</a>
                    </div>
                </div>
                @if (count($permissions) > 0)
                <div class="card-body">
                    <table class="table table-borderless table-sm">
                        <thead>
                            <tr>
                                <th width="5%" class="align-middle text-center">#</th>
                                <th width="90%" class="align-middle">Name</th>
                                <th width="5%" class="align-middle text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $no => $p)
                            <tr>
                                <th class="align-middle text-center">{{ $no+1+(($permissions->currentPage()-1)*10) }}</th>
                                <td class="align-middle">{{ $p->name }}</td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('core.permissions.destroy', $p->id) }}" method="POST">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('core.permissions.edit',$p->id) }}" class="btn btn-sm btn-light">Edit</a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-sm btn-light">Delete</button>
                                    </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $permissions->links('layouts.pagination') }}
                </div>
                @else
                <div class="card-body text-center">
                    Empty permission.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
