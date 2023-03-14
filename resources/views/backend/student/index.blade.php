@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Students Management</h2>
            </div>
            <!-- <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create New Student</a>
            </div> -->
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
            @foreach ($students as $key => $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                    @if(!empty($student->getRoleNames()))
                        @foreach($student->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                    </td>
                    <td>
                    <a class="btn btn-info" href="{{ route('students.show',$student->id) }}"><i class="bi bi-eye"></i></a>
                    <a class="btn btn-danger" href="{{ route('students.destroy', $student->id) }}" onclick = archiveFunction() ><i class="bi bi-archive-fill"></i></a>
                    </td>
                </tr>
             @endforeach
        </tbody>
    </table>

@endsection
