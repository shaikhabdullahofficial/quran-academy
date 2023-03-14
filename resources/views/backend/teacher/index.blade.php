@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Teachers Management</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('teachers.create') }}"> Create New Teacher</a>
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
            @foreach ($teachers as $key => $teacher)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>
                    @if(!empty($teacher->getRoleNames()))
                        @foreach($teacher->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                    </td>
                    <td>
                    <a class="btn btn-info" href="{{ route('teachers.show',$teacher->id) }}"><i class="bi bi-eye"></i></a>
                    <a class="btn btn-primary" href="{{ route('teachers.edit',$teacher->id) }}"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-danger" href="{{ route('teachers.destroy',$teacher->id) }}" onclick = archiveFunction() ><i class="bi bi-archive-fill"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection