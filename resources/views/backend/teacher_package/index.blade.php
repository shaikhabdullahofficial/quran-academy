@extends('layouts.app')
@push('css')
    <style>
        a.btn.btn-info:hover {
            color: #000 !important;
            background: #fff !important;
        }

        i.bi.bi-eye {
            color: #000 !important;
        }

        a.btn.btn-info {
            background: #fff !important;
        }

        .class_scheduling {
            background: #fff;
            padding: 20px 20px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .subheading {
            border: 2px solid #dfdbdb;
            padding: 4px 0px;
        }

        .subheading h2 {
            text-align: center;
            font-size: 16px;
            font-family: revert;
            color: #9c8a4c;
            font-weight: 600;
        }

        .selected_schedule {
            padding: 5px 10px 0px 10px;
            border: 2px solid #dfdbdb;
            margin-top: 10px;
            color: #9c8a4c;
            font-weight: 600;
            background: #ededed5c;
        }

        p {
            margin-top: 0;
            margin-bottom: 5px;
        }

        .teacher_description h2 {
            text-align: center;
            margin-top: 30px;
            color: #9c8a4c;
            font-family: cursive;
        }
        #first {
        display: none; /* hide the element initially */
        }
        .alldata {
            background-color: #9c8a4c;

        }
        .alldata p {
            font-family: 'Times New Roman';
        }
    </style>
