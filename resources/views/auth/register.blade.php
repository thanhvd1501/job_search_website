<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta charset="utf-8"/>
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
            <a href="" class="mb-12">
                <img alt="Logo" src="{{asset('media/logos/logo-fire.png')}}" class="h-50px"/>
                <h1 class="link-primary">Sign Up</h1>
            </a>
            <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form"
                      action="{{ route('registering') }}" method="post">
                    @csrf
                    <div class="mb-10 text-center">
                        <h1 class="text-dark mb-3">Create an Account</h1>
                        <div class="text-gray-400 fw-bold fs-4">Already have an account?
                            <a href="" class="link-primary fw-bolder">Sign in here</a></div>
                    </div>
                    <button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">
                        <img alt="Logo" src="{{ asset('media/svg/brand-logos/github.svg') }}" class="h-20px me-3"/>Sign
                        in with Github
                    </button>
                    <div class="d-flex align-items-center mb-10">
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                        <span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger fv-plugins-message-container">
                            <ul>
                                Errors :
                            </ul>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @auth
                        <div class="fv-row mb-7 ">
                            <div class="symbol symbol-100px me-5 d-flex justify-content-center">
                                <img alt="avatar" src="{{ auth()->user()->avatar }}" class="rounded-circle">
                            </div>
                            {{--<span class="form-label fw-bolder text-dark fs-6 d-flex justify-content-center">
                                Avatar
                            </span>--}}
                        </div>
                        <div class="fv-row mb-7">
                            <label for="name" class="form-label fw-bolder text-dark fs-6">Full Name</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" disabled
                                   name="name" value="{{ auth()->user()->name }}" id="name"/>
                        </div>
                        <div class="fv-row mb-7">
                            <label for="email" class="form-label fw-bolder text-dark fs-6">Email</label>
                            <input class="form-control form-control-lg form-control-solid" type="email" disabled
                                   name="email" value="{{ auth()->user()->email }}" id="email"/>
                        </div>
                    @endauth
                    @guest
                        <div class="fv-row mb-7">
                            <label for="name" class="form-label fw-bolder text-dark fs-6">Full Name</label>
                            <input class="form-control form-control-lg form-control-solid" type="text" placeholder=""
                                   name="name" autocomplete="off" value="{{ session()->pull('name') }}" id="name"/>
                        </div>
                        <div class="fv-row mb-7">
                            <label for="email" class="form-label fw-bolder text-dark fs-6">Email</label>
                            <input class="form-control form-control-lg form-control-solid" type="email" placeholder=""
                                   name="email" autocomplete="off" value="{{ session()->pull('email') }}" id="email"/>
                        </div>
                    @endguest
                    <div class="form-group">
                        <div class="form-check lh-xxl">
                            <input class="form-check-input" type="radio" value="1" id="applicant" name="role" checked/>
                            <label class="form-check-label" for="applicant">
                                Applicant
                            </label>
                        </div>
                        <div class="form-check lh-xxl">
                            <input class="form-check-input" type="radio" value="2" id="hr" name="role"/>
                            <label class="form-check-label" for="hr">
                                HR
                            </label>
                        </div>
                    </div>

                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <div class="mb-1">
                            <label for="password" class="form-label fw-bolder text-dark fs-6">Password</label>
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                       placeholder="" name="password" autocomplete="off" id="password"/>
                                <span
                                    class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                    data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
                            </div>
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                        </div>
                        <div class="text-muted">
                            Use 8 or more characters with a mix of letters, numbers &amp; symbols.
                        </div>
                    </div>
                    <div class="fv-row mb-5">
                        <label for="re-password" class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                        <input class="form-control form-control-lg form-control-solid" type="password"
                               placeholder=""
                               name="confirm-password" autocomplete="off" id="re-password"/>
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-check form-check-custom form-check-solid form-check-inline">
                            <input class="form-check-input" type="checkbox" name="toc" value="1"/>
                            <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
									<a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
                        </label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex flex-center flex-column-auto p-10">
            <div class="d-flex align-items-center fw-bold fs-6">
                <a href="" class="text-muted text-hover-primary px-2">About</a>
                <a href="" class="text-muted text-hover-primary px-2">Contact</a>
                <a href="" class="text-muted text-hover-primary px-2">Contact Us</a>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('js/scripts.bundle.js')}}"></script>
</body>
</html>
