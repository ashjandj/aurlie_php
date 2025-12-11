<div class="col-md-12">
    <div class="card shadow-none">
        <div class="card-header bg-white px-0">
            <strong>{{__('labels.googleTwoFactor.two_factor_authentication')}}</strong>
        </div>
        <div class="card-body px-0 pt-0">
            <p>{{__('labels.googleTwoFactor.varify_page_content')}}</p>
            <div class="alert alert-success">
                {{__('labels.googleTwoFactor.two_fa_is_currently')}} <strong>{{__('labels.googleTwoFactor.enabled')}}</strong> {{__('labels.googleTwoFactor.on_your_account')}}
            </div>
            <p>{{__('labels.googleTwoFactor.please_confirm_your_password')}}</p>
            <form method="POST" action="{{ route('admin.2fa.disable2fa') }}" id="disable2fa-form" onsubmit="return false;">
                @csrf
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="change-password">{{__('labels.current_password')}}</label>
                    </div>
                    <div class="form-control-wrap">
                        <a href="javascript:void(0)" class="form-icon form-icon-right passcode-switch lg" data-target="current_password">
                            <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                            <em class="passcode-icon icon-show icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" class="form-control form-control-lg" name="current_password" id="current_password" placeholder="{{__('labels.current_password')}}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group text-end">
                    <button type="submit" class="btn btn-lg btn-primary" id="disable2faBtn">{{ucfirst(__('labels.googleTwoFactor.disable'))}} {{__('labels.googleTwoFactor.two_fa')}}</button>
                </div>
            </form>
            {!! JsValidator::formRequest('App\Http\Requests\Backend\Disable2faRequest','#disable2fa-form') !!}
        </div>
    </div>
</div>