@endpush
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <section class="timeline_area section_padding_130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-lg-6">
                    <!-- Section Heading-->
                    <div class="section_heading text-center">
                        <p class="fs-1">Teacher Class Scheduling</p>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <form action="{{ route('store-teacher-select') }}" method="POST" id="">@csrf
                <div class="row">
                    <div class="col-12">
                        <!-- Timeline Area-->
                        <div class="apland-timeline-area">
                            <!-- Single Timeline Content-->
                            <div class="single-timeline-area">
                                <div class="container mt-5">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card myfunction alldata p-3" value="1" data_id="frist_week">
                                              <p class="fs-1" style="cursor: pointer;"><i
                                                        class="bi bi-calendar text-dark fs-1"></i> 1 Time Per Week</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card myfunction alldata p-3" value="2" data_id="second_week">
                                                <p class="fs-1" style="cursor: pointer;"><i
                                                        class="bi bi-calendar text-dark fs-1"></i> 2 Time Per Week</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card myfunction alldata p-3" value="3" data_id="therd_week">
                                                <p class="fs-1" style="cursor: pointer;"><i
                                                        class="bi bi-calendar text-dark fs-1"></i> 3 Time Per Week</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="display: block;"   id="first">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 d-flex flex-row justify-contect-between mt-5">
                                                @foreach ($teacher_packages as $teacher_package)
                                                    {{-- <div class="row"> --}}
                                                    <div class="card p-2 alldata col-lg-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" style="margin-left: -10px;"
                                                                name="selected_teacher" type="checkbox"
                                                                value="{{ $teacher_package->id }}">
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between mt-3">
                                                            <p class="fw-bold text-light fs-2">Days</p>
                                                            <p class="fw-bold fs-2 text-light">
                                                                {{ $teacher_package->class_days }}</p>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between ">
                                                            <p class="fw-bold text-light fs-2">Date</p>
                                                            <p class="fw-bold text-light fs-2">
                                                                {{ $teacher_package->start_date }}</p>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between">
                                                            <p class="fw-bold fs-2 text-light">Time</p>
                                                            <p class="fw-bold fs-2 text-light">
                                                                {{ $teacher_package->start_time }}</p>
                                                        </div>
                                                    </div>
                                                    {{-- </div> --}}
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="display: none;" class="myfunction"   id="second">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 d-flex flex-row justify-contect-between mt-5">
                                                @foreach ($teacher_packages2 as $teacher_package2)
                                                    {{-- <div class="row"> --}}
                                                    <div class="card p-2 alldata col-lg-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" style="margin-left: -10px;"
                                                                name="selected_teacher" type="checkbox"
                                                                value="{{ $teacher_package->id }}">
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between mt-3">
                                                            <p class="fw-bold text-light fs-2">Days</p>
                                                            <p class="fw-bold fs-2 text-light">
                                                                {{ $teacher_package2->class_days }}</p>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between">
                                                            <p class="fw-bold text-light fs-2">Date</p>
                                                            <p class="fw-bold text-light fs-2">
                                                                {{ $teacher_package2->start_date }}</p>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between">
                                                            <p class="fw-bold fs-2 text-light">Time</p>
                                                            <p class="fw-bold fs-2 text-light">
                                                                {{ $teacher_package2->start_time }}</p>
                                                        </div>
                                                    </div>
                                                    {{-- </div> --}}
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="display: none;" class="myfunction"  id="three">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 d-flex flex-row justify-contect-between mt-5">
                                                @foreach ($teacher_packages3 as $teacher_package3)
                                                    {{-- <div class="row"> --}}
                                                    <div class="card p-2 alldata col-lg-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" style="margin-left: -10px;"
                                                                name="selected_teacher" type="checkbox"
                                                                value="{{ $teacher_package->id }}">
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between mt-3">
                                                            <p class="fw-bold text-light fs-2">Days</p>
                                                            <p class="fw-bold fs-2 text-light">
                                                                {{ $teacher_package3->class_days }}</p>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between ">
                                                            <p class="fw-bold text-light fs-2">Date</p>
                                                            <p class="fw-bold text-light fs-2">
                                                                {{ $teacher_package3->start_date }}</p>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between">
                                                            <p class="fw-bold fs-2 text-light">Time</p>
                                                            <p class="fw-bold fs-2 text-light">
                                                                {{ $teacher_package3->start_time }}</p>
                                                        </div>
                                                    </div>
                                                    {{-- </div> --}}
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="container mt-5">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            @foreach ($teacher_packages as $teacher_package)
                                                <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="card p-2 alldata">
                                                        <div class="form-check -">
                                                            <input class="form-check-input" style="margin-left: -10px;"
                                                                name="select_teacher" type="checkbox"
                                                                value="{{ $teacher_package->id }}">
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between mt-3">
                                                            <p class="fw-bold text-light fs-2">Days</p>
                                                            <p class="fw-bold fs-2 text-light">
                                                                {{ $teacher_package->class_days }}</p>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between ">
                                                            <p class="fw-bold text-light fs-2">Date</p>
                                                            <p class="fw-bold text-light fs-2">
                                                                {{ $teacher_package->start_date }}</p>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between">
                                                            <p class="fw-bold fs-2 text-light">Time</p>
                                                            <p class="fw-bold fs-2 text-light">
                                                                {{ $teacher_package->start_time }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <br>
                                            @endforeach
                                        </div> --}}
                                {{-- <div class="col-lg-4">
                                            @foreach ($teacher_packages2 as $teacher_package2)
                                                <div class="col-lg-13">
                                                    <div class="card p-2 alldata">
                                                        <div class="form-check -">
                                                            <input class="form-check-input" style="margin-left: -10px;"
                                                                name="select_teacher" type="checkbox"
                                                                value="{{ $teacher_package2->id }}">
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between mt-3">
                                                            <p class="fw-bold text-light fs-2">Days</p>
                                                            <p class="fw-bold fs-2 text-light">
                                                                {{ $teacher_package2->class_days }}</p>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between ">
                                                            <p class="fw-bold text-light fs-2">Date</p>
                                                            <p class="fw-bold text-light fs-2">
                                                                {{ $teacher_package2->start_date }}</p>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between">
                                                            <p class="fw-bold fs-2 text-light">Time</p>
                                                            <p class="fw-bold fs-2 text-light">
                                                                {{ $teacher_package2->start_time }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                            @endforeach
                                        </div> --}}
                                {{-- <div class="col-lg-4">
                                            @foreach ($teacher_packages3 as $teacher_package3)
                                                <div class="col-lg-13">
                                                    <div class="card p-2 alldata">
                                                        <div class="form-check -">
                                                            <input class="form-check-input" style="margin-left: -10px;"
                                                                name="select_teacher" type="checkbox"
                                                                value="{{$teacher_package3->id}}">
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between mt-3">
                                                            <p class="fw-bold text-light fs-2">Days</p>
                                                            <p class="fw-bold fs-2 text-light">
                                                                {{ $teacher_package3->class_days }}</p>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between ">
                                                            <p class="fw-bold text-light fs-2">Date</p>
                                                            <p class="fw-bold text-light fs-2">
                                                                {{ $teacher_package3->start_date }}</p>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-between">
                                                            <p class="fw-bold fs-2 text-light">Time</p>
                                                            <p class="fw-bold fs-2 text-light">
                                                                {{ $teacher_package3->start_time }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                            @endforeach
                                        </div> --}}
                                {{-- </div>
                                </div> --}}
                                <br>
                                <button class="btn btn-info ml-3" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('js')
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
    <script>

        $(document).on('click' , '.myfunction' , function() {

            var trid = $(this).closest('div').attr('data_id');

            if(trid == "frist_week"){
                    document.getElementById('first').style.display = 'block';
                    document.getElementById('second').style.display = 'none';
                    document.getElementById('three').style.display = 'none';

                }else if(trid == "second_week"){
                    document.getElementById('first').style.display = 'none';
                    document.getElementById('second').style.display = 'block';
                    document.getElementById('three').style.display = 'none';

                }
                else if(trid == "therd_week"){
                    document.getElementById('first').style.display = 'none';
                    document.getElementById('second').style.display = 'none';
                    document.getElementById('three').style.display = 'block';
                }
        });
    </script>
@endpush
