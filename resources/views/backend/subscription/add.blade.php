<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content bg-white">
        <a class="close custom-close" data-dismiss="modal" aria-label="Close">
            <em class="icon ni ni-cross"></em>
        </a>
        <div class="modal-header">
            <h5 class="modal-title">{{__('labels.add_subscription_plan')}}</h5>
        </div>
        <div class="modal-body">
            <form id="saveForm" action="{{ route('admin.subscription-plan.store') }}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">{{__('labels.name')}} <span class="text-danger"><small>*</small></span></label>
                                <div class="form-control-wrap">
                                    <input type="text" name="name" class="form-control" placeholder="{{__('labels.enter_name')}}">
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    {{trans("labels.upload_limit")}}
                                    <span class="text-danger"><small>*</small></span>
                                </label>
                                <div class="form-control-wrap">
                                    <input type="text" id="upload_limit" name="upload_limit" placeholder="{{trans('labels.upload_limit')}}" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">{{__('labels.description')}} <span class="text-danger"><small>*</small></span></label>
                    <div class="form-control-wrap">
                        <textarea name="description" class="description-editor form-control"></textarea>
                    </div>
                </div>
                <div class="form-group text-end">
                    <button type="button" class="btn btn-primary me-1" id="saveBtn">{{ __('labels.add')}}</button>
                    <button type="button" data-dismiss="modal" class="btn btn-light custom-close" id="saveCancelBtn">{{__('labels.cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

{!! JsValidator::formRequest('App\Http\Requests\Backend\SubscriptionPlanRequest','#saveForm')->ignore("input:hidden:not(input:hidden.required), [contenteditable='true']") !!}