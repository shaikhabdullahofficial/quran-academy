@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student Package</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('studet-package-create') }}"> Create New Student Package</a>
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
            <th>Principle Type</th>
            <th>Date</th>
            <th>Class Time</th>
            <th>Days</th>
            <th>Start Time</th>
            <th>Price</th>
            <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ( $student_packages as $key => $student_package)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$student_package->principle_type ?? 'N/A' }}</td>
                    <td>{{$student_package->date ?? 'N/A' }}</td>
                    <td>{{$student_package->class_time ?? 'N/A' }}</td>
                    <td>{{$student_package->days ?? 'N/A' }}</td>
                    <td>{{$student_package->time ?? 'N/A' }}</td>
                    <td>{{$student_package->price ?? 'N/A' }}</td>
                    <td>
                    <a class="btn btn-info" href=""><i class="bi bi-eye"></i></a>
                    <a class="btn btn-primary" href="{{ route('studet-package-edit',$student_package->id) }}"><i class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-danger" href="{{ route('studet-package-destroy',$student_package->id) }}" onclick = archiveFunction() ><i class="bi bi-archive-fill"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
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
