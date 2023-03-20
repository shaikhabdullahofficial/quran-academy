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
.star-rating-complete{
            color: #c59b08;
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

.rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rated {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rated:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ffc700;
         }
         .rated:not(:checked) > label:before {
         content: '★ ';
         }
         .rated > input:checked ~ label {
         color: #ffc700;
         }
         .rated:not(:checked) > label:hover,
         .rated:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rated > input:checked + label:hover,
         .rated > input:checked + label:hover ~ label,
         .rated > input:checked ~ label:hover,
         .rated > input:checked ~ label:hover ~ label,
         .rated > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
</style>

<section class="timeline_area section_padding_130">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Edit Teacher Review</h3>
                <br>
                <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item fs-5 fw-semibold"><a href="{{ route('dashboard') }}" style="color: #6c757d !important;">Home</a></li>
                        <li class="breadcrumb-item fs-5 fw-semibold"><a href="{{ route('all.reviews') }}" style="color: #6c757d !important;">Teacher Student Review</a></li>
                        <li class="breadcrumb-item active fw-semibold fs-5" aria-current="page" style="color: #9c8a4c !important;">Edit Review</li>
                    </ol>
                </nav>
                <br>
                <form method="POST" action="{{ route('update.review', $editreview->id) }}">
                    @csrf
                    <div class="form-group">

                        <label for="exampleInputEmail1">Enter Comment:</label>
                        <input type="text" class="form-control" name="editcomment" placeholder="Write Comment" value="{{$editreview->comment  }}">
                      </div>

                    <div class="form-group">
                      <label for="review">Enter Description:</label>
                      <textarea class="form-control" name="editdescription" placeholder="Write Description" rows="3">{{$editreview->description  }}</textarea>
                    </div>

                    <?php
                    $editreviewa = $editreview->rating;
                    ?>
                    <h6>Last Rating</h6>
                    <div class="rated">
                        @for($i=1; $i<=$editreviewa; $i++)
                        <label class="star-rating-complete" title="text">{{$i}} stars</label>
                        @endfor
                    </div>


                    <br><br><br>
                    <div>
                        <label for="rating">New Rating:</label>
                    </div>


                        <div class="form-group rate">
                            <input type="radio" id="star1{{$editreview->id}}" class="rate" name="editrating" value="5"/>
                            <label for="star1{{$editreview->id}}" title="text">1 stars</label>
                            <input type="radio" id="star2{{$editreview->id}}" class="rate" name="editrating" value="4"/>
                            <label for="star2{{$editreview->id}}" title="text">2 stars</label>
                            <input type="radio" id="star3{{$editreview->id}}" class="rate" name="editrating" value="3"/>
                            <label for="star3{{$editreview->id}}" title="text">3 stars</label>
                            <input type="radio" id="star4{{$editreview->id}}" class="rate" name="editrating" value="2"/>
                            <label for="star4{{$editreview->id}}" title="text">4 stars</label>
                            <input type="radio" id="star5{{$editreview->id}}" class="rate" name="editrating" value="1"/>
                            <label for="star5{{$editreview->id}}" title="text">5 stars</label>
                      </div>
                      <br><br><br><br>
                         <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                  </form>
            </div>
        </div>
    </div>
</section>
@endsection

