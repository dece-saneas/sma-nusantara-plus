@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-light" disabled>Roles</button>
                        <a href="{{ route('core.roles.create') }}" class="btn btn-sm btn-light">+</a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('core.users.index') }}" class="btn btn-sm btn-light">Users</a>
                        <a href="{{ route('core.permissions.index') }}" class="btn btn-sm btn-light">Permissions</a>
                    </div>
                </div>
                @if (count($roles) > 1)
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
                            @foreach ($roles as $no => $role)
                            @if($role->name !== 'Super Admin')
                            <tr>
                                <th class="align-middle text-center">{{ $no+1+(($roles->currentPage()-1)*10) }}</th>
                                <td class="align-middle">{{ $role->name }}</td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('core.roles.destroy', $role->id) }}" method="POST">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('core.roles.edit',$role->id) }}" class="btn btn-sm btn-light">Edit</a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-sm btn-light">Delete</button>
                                    </div>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $roles->links('layouts.pagination') }}
                </div>
                @else
                <div class="card-body text-center">
                    Empty role.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
