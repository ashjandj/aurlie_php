@auth
    <div class="nk-footer">
        <div class="container-fluid">
            <div class="nk-footer-wrap">
                <div class="nk-footer-copyright">© {{ date('Y') }} {{ __('labels.all_rights_reserved') }}</div>
            </div>
        </div>
    </div>
    <div class="modal fade " tabindex="-1" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-white">
                <a class="close custom-close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('labels.change_password') }}</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.change-password') }}" id="changePasswordForm" method="POST">
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="current-password">{{ __('labels.current_password') }}</label>
                            </div>
                            <div class="form-control-wrap">
                                <a class="form-icon form-icon-right passcode-switch" data-target="current-password">
                                    <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-show icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control" id="current-password"
                                    aria-describedby="current-password-error" name="current_password"
                                    placeholder="{{ __('labels.enter_current_password') }}" autocomplete="off">
                            </div>
                            <span id="current-password-error" class="help-block error-help-block"></span>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="new-password">{{ __('labels.new_password') }}</label>
                            </div>
                            <div class="form-control-wrap">
                                <a class="form-icon form-icon-right passcode-switch" data-target="new-password">
                                    <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-show icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control" name="password" id="new-password"
                                    aria-describedby="new-password-error"
                                    placeholder="{{ __('labels.enter_newpassword_below') }}" autocomplete="off">
                            </div>
                            <span id="new-password-error" class="help-block error-help-block"></span>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label"
                                    for="confirm-new-password">{{ __('labels.confirm_new_password') }}</label>
                            </div>
                            <div class="form-control-wrap">
                                <a class="form-icon form-icon-right passcode-switch" data-target="confirm-new-password">
                                    <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-show icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control" id="confirm-new-password"
                                    aria-describedby="confirm-new-password-error" name="password_confirmation"
                                    placeholder="{{ __('labels.confirm_new_password') }}" autocomplete="off">
                            </div>
                            <span id="confirm-new-password-error" class="help-block error-help-block"></span>
                        </div>
                        <div class="form-group text-end mb-0">
                            <button type="button" id="submitBtn"
                                class="btn btn-primary me-1">{{ __('labels.update') }}</button>
                            <button type="button" data-bs-dismiss="modal"
                                class="btn btn-light custom-close">{{ __('labels.cancel') }}</button>
                        </div>
                        {!! JsValidator::formRequest('App\Http\Requests\Backend\ChangePasswordRequest', '#changePasswordForm') !!}
                    </form>
                    {!! returnScriptWithNonce(asset_path('assets/js/backend/auth/change-password.js')) !!}
                </div>
            </div>
        </div>
    </div>
@endauth

<x-GoogleAnalytics></x-GoogleAnalytics>
@if (getLoggedInUserDetail())
    <x-media-manager />
    {!! returnScriptWithNonce(asset_path('assets/js/media-manager.js')) !!}
@endif

@if (session()->has('success'))
    <script nonce="{{ csp_nonce('script') }}">
        $(document).ready(function() {
            successToaster("{!! session('success') !!}");
        });
    </script>
@endif

@if (session()->has('error'))
    <script nonce="{{ csp_nonce('script') }}">
        $(document).ready(function() {
            errorToaster("{!! session('error') !!}");
        });
    </script>
@endif
