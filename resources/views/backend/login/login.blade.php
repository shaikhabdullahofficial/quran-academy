<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
		<title>Quran Teaching</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Quran Teaching" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{ asset('public/assets/media/logos/Logo.png') }}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('public/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('public/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank">
		<!--begin::Root-->
        <!--begin::Theme mode setup on page load-->
		<script>
            var defaultThemeMode = "light";
            var themeMode;
            if( document.documentElement ){
                if( document.documentElement.hasAttribute("data-bs-theme-mode")) {
                    themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
                }else{
                    if( localStorage.getItem("data-bs-theme") !== null ){
                        themeMode = localStorage.getItem("data-bs-theme");
                    }else{
                        themeMode = defaultThemeMode;
                    }
                }if(themeMode === "system"){
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                    } document.documentElement.setAttribute("data-bs-theme", themeMode);
                    }
            </script>
            <style>
                .btn:hover{
                    background-color: white;
                    color: #9c8a4c;
                    border: 1px solid #9c8a4c;
                }
                .btn{
                    border: 1px solid #9c8a4c;
                    border-radius: 10px;
					color: white;
                    background-color: #9c8a4c;
                }
                .textcahnge p{
                    font-size: 20px;
                    font-family: 'Times New Roman';
                    margin: 0;
                }
                .offer
                {
                    color: white;
                }
                /* .locked-input::placeholder {
  background-image: url('');
  background-size: 16px;
  background-repeat: no-repeat;
  padding-left: 20px;
} */

.input-container {
  position: relative;
  /* display: inline-block; */

}

.input-container i {
  position: absolute;
  top: 50%;
  left: 10px;
  transform: translateY(-50%);
  color: #999;

}

.input-container input {
  padding-left: 30px;
}

.input-container button {
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  background: none;
  border: none;
  cursor: pointer;
}

#lockedField{
    background-color: #f7f5ee;
}
/* .main-dev{
    margin-top: 60px;
} */
.changeimg {
  position: absolute;
  left: 0;
  top: 0;
  z-index: -1;
  /* margin-left: 50px; */
}


            </style>
		<!--end::Theme mode setup on page load-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
					<!--begin::Form-->
                    <div class="d-flex flex-center flex-column flex-lg-row-fluid">

						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10">
							<!--begin::Form-->
							<form method="POST" action="{{ route('login.store') }}">
								@csrf
								<!--begin::Heading-->
                                <div class="d-flex flex-center mb-5">
                                    <img src="{{asset('public/assets/media/logos/Logo.png') }}"  alt="{{asset('public/assets/media/logos/Logo.png') }}">
                                </div>
								<div class="text-center">
									<!--begin::Title-->
									<h1 class="text-dark fw-bolder">LOGIN</h1>
									<p class="fs-8 mb-10">Welcome to Hud Hud Quran Academy</p>
									<!--end::Title-->
									<!--begin::Subtitle-->
								</div>
								<!--begin::Heading-->

								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Email-->
                                    <div class="input-container">
                                        <i class="bi bi-envelope"></i>
                                        <input type="email" id="lockedField" class="form-control" name="email"  placeholder="Email">
                                    </button>
                                      </div>
									<!--end::Email-->
								</div>
								<!--end::Input group=-->
								<div class="fv-row mb-3">
									<!--begin::Password-->
									{{-- <input type="password" placeholder="&#xf002  Password" name="password" autocomplete="off" class="form-control bg-transparent locked-input" /> --}}
									<div class="input-container">
                                        <i class="fas fa-lock"></i>
                                        <input type="password" id="lockedField" class="form-control" name="password" placeholder="Must have 8 least characters">
                                    </button>
                                      </div>
                                    <!--end::Password-->
								</div>
								<!--end::Input group=-->
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
									<div></div>
									<!--begin::Link-->
									<a href="{{route('forget-password')}}" class="" style="color: #9c8a4c; font-weight: bold;">Forgot Password </a>
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Submit button-->
								<div class="d-grid mb-10">
									<button type="submit" id="kt_sign_in_submit" class="btn">Sign In</button>
								</div>
								<!--end::Submit button-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Form-->
				</div>
				<!--end::Body-->
				<!--begin::Aside-->
				<div class="flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background: #9c8a4c;">
					<div class="container mt-20">
						<div class="row">
							<div class="col-lg-12">
                                <img src="{{asset('public/src/media/logos/Crcile.png') }}" class="img-fluid changeimg mt-10" alt="">
                                <img src="{{asset('public/src/media/logos/Quran-Academy 4.png') }}"  class="img-fluid" alt="">
							</div>
					   </div>
					</div>
				</div>

				<!--end::Aside-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>

		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('public/assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('public/assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
	    <!--begin::Custom Javascript(used for this page only)-->
		<script src="{{ asset('public/assets/js/custom/authentication/sign-in/general.js') }}"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
