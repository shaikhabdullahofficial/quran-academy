@extends('layouts.app')


@section('content')

<style>
    .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>

<section class="timeline_area section_padding_130">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Teacher Review</h3>
                <br>
                <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item fs-5 fw-semibold"><a href="{{ route('dashboard') }}" style="color: #6c757d !important;">Home</a></li>
                        <li class="breadcrumb-item fs-5 fw-semibold"><a href="{{ route('students') }}" style="color: #6c757d !important;">Students</a></li>
                        <li class="breadcrumb-item active fw-semibold fs-5" aria-current="page" style="color: #9c8a4c !important;">Teacher Review</li>
                    </ol>
                </nav>
                <br>
                <form action="{{ route('send.review',['id' => $student_id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        {{-- <input  name="teacherid" value="{{$ma->id}}" style="display:none">
                        <input  name="studentid" value="{{$ma->categoryid}}" style="display:none">
                        <input  name="courseid" value="{{$ma->brandid}}" style="display:none"> --}}
                        <label for="exampleInputEmail1">Enter Comment:</label>
                        <input type="text" class="form-control" name="comment" placeholder="Write Comment">
                      </div>

                    <div class="form-group">
                      <label for="review">Enter Description:</label>
                      <textarea class="form-control" name="description" placeholder="Write Description" rows="3"></textarea>
                    </div>
                    {{-- <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br> --}}

                    <div>
                        <label for="rating">Rating:</label>
                    </div>
                    <div class="form-group rate">
                        <input type="radio" id="star5" name="rating" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rating" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rating" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rating" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rating" value="1" />
                        <label for="star1" title="text">1 star</label>
                      </div>
                      <br><br><br><br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</section>
@endsection
kro

