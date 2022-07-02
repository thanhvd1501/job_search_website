<!DOCTYPE html>
<html lang="en">
<head>
    <base href="../../../">
    <title>Login - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta charset="utf-8"/>
    <meta property="og:locale" content="en_US"/>
    <link rel="shortcut icon" href="{{asset('media/logos/favicon.ico')}}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body id="kt_body" class="bg-body">
<div class="d-flex flex-column flex-root">
    <div
        class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
        style="background-image: url({{asset('media/misc/progress-hd.png')}})">
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <a href="#" class="mb-12">
                <img alt="Logo" src="{{asset('media/logos/logo-fire.png')}}" class="h-50px"/>
                <h1 class="link-primary">Sign In</h1>
            </a>

            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#">
                    @csrf
                    <div class="text-center mb-10">
                        <h1 class="text-dark mb-3">Sign In to JobSearch</h1>
                        <div class="text-gray-400 fw-bold fs-4">New Here?
                            <a href="{{ route('register') }}"
                               class="link-primary fw-bolder">Create an Account</a></div>
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                        <input class="form-control form-control-lg form-control-solid" type="text" name="email"
                               autocomplete="off"/>
                    </div>
                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <div class="mb-1">
                            <label class="form-label fw-bolder text-dark fs-6">Password</label>
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                       name="password" autocomplete="off"/>
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                      data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Continue</span>
                                <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
                            <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                <img alt="Logo" src="{{asset('media/svg/brand-logos/linkedin.svg')}}"
                                     class="h-20px me-3"/>Continue
                                with Linkedin</a>
                            <a href="" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                <img alt="Logo" src="{{asset('media/svg/brand-logos/gitlab.svg')}}"
                                     class="h-20px me-3"/>Continue
                                with Gitlab</a>
                            <a href="{{ route('auth.redirect', 'github') }}"
                               class="btn btn-flex flex-center btn-light btn-lg w-100">
                                <img alt="Logo" src="{{asset('media/svg/brand-logos/github.svg')}}"
                                     class="h-20px me-3"/>Continue
                                with Github</a>
                        </div>
                </form>
            </div>
        </div>
        <div class="d-flex flex-center flex-column-auto p-10">
            <div class="d-flex align-items-center fw-bold fs-6">
                <a href="#" class="text-muted text-hover-primary px-2">About</a>
                <a href="#" class="text-muted text-hover-primary px-2">Contact</a>
                <a href="#" class="text-muted text-hover-primary px-2">Contact Us</a>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('js/scripts.bundle.js')}}"></script>
<script src="{{asset('js/custom/authentication/sign-in/general.js')}}"></script>

</body>
</html>
