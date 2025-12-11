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
            {!! JsValidator::formRequest('App\Http\Requests\Frontend\Disable2faRequest','#disable2fa-form') !!}
        </div>
    </div>
</div>
