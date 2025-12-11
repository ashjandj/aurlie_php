<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- favicon -->
<link rel="shortcut icon" href="{{ asset_path('assets/images/backend/fevicon.png') }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- StyleSheets  -->
<link rel="stylesheet" href="{{ asset_path('assets/css/backend/admin.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset_path('assets/css/backend/cropper.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset_path('assets/css/backend/custom.css') }}" type="text/css">

{!! returnScriptWithNonce(asset_path('assets/js/backend/app.js')) !!}
{!! returnScriptWithNonce(asset_path('assets/js/backend/admin-app.js')) !!}

<script nonce="{{ csp_nonce('script') }}">
    var internetConnectionError = "{{ trans('message.error.internet_connection_error') }}";
</script>
