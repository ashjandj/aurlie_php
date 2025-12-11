<div class="col-md-4">
    <div class="price-card mb-4 {{$existingPlan ? ($existingPlan['stripe_price_id'] == $price->stripe_price_id ? '' : 'featured') : 'featured'}} text-center">
        <h2>{{$price->name}}</h2>
        <p>{!! ucFirst($price->description) !!}</p>
        <p class="price"><span class="h2">{{formatCurrency($price->amount)}}</span> / {{ ucFirst($price->interval)}}</p>
        <div class="pt-4">
            @if ($existingPlan)
                @if ($existingPlan['stripe_price_id'] == $price->stripe_price_id)
                    <a href="{{ route('subscription.details') }}" class="btn btn-success btn-mid rounded-pill">{{trans('labels.existing_plan')}}</a>
                @else
                    @if ($schedulePlan)
                        @if ($schedulePlan['status'] == 'not_started' && $schedulePlan['priceId'] == $price->stripe_price_id)
                            <span class="btn btn-danger" style="pointer-events: none">{{trans('labels.activate_on')}} : {{getConvertedDate($existingPlan['current_period_end'], 'd/m/Y')}} </span>
                        @elseif ($schedulePlan['status'] == 'not_started')
                            <a href="#" id="existing-schedule" class="btn btn-secondary btn-mid rounded-pill">{{trans('labels.upgrade_plan')}}</a>
                        @else
                            <a href="{{ route('plans.show', ['price' => $price->id, 'type' => 'switch']) }}" class="btn btn-secondary btn-mid rounded-pill">{{trans('labels.upgrade_plan')}}</a>
                        @endif
                    @else
                        <a href="{{ route('plans.show', ['price' => $price->id, 'type' => 'switch']) }}" class="btn btn-secondary btn-mid rounded-pill">{{trans('labels.upgrade_plan')}}</a>
                    @endif
                @endif
            @else
                <a href="{{ route('plans.show', ['price' => $price->id]) }}" class="btn btn-secondary btn-mid rounded-pill">{{trans('labels.get_started')}}</a>
            @endif
        </div>
    </div>
</div>