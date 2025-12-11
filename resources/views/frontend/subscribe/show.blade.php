@extends('layouts.frontend.app')
@section('title', trans('labels.checkout'))
@section('main-class', 'checkout')
@section('meta-title', 'checkout')
@section('meta-keywords', 'checkout')
@section('meta-description', 'checkout')
@section('content')
<div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
	<h1 class="display-4 text-center">{{trans('labels.checkout')}}</h1>
	<div class="content">
		<p class="text-center">{{trans('labels.checkout_title', ['price' => formatCurrency($price->amount), 'plan' => $price->name . ' every ' . $price->interval])}}</p>
		<form id="payment-form" action="{{ $requestType == 'switch' ? route('subscription.switch', ['price' => $price->stripe_price_id]) : route('subscription.create', ['price' => $price->stripe_price_id]) }}" method="POST">
			@csrf
			<input type="hidden" name="plan" id="plan" value="{{ $price->id }}">
			<div class="row">
				<div class="form-group">
					<div>
						<label for="">{{trans('labels.cardholder')}}</label>
						<input type="text" name="cardholder" id="cardholder" class="form-control" value="" placeholder="Name on the card">
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="form-group">
					<label for="">{{trans('labels.card_details')}}</label>
					@foreach($paymentMethods as $paymentMethod)
					<div class="form-check">
						<label class="" for="flexRadio1">
							<input class="form-check-input payment-source" type="radio" value="{{$paymentMethod->stripe_payment_method_id}}" name="payment-source" id="flexRadio1" {{ $loop->first ? 'checked' : ''}}>
							<span class="ni ni-visa fs-3 text-gray"></span>
							**** **** **** {{$paymentMethod->card_last_four}}
						</label>
					</div>
					@endforeach
					<div class="form-check">
						<input class="form-check-input payment-source" type="radio" name="payment-source" value="new-card" {{!count($paymentMethods) ? 'checked' : ''}}>
						<div id="card-element" class=""></div>
					</div>
					<div class="form-group">
						<div id="card-error" class="text-danger"></div>
					</div>
				</div>
				<div class="col-xl-12 col-lg-12">
					<input type="hidden" name="token" id="token" value="">
					<button type="button" class="btn btn-primary" id="checkout" data-secret="{{ $intent->client_secret }}">{{trans('labels.pay_now')}}</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@push('scripts')
<script nonce="{{csp_nonce()}}">
	let stripeKey = "{{ config('services.stripe.key') }}";
</script>
{!! returnScriptWithNonce('https://js.stripe.com/v3/') !!}
{!! returnScriptWithNonce(asset_path('assets/js/frontend/subscription/index.js')) !!}
{!! JsValidator::formRequest('App\Http\Requests\Frontend\CheckoutRequest','#payment-form')->ignore("input:hidden:not(input:hidden.required), [contenteditable='true']") !!}
@endpush