@extends('layouts.email.app')
@section('title', 'User Approval')
@section('subject', 'Hurray, you\'re approved! Welcome to Aurelia Club…')
@section('content')
<strong style="font-family: 'Urbanist', sans-serif; font-weight:700; color:#000;font-size:18px;">Hurray, you're approved! Welcome to Aurelia Club…</strong>
<p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:15px;font-weight:400; margin-bottom: 12px; margin-top: 12px;">Dear {{ $user->name }},</p>
<p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:15px;font-weight:400; margin-bottom: 12px;">We are thrilled to inform you that your application has been approved! Welcome to Aurelia Club.</p>

@if($subscription)
<div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;">
    <h3 style="font-family: 'Urbanist', sans-serif; font-weight:700; color:#000;font-size:16px; margin-bottom: 15px;">Membership Summary</h3>
    <table style="width: 100%; font-family: 'Urbanist', sans-serif; color:#707070; font-size:14px;">
        <tr>
            <td style="padding: 8px 0; font-weight: 600;">Plan Name:</td>
            <td style="padding: 8px 0;">{{ $subscription->plan_name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td style="padding: 8px 0; font-weight: 600;">Amount:</td>
            <td style="padding: 8px 0;">{{ formatCurrency($subscription->amount ?? 0) }}</td>
        </tr>
        <tr>
            <td style="padding: 8px 0; font-weight: 600;">Interval:</td>
            <td style="padding: 8px 0;">{{ ucfirst($subscription->interval ?? 'N/A') }}</td>
        </tr>
        @if($subscription->upload_limit)
        <tr>
            <td style="padding: 8px 0; font-weight: 600;">Media Upload Limit:</td>
            <td style="padding: 8px 0;">{{ $subscription->upload_limit }}</td>
        </tr>
        @endif
    </table>
</div>
@else
<div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;">
    <h3 style="font-family: 'Urbanist', sans-serif; font-weight:700; color:#000;font-size:16px; margin-bottom: 15px;">Membership Summary</h3>
    <p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:14px;">Please visit our pricing page to select a membership plan that suits you.</p>
</div>
@endif

<p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:15px;font-weight:400; margin-bottom: 12px; margin-top: 20px;">To complete your membership, please proceed with the payment:</p>
<a href="{{ $paymentLink }}" style="display: inline-block; background-color: #007bff; color: #ffffff; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-family: 'Urbanist', sans-serif; font-size:16px;font-weight:700; margin: 20px 0;">Complete Payment</a>
<p style="font-family: 'Urbanist', sans-serif;color:#707070; font-size:14px;font-weight:400; margin-top: 12px;">If the button doesn't work, copy and paste this link into your browser:</p>
<p style="font-family: 'Urbanist', sans-serif;color:#007bff; font-size:14px;font-weight:400; word-break: break-all;">{{ $paymentLink }}</p>
<p style="font-family: 'Urbanist', sans-serif;color:#707070; font-size:15px;font-weight:400; margin-top: 20px;">We look forward to having you as part of our community!</p>
@endsection

