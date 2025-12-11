<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- favicon -->
<link rel="icon" href="{{asset_path('assets/images/frontend/fevicon.png')}}">
<link rel="apple-touch-icon" href="{{asset_path('assets/images/frontend/fevicon.png')}}">

<!-- StyleSheets  -->
<link rel="stylesheet"  href="{{ asset_path('assets/css/frontend/index-BBmHRITH.css') }}" type="text/css">
<!-- <link rel="stylesheet"  href="{{ asset_path('assets/css/frontend/custom.css') }}" type="text/css"> -->
<!-- <link rel="stylesheet"  href="{{ asset_path('assets/css/frontend/cropper.min.css') }}" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

{!! returnScriptWithNonce(asset_path('assets/js/frontend/app.js')) !!}
{!! returnScriptWithNonce(asset_path('assets/js/frontend/frontend-app.js')) !!}
