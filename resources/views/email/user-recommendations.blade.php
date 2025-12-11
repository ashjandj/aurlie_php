@extends('layouts.email.app')
@section('title', 'Profile Recommendations')
@section('subject', 'We\'ve found some profiles that match your vibes')
@section('content')
<strong style="font-family: 'Urbanist', sans-serif; font-weight:700; color:#000;font-size:18px;">We've found some profiles that match your vibes!</strong>
<p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:15px;font-weight:400; margin-bottom: 12px; margin-top: 12px;">Dear {{ $user->name }},</p>
<p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:15px;font-weight:400; margin-bottom: 12px;">We're excited to share some profiles that we think might be a great match for you!</p>

<div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;">
    <h3 style="font-family: 'Urbanist', sans-serif; font-weight:700; color:#000;font-size:16px; margin-bottom: 15px;">Recommended Profiles</h3>
    @foreach($recommendedUsers as $recommendedUser)
    <div style="border-bottom: 1px solid #dee2e6; padding: 15px 0; {{ !$loop->last ? '' : 'border-bottom: none;' }}">
        <p style="font-family: 'Urbanist', sans-serif; color:#000; font-size:16px;font-weight:600; margin-bottom: 5px;">
            {{ $recommendedUser->name }}
        </p>
        @if($recommendedUser->age)
        <p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:14px; margin-bottom: 5px;">
            Age: {{ $recommendedUser->age }}
        </p>
        @endif
        @if($recommendedUser->city_country)
        <p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:14px; margin-bottom: 5px;">
            Location: {{ $recommendedUser->city_country }}
        </p>
        @endif
    </div>
    @endforeach
</div>

<p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:15px;font-weight:400; margin-bottom: 12px; margin-top: 20px;">Log in to your account to view these profiles and connect with members who share your interests!</p>
<a href="{{ route('frontend.auth.login') }}" style="display: inline-block; background-color: #007bff; color: #ffffff; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-family: 'Urbanist', sans-serif; font-size:16px;font-weight:700; margin: 20px 0;">View Profiles</a>
<p style="font-family: 'Urbanist', sans-serif;color:#707070; font-size:15px;font-weight:400; margin-top: 20px;">We hope you find someone special!</p>
@endsection

