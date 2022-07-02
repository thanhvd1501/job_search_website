<html lang="en">
<head>
    <title>{{ $title ?? '' }} - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta property="og:locale" content="en_US">

    <link rel="shortcut icon" href="{{ asset('/media/logos/favicon.ico') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <link href="{{ asset('/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/style.bundle.css') }}" rel="stylesheet" type="text/css">

</head>
<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">
        @include('layout.sidebar')
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            @include('layout.header')
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container">
                        <div class="toolbar" id="kt_toolbar">
                            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                                <div
                                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ $title ?? '' }}
                                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                                        <small class="text-muted fs-7 fw-bold my-1 ms-1"></small>
                                    </h1>
                                </div>
                                <div class="d-flex align-items-center py-1">
                                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                       data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">Create</a>
                                </div>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('layout.footer')
        </div>
    </div>
</div>
<script src="{{ asset('/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('/js/scripts.bundle.js') }}"></script>
@stack('js')
</body>
</html>
