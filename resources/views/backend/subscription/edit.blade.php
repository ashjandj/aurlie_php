<form id="updateForm"
    action="{{ route('admin.subscription-plan.update', customEncrypt($subscriptionPlan->id)) }}" method="POST">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PUT">
    <input type="hidden" name="id" value="{{ !empty($subscriptionPlan) ? $subscriptionPlan->id : '' }}" />
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">{{ __('labels.name') }} <span
                            class="text-danger"><small>*</small></span></label>
                    <div class="form-control-wrap">
                        <input type="text" name="name" class="form-control"
                            placeholder="{{ __('labels.enter_name') }}" value="{{ $subscriptionPlan->name }}">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label">
                        {{ trans('labels.upload_limit') }}
                        <span class="text-danger"><small>*</small></span>
                    </label>
                    <div class="form-control-wrap">
                        <input type="text" id="upload_limit" name="upload_limit"
                            placeholder="{{ trans('labels.upload_limit') }}" class="form-control"
                            value="{{ $subscriptionPlan->upload_limit }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label">{{ __('labels.description') }} <span
                class="text-danger"><small>*</small></span></label>
        <div class="form-control-wrap">
            <textarea name="description" class="description-editor form-control">{{ $subscriptionPlan->description }}</textarea>
        </div>
    </div>
    <div class="form-group text-end">
        <input type="hidden" name="stripe_plan_id" value="{{ $subscriptionPlan->stripe_plan_id }}">
        <button type="button" class="btn btn-primary me-1"
            id="updateBtn">{{ __('labels.update') }}</button>
        <button type="button" data-dismiss="modal" class="btn btn-light custom-close"
            id="updateCancelBtn">{{ __('labels.cancel') }}</button>
    </div>
</form>

{!! JsValidator::formRequest(
    'App\Http\Requests\Backend\SubscriptionPlanRequest',
    '#updateForm',
)->ignore("input:hidden:not(input:hidden.required), [contenteditable='true']") !!}
