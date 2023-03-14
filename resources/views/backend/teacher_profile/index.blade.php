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


    <table id="data-table" class="table table-striped table-bordered">
        <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
        <th width="280px">Action</th>
        </tr>
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
                <a class="btn btn-info" href="{{ route('teachers.show',$teacher->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('teachers.edit',$teacher->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['teachers.destroy', $teacher->id] , 'onclick' => 'archiveFunction()' ,'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>


<script>
    function archiveFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        })
    }
</script>
@endsection