@extends('layouts.app')

@section('content')
<style>
 .profile-pic-wrapper {
  height: 100vh;
  width: 100%;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.pic-holder {
  text-align: center;
  position: relative;
  border-radius: 50%;
  width: 150px;
  height: 150px;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
}

.pic-holder .pic {
  height: 100%;
  width: 100%;
  -o-object-fit: cover;
  object-fit: cover;
  -o-object-position: center;
  object-position: center;
}

.pic-holder .upload-file-block,
.pic-holder .upload-loader {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: rgba(90, 92, 105, 0.7);
  color: #f8f9fc;
  font-size: 12px;
  font-weight: 600;
  opacity: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.2s;
}

.pic-holder .upload-file-block {
  cursor: pointer;
}

.pic-holder:hover .upload-file-block,
.uploadProfileInput:focus ~ .upload-file-block {
  opacity: 1;
}


</style>
    <!-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Admin</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div> -->


    <!-- <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Roles:</strong>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div> -->

    <div class="container">
        <div class="main-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="color: #6c757d !important;">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}" style="color: #6c757d !important;">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #9c8a4c !important;">User Profile</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <form action="{{route('user-profile-update', $user->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <div class="avatar-upload">
                                        <div class="avatar-edit">
                                          <input type='file' name="profile" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                          <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                          @if ($user->profile)
                                            <img class="" id="imagePreview" src="{{ asset('public/images/'. $user->profile) }}" alt="User profile picture" width="100px">
                                          @else
                                            <img class="" id="imagePreview" src="{{ asset('images/default-profile-picture.png') }}" alt="User profile picture" width="100px">
                                          @endif
                                        </div>
                                      </div> --}}
                                      <div class="pic-holder">
                                        <!-- uploaded pic shown here -->
                                        <img id="profilePic" class="pic" src="{{asset('public/images/'.$user->profile)}}">

                                        <Input class="uploadProfileInput" type="file" name="profile" id="newProfilePhoto" accept="image/*" style="opacity: 0;" />
                                        <label for="newProfilePhoto" class="upload-file-block">
                                          <div class="text-center">
                                            <div class="mb-2">
                                              <i class="fa fa-camera fa-2x"></i>
                                            </div>
                                            <div class="text-uppercase">
                                              Update <br /> Profile Photo
                                            </div>
                                          </div>
                                        </label>
                                      </div>
                                <div class="mt-3">
                                    {{-- <h4>{{$user->name ?? 'N/A'}}</h4> --}}
                                    <p class="text-muted font-size-sm">{{$user->name ?? 'N/A'}}</p>

                                    <p class="text-secondary mb-1">{{$user->email ?? 'N/A'}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                            <span class="text-secondary">@bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                            <span class="text-secondary">bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                            <span class="text-secondary">bootdey</span>
                            </li>
                        </ul>
                    </div> -->
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{-- {{$user->name ?? 'N/A'}} --}}
                                    <input type="text" value="{{$user->name ?? 'N/A'}}" class="form-control" name="name">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" value="{{$user->email ?? 'N/A'}}" class="form-control" name="email">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" value="{{$user->phone ?? 'N/A'}}" class="form-control" name="phone">
                                </div>
                            </div>
                            <hr>
                            <!-- <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    (320) 380-4539
                                </div>
                            </div>
                            <hr> -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Date Of Birth</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="date" value="{{$user->dob ?? 'N/A'}}" class="form-control" name="dob">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Country</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{-- <input type="text" value="{{$user->country_name ?? 'N/A'}}" class="form-control" name="country_name"> --}}
                                    <select name="country_name" class="form-control">
                                        @foreach ($countries as $country)
                                          <option value="{{ $country->name}}"{{$country->id == $user->country_name  ? 'selected' : ''}}>{{ $country->name}}</option>
                                          </option>
                                        @endforeach
                                      </select>
                                    {{-- {{$user->country_name ?? 'N/A'}} --}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" value="{{$user->address ?? 'N/A'}}" class="form-control" name="address">
                                    {{-- {{$user->address ?? 'N/A'}} --}}
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-success" type="submit">Edit</button>
                        </form>
                        </div>
                    </div>
                    <!-- <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                            <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                            <small>Web Design</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Website Markup</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>One Page</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Mobile Template</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Backend API</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                            <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                            <small>Web Design</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Website Markup</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>One Page</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Mobile Template</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>Backend API</small>
                            <div class="progress mb-3" style="height: 5px">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <script>
       $(document).on("change", ".uploadProfileInput", function () {
  var triggerInput = this;
  var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
  var holder = $(this).closest(".pic-holder");
  var wrapper = $(this).closest(".profile-pic-wrapper");
  $(wrapper).find('[role="alert"]').remove();
  triggerInput.blur();
  var files = !!this.files ? this.files : [];
  if (!files.length || !window.FileReader) {
    return;
  }
  if (/^image/.test(files[0].type)) {
    // only image file
    var reader = new FileReader(); // instance of the FileReader
    reader.readAsDataURL(files[0]); // read the local file

    reader.onloadend = function () {
      $(holder).addClass("uploadInProgress");
      $(holder).find(".pic").attr("src", this.result);
      $(holder).append(
        '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
      );

      // Dummy timeout; call API or AJAX below
      setTimeout(() => {
        $(holder).removeClass("uploadInProgress");
        $(holder).find(".upload-loader").remove();
        // If upload successful
        if (Math.random() < 0.9) {
          $(wrapper).append(
            '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>'
          );

          // Clear input after upload
          $(triggerInput).val("");

          setTimeout(() => {
            $(wrapper).find('[role="alert"]').remove();
          }, 3000);
        } else {
          $(holder).find(".pic").attr("src", currentImg);
          $(wrapper).append(
            '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
          );

          // Clear input after upload
          $(triggerInput).val("");
          setTimeout(() => {
            $(wrapper).find('[role="alert"]').remove();
          }, 3000);
        }
      }, 1500);
    };
  } else {
    $(wrapper).append(
      '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose the valid image.</div>'
    );
    setTimeout(() => {
      $(wrapper).find('role="alert"').remove();
    }, 3000);
  }
});

    </script>

@endsection
