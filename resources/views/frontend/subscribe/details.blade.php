@extends('layouts.frontend.app')
@section('title', trans('labels.subscription_details'))
@section('main-class', 'subscription-plans')
@section('meta-title', 'subscription_plans')
@section('meta-keywords', 'subscription_plans')
@section('meta-description', 'subscription_plans')
@section('content')
<section class="pricing-section pb-5">
    <div class="container my-20">
        <div class="row justify-content-md-center">
            <div class="section-title text-center title-ex1">
                <h1 class="display-4 fw-normal">{{trans('labels.subscription_details')}}</h1>
                @if (!$subscription)
                    <h6 class="alert alert-danger">{{trans('labels.no_subscription_found')}}</h6>
                @endif
            </div>
        </div><br>
        <br>
        @if ($subscription)
        <div class="row g-3">
            <div class="col-12 col-sm-5 col-lg-5">
                <div class="membershipPage_details radius-10">
                    <div class="commonBox border-0">
                        <div class="membershipPage_details_cnt">
                            <h3>{{$subscription->plan_name}} for {{formatCurrency($subscription->amount)}}</h3>
                        </div>
                        <table class="table table-responsive table-borderless table-striped my-4">
                            <tr>
                                <th class="text-success">{{ trans('labels.status') }}</th>
                                <td>{{ucfirst($subscription->status)}}</td>
                            </tr>
                            <tr>
                                <th class="text-success">{{ trans('labels.interval') }}</th>
                                <td>{{ucfirst($subscription->interval)}}</td>
                            </tr>
                            <tr>
                                <th class="text-success">{{ trans('labels.media_upload_limit') }}</th>
                                <td>{{$subscription->upload_limit}}</td>
                            </tr>
                            <tr>
                                <th class="text-success">{{ trans('labels.started_on') }}</th>
                                <td>{{getConvertedDate($subscription->current_period_start, 'd/m/Y')}}</td>
                            </tr>
                            <tr>
                                <th class="text-success">{{ trans('labels.expired_on') }}</th>
                                <td>{{getConvertedDate($subscription->current_period_end, 'd/m/Y')}}</td>
                            </tr>
                        </table>
                        
                        @if ($subscription->canceled_at != null || $subscription->status == 'canceled')
                        <span class="btn btn-danger" style="pointer-events: none">{{trans('labels.subscription_cancelled')}}</span>
                        @else
                        <a href="#" id="cancelSubscription" class="btn btn-secondary d-flex align-items-center justify-content-center ripple-effect planCancel">{{trans('labels.cancel_plan')}}</a>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            <div class="col-12 col-sm-7 {{!$subscription ? 'col-lg-12' : 'col-lg-7'}}">
                <div class="radius-10 card">
                    <div class="commonBox">
                        <div class="commonBox_header d-flex justify-content-between align-items-center">
                            <h3 class="commonBox_heading mb-0">{{ __('labels.payment_history')}}</h3>
                        </div>
                        <div class="commonBox_body">
                           
                            <div class="paymentHistory">
                                
                                <div class="page">
                                    @forelse ( $transactions as $transaction)
                                        <div class="paymentHistory_item d-flex align-items-center mt-2 justify-content-between" data-tid="{{$transaction->transaction_id}}">
                                            <div class="paymentHistory_left d-flex align-items-center">
                                                <div class="paymentHistory_icon">
                                                    @if($transaction->status == 'paid')
                                                        <img src="{{asset_path('assets/images/frontend/payment-successfull.png')}}" class="img-fluid" alt="failed">
                                                    @else
                                                        <img src="{{asset_path('assets/images/frontend/payment-fail.png')}}" class="img-fluid" alt="failed">
                                                    @endif
                                                </div>
                                                <div class="paymentHistory_cnt">
                                                    <div>{{ucfirst($transaction->subscription->plan_name)}}</div>
                                                    {{getConvertedDate($transaction->created_at, 'd/m/Y')}}
                                                </div>
                                            </div>
                                            <div class="paymentHistory_right">
                                                <p class="paymentHistory_price mb-0 failedPrice">
                                                {{formatCurrency($transaction->amount)}}
                                                </p>
                                            </div>
                                        </div>
                                    @empty
                                        <p>{{trans('labels.no_transaction_found')}}</p>
                                    @endforelse
                                </div>
                            </div>
                            <div id="loadDiv">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script nonce="{{csp_nonce()}}">
    let subscriptionId = "{{$subscription?->stripe_subscription_id}}";
</script>
{!! returnScriptWithNonce(asset_path('assets/js/frontend/subscription-detail/index.js')) !!}
@endpush