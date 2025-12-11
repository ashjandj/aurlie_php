@extends('layouts.frontend.app')
@section('title', trans('labels.subscription_plans'))
@section('main-class', 'subscription-plans')
@section('meta-title', 'subscription_plans')
@section('meta-keywords', 'subscription_plans')
@section('meta-description', 'subscription_plans')
@section('content')
<section class="pricing-section pb-5">
    <div class="container my-5">
        <div class="row justify-content-md-center">
            <div class="section-title text-center title-ex1">
                <h1 class="display-4 fw-normal">{{trans('labels.pricing')}}</h1>
                <p class="fs-5 text-muted">{{trans('labels.pricing_description')}}</p>
            </div>
        </div>
        <!-- Pricing Table starts -->
        @if(!count($plans))
            <p class="fs-4 mt-4 text-center">{{__('labels.no_plans')}}</p> 
        @endif
        <ul class="nav nav-pills justify-content-center mt-3" id="pills-tab" role="tablist">
            @foreach($plans as $key => $subscriptionPlan)
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill {{$loop->first ? 'active' : ''}}" id="pills-{{$key}}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$key}}" type="button" role="tab" aria-controls="pills-{{$key}}" aria-selected="true">{{$subscriptionPlan->name}}</button>
            </li>
            @endforeach
        </ul>
        <div class="tab-content" id="pills-tabContent">
            @foreach($plans as $key => $subscriptionPlan)
            <div class="tab-pane fade {{$loop->first ? 'show active' : ''}}" id="pills-{{$key}}" role="tabpanel" aria-labelledby="pills-{{$key}}-tab">
                <div class="row my-5 justify-content-center">
                    @forelse($subscriptionPlan->price as $price)
                        <x-plan :price="$price" :existingPlan="$existingPlan" :schedulePlan="$schedulePlan" />
                    @empty
                        <p>{{trans('labels.no_plan_found')}}</p>
                    @endforelse
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset_path('assets/css/frontend/subscription.css')}}">
@endpush

@push('scripts')
{!! returnScriptWithNonce(asset_path('assets/js/frontend/subscription-plan/index.js')) !!}
@endpush