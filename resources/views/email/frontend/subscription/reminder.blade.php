@extends('layouts.email.app')
@section('title', __('labels.subscription_reminder'))
@section('subject', __('labels.subscription_reminder'))
@section('content')
<p>Hi {{ $subscription->user->name}},</p>
<p>Just a quick reminder that your plan <strong>{{$subscription->plan_name}} </strong> expiring soon (24 hours). Please take a moment to review your options to avoid any service interruptions.</p>
<p>Thank you,</p>
<p>{{ getAppName() }}</p>
@endsection