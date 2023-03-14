@extends('layouts.app')

@section('content')

<style>
    li{
        list-style: none;
        font-family: 'Times New Roman';
    }
    h1{
        font-family: 'Times New Roman';
    }
</style>

    {{-- <form action="{{ route('students.index') }}" method="get">
        <label for="teacher">Filter by teacher:</label>
        <select name="teacher" id="teacher">
            <option value="">All teachers</option>

      @foreach ($teachers as $t)
                <option value="{{ $t->id }}" {{ $selectedTeacher && $selectedTeacher->id == $t->id ? 'selected' : '' }}>{{ $t->first_name }}</option>

            @endforeach
            </select>
            <button type="submit">Filter</button>
        </form> --}}

        {{-- <table class="table table-hover fs-2">
            <tr>
                <th class="text-center">Course Name</th>
                <th class="text-center">Student Fee</th>
                <th class="text-center">Teacher Fee</th>
            </tr>
            <tr>
                <td class="text-center">{{ $course->course_name ?? 'N/A'}}</td>
                <td class="text-center">{{ $course->student_fee ?? 'N/A'}}</td>
                <td class="text-center">{{ $course->teacher_fee ?? 'N/A'}}</td>
            </tr>
        </table> --}}

        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h1 class="mt-5">Students Selected Teacher</h1>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-6">
                        <h1 class="mt-2 ml-4">Student</h1>
                        <ul>
                            @foreach ($teachers as $t)
                                <li class="fs-1">{{ $t->first_name }}</li>
                            @endforeach
                         </ul>
                       </div>
                       <div class="col-lg-6">
                        <h1 class="mt-2">Teacher</h1>
                        <ul>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->teacherget->name}}</td>
                                </tr>
                            @endforeach
                         </ul>
                       </div>

                    </div>
                </div>
            </div>



    {{-- <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Teacher</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
@endsection
