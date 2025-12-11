<div class="modal fade " tabindex="-1" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-white">
            <a class="close custom-close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">{{__('labels.change_password')}}</h5>
            </div>
            <div class="modal-body">               
                <form action="{{route('user.change-password')}}" id="changePasswordForm" method="POST">
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="current-password">{{__('labels.current_password')}}</label>
                        </div>
                        <div class="form-control-wrap">
                            <a  class="form-icon form-icon-right passcode-switch cursor-pointer">
                                <em class="icon ni ni-eye-fill" data-target="current-password"></em>
                            </a>

                            <input type="password" class="form-control" id="current-password" aria-describedby="current-password-error" name="current_password"  placeholder="{{__('labels.enter_current_password')}}" autocomplete="off">
                        </div>
                        <span id="current-password-error" class="help-block error-help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="new-password">{{__('labels.new_password')}}</label>
                        </div>
                        <div class="form-control-wrap">
                            <a  class="form-icon form-icon-right passcode-switch cursor-pointer">
                                <em class="icon ni ni-eye-fill" data-target="new-password"></em>
                            </a>
                            <input type="password" class="form-control" name="password" id="new-password" aria-describedby="new-password-error" placeholder="{{__('labels.enter_newpassword_below')}}" autocomplete="off">
                        </div>
                        <span id="new-password-error" class="help-block error-help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="confirm-new-password">{{__('labels.confirm_new_password')}}</label>
                        </div>
                        <div class="form-control-wrap">
                            <a  class="form-icon form-icon-right passcode-switch cursor-pointer">
                                <em class="icon ni ni-eye-fill" data-target="confirm-new-password"></em>
                            </a>
                            <input type="password" class="form-control" id="confirm-new-password" aria-describedby="confirm-new-password-error" name="password_confirmation" placeholder="{{__('labels.confirm_new_password')}}" autocomplete="off">
                        </div>
                        <span id="confirm-new-password-error" class="help-block error-help-block text-danger"></span>
                    </div>
                    <div class="form-group text-end mb-0">
                        <button type="button" id="changePasswordBtn" class="btn btn-primary me-1">{{__('labels.update')}}</button>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-light custom-close">{{__('labels.cancel')}}</button>
                    </div>
                    {!! JsValidator::formRequest('App\Http\Requests\Frontend\ChangePasswordRequest','#changePasswordForm') !!}
                </form>
                {!! returnScriptWithNonce(asset_path('assets/js/frontend/profile/change-password.js')) !!}
            </div>
        </div>
    </div>
</div>