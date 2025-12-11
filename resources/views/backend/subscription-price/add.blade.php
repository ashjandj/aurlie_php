<div class="modal-dialog" role="document">
    <div class="modal-content bg-white">
        <a class="close custom-close" data-dismiss="modal" aria-label="Close">
            <em class="icon ni ni-cross"></em>
        </a>
        <div class="modal-header">
            <h5 class="modal-title">{{!empty($subscriptionPrice) ? trans('labels.edit_subscription_price') : trans('labels.add_subscription_price')}}</h5>
        </div>
        <div class="modal-body">
            <form id="subscription-price-add-form" action="{{ !empty($subscriptionPrice) ? route('admin.subscription-price.update', $subscriptionPrice->id ):  route('admin.subscription-price.store') }}" method="POST">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="{{!empty($subscriptionPrice) ?'PUT':'POST'}}">
                @if(!empty($subscriptionPrice))
                <input type="hidden" name="id" value="{{!empty($subscriptionPrice) ? $subscriptionPrice->id : '' }}" />
                @endif
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.name')}} <span class="text-danger"><small>*</small></span></label>
                                <div class="form-control-wrap">
                                    <input type="text" name="name" class="form-control" placeholder="{{__('labels.enter_name')}}" value="{{!empty($subscriptionPrice) ? $subscriptionPrice->name : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.subscription_plan')}} <span class="text-danger"><small>*</small></span></label>
                                <div class="form-control-wrap">
                                    <select name="stripe_plan_id" class="form-select js-select2 form-select2" id='stripe_plan_id' data-placeholder="{{__('labels.select_plan')}}">
                                        <option value=""></option>
                                        <option value="">{{trans('labels.subscription_plan')}}</option>
                                        @foreach($plans as $plan)
                                        <option value="{{$plan->stripe_plan_id}}" {{!empty($subscriptionPrice) && $subscriptionPrice->stripe_plan_id == $plan->stripe_plan_id ? 'selected' : ''}} >{{ucfirst($plan->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.price')}} <span class="text-danger"><small>*</small></span></label>
                                <div class="form-control-wrap">
                                    <input type="text" name="amount" class="form-control" placeholder="{{__('labels.enter_price')}}" value="{{!empty($subscriptionPrice) ? $subscriptionPrice->amount : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">{{trans('labels.interval')}} <span class="text-danger"><small>*</small></span></label>
                                <div class="form-control-wrap">
                                    <select name="interval" class="form-select js-select2 form-select2" id='searchInterval' data-placeholder="Select interval">
                                        <option value=""></option>
                                        <option value="">{{trans('labels.select_interval')}}</option>
                                        @foreach(['day','week','month','year'] as $interval)
                                        <option {{!empty($subscriptionPrice) && $subscriptionPrice->interval == $interval ? 'selected' : ''}} value="{{$interval}}">{{ucfirst($interval)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">{{trans('labels.description')}} <span class="text-danger"><small>*</small></span></label>
                    <div class="form-control-wrap">
                        <textarea name="description" class="description-editor form-control" id="description">
                            {{!empty($subscriptionPrice) ? $subscriptionPrice->description : ''}}
                        </textarea>
                    </div>
                </div>
                <div class="form-group text-end">
                    @if(!empty($subscriptionPrice))
                        <input type="hidden" name="stripe_price_id" value="{{$subscriptionPrice->stripe_price_id}}">
                    @endif
                    <button type="button" class="btn btn-primary me-1" id="subscription-price-submit-btn">{{!empty($subscriptionPrice) ? trans('labels.update') : trans('labels.add')}}</button>
                    <button type="button" data-dismiss="modal" class="btn btn-light custom-close" id="subscriptionPriceCancelBtn">{{trans('labels.cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

{!! JsValidator::formRequest('App\Http\Requests\Backend\SubscriptionPriceRequest','#subscription-price-add-form')->ignore("input:hidden:not(input:hidden.required), [contenteditable='true']") !!}