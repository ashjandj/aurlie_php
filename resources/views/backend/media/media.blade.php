@extends('layouts.backend.app')
@section('title',__('labels.media_manager'))
@section('content')
<!-- content @s -->
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <nav>
                                <ul class="breadcrumb breadcrumb-pipe">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.dashboard')}}">{{__('labels.dashboard')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('labels.media_manager')}}</li>
                                </ul>
                            </nav>
                            <h3 class="nk-block-title page-title">{{__('labels.media_manager')}}</h3>
                            <!-- breadcrumb @e -->
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <button type="button" data-toggle="modal" class="btn btn-primary" id="mediaManagerSideBtn" data-id="{{getLoggedInUserDetail()->id}}" data-type="default">{{__('labels.upload_media')}}</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card h-full">
                        <div class="card-inner">
                            <div id="image-card-container" class="mx-3">
                              <div class="loader-overlay"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content @e -->

{{-- start image pop-up --}}
<div id="imagePopUp">
 </div>
{{-- end image pop-up --}}

@endsection
@push('scripts')
{!! returnScriptWithNonce(asset_path('assets/js/backend/media/index.js')) !!}
<script nonce="{{ csp_nonce('script') }}">
        window.userId = '{!! getLoggedInUserDetail()->id !!}';
</script>
@endpush