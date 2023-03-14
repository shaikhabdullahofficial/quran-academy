@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Admin Management</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New Admin</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif

    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                    </td>
                    <td>
                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}"><i class="bi bi-eye"></i></a>
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-danger" href="{{ route('users.destroy',$user->id) }}" onclick = archiveFunction() ><i class="bi bi-archive-fill"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
