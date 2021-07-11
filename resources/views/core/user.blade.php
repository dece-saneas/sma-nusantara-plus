@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-light" disabled>Users</button>
                        <a href="{{ route('core.users.create') }}" class="btn btn-sm btn-light">+</a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('core.roles.index') }}" class="btn btn-sm btn-light">Roles</a>
                        <a href="{{ route('core.permissions.index') }}" class="btn btn-sm btn-light">Permissions</a>
                    </div>
                </div>
                @if (count($users) > 1)
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless table-sm">
                            <thead>
                                <tr>
                                    <th width="5%" class="align-middle text-center">#</th>
                                    <th width="40%" class="align-middle">Name</th>
                                    <th width="40%" class="align-middle">Email</th>
                                    <th width="10%" class="align-middle text-center">Role</th>
                                    <th width="5%" class="align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $no => $user)
                                @if($user->name !== 'Super Admin')
                                <tr>
                                    <th class="align-middle text-center">{{ $no+1+(($users->currentPage()-1)*10) }}</th>
                                    <td class="align-middle">{{ $user->name }}</td>
                                    <td class="align-middle">{{ $user->email }}</td>
                                    <td class="align-middle text-center">
                                        @if(isset($user->roles[0]->name))
                                        <span class="badge badge-pill badge-light py-1 px-2">{{ $user->roles[0]->name }}</span>
                                        @else
                                        <span class="badge badge-pill badge-light py-1 px-2">Not specified</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <form action="{{ route('core.users.destroy', $user->id) }}" method="POST">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('core.users.edit',$user->id) }}" class="btn btn-sm btn-light">Edit</a>
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
                </div>
                <div class="card-footer">
                    {{ $users->links('layouts.pagination') }}
                </div>
                @else
                <div class="card-body text-center">
                    Empty user.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
