<link rel="stylesheet"  href="{{ asset_path('assets/css/dropzone.min.css') }}" type="text/css">
<link rel="stylesheet"  href="{{ asset_path('assets/css/media.css') }}" type="text/css">
<div class="modal" id="mediaManagerModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="imageCropperModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="img-preview-modal modal-dialog modal-width modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header image-modal img-preview-modal-header">
                <div class="uploaded-file">
                    <p id="select-file" class="modal-title me-3 p-2" id="exampleModalLongTitle">
                        {{ __('labels.select_file') }}
                    </p>

                    @if ((!isTypeUser() && auth()->user()->hasPermissionTo('admin.media.store')) || isTypeUser())
                        <p id="upload-new" class="modal-title p-2" id="exampleModalLongTitle">{{ __('labels.upload_media') }}</p>
                    @endif

                </div>
                <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body position-relative img-preview-modal-body image-modal-body">
                <div class="h-100">
                    <div id="select-items" >
                        <div id="image-card-container" class="mx-3">
                        </div>
                    </div>
                    <div id="browse-file" >
                    <div class="form-group" id="file-type">
                            <label class="col-md-8 control-label"></label>
                            <div class="col-md-8 upload-note ps-4">
                                <p>
                                    <span class="text-danger">{{ __('labels.note') }}:</span>
                                    {{ __('labels.allowed_file_extensions') }} : <span
                                    id="accepted-type">{{getAllowedFileExt()}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="uploaded-file-design">
                            <div class="card-block upload-file-card p-0 h-100">
                                <form id="uploadFileFrm" action="{{ getLoggedInUserDetail() ? (getLoggedInUserDetail()->user_type == 'admin' ? route('admin.media.store') : route('media.store')) : '' }}" method="post" class="dropzone form-border-design">
                                    @csrf
                                    <input type="hidden" id="userType" name="userType" value="{{getLoggedInUserDetail() ? getLoggedInUserDetail()->user_type : ''}}">
                                    <input type="file" id="selectedFiles" name="files[]" multiple class="d-none">
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer-div" class="modal-footer justify-content-between img-preview-modal-footer">
                <div class="d-flex align-items-center file-number-show flex-grow-1 overflow-hidden">
                </div>
                <div class="modal-button-section">
                    <button type="button" class="btn btn-light" aria-label="Close" data-bs-dismiss="modal">{{ __('labels.cancel') }}</button>
                    <button id="addSelectedBtn" type="button" class="btn btn-primary">{{ __('labels.add') }}</button>
                    <button type="button" id="fileUploadBtn" class="btn btn-success d-none">{{ __('labels.upload_media') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
{!! returnScriptWithNonce(asset_path('assets/js/dropzone.js')) !!}
