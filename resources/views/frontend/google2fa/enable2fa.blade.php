<div class="col-md-12">
    <div class="card shadow-none">
        <div class="card-header bg-white px-0">
            <h6>{{__('labels.googleTwoFactor.two_factor_authentication')}}</h6>
        </div>
        <div class="card-body px-0 pt-0">
            <p>{{__('labels.googleTwoFactor.varify_page_content')}}</p>
            <p><strong> {{__('labels.googleTwoFactor.scan_this_qr_code')}} <code>{{ $data['secret'] }}</code></strong></p>
            <div class="text-center position-relative d-inline-flex justify-content-center w-100">
                {!! $data['google2fa_url'] !!}
                <form method="POST" action="{{ route('frontend.2fa.generate2faSecret') }}" id="generate2faSecret-form" onsubmit="return false;">
                    @csrf
                    <span class="position-absolute bottom-0 refershGBtn cursor-pointer" id="generate2faSecretBtn">
                        <em class="ni ni-reload-alt" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('labels.googleTwoFactor.regenerate_secret_key')}}"></em>
                    </span>
                </form>
            </div>
            <p><strong>{{__('labels.googleTwoFactor.enter_the_pin')}}</strong></p>
            <form method="post" action="{{ route('frontend.2fa.enable2fa') }}" id="enable2fa-form" onsubmit="return false;">
                @csrf
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="secret">{{__('labels.googleTwoFactor.authenticator_code')}}</label>
                    </div>
                    <div class="form-control-wrap">
                        <input 
                            type="text" 
                            class="form-control form-control-lg noSpaceAllow onlyNumbers" 
                            name="secret" 
                            id="secret" 
                            placeholder="{{__('labels.googleTwoFactor.authenticator_code')}}"
                            aria-describedby="secret-error"
                        >

                        <span id="secret-error" class="help-block error-help-block text-danger">
                        </span>
                    </div>
                </div>
                <div class="form-group text-end">
                    <button type="submit" class="btn btn-lg btn-primary" id="enable2faBtn">{{ucfirst(__('labels.enable'))}} {{__('labels.googleTwoFactor.two_fa')}}</button>
                </div>
            </form>
            {!! JsValidator::formRequest('App\Http\Requests\Frontend\Enable2faRequest','#enable2fa-form') !!}
        </div>
    </div>
</div>
