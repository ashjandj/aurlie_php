@extends('layouts.email.app')
@section('title', 'Application Status Update')
@section('subject', 'Application Status Update - Aurelia Club')
@section('content')
<strong style="font-family: 'Urbanist', sans-serif; font-weight:700; color:#000;font-size:18px;">Dear {{ $user->name }},</strong>
<p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:15px;font-weight:400; margin-bottom: 12px; margin-top: 12px;">Thank you for your interest in joining Aurelia Club and for taking the time to complete your application.</p>
<p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:15px;font-weight:400; margin-bottom: 12px;">After careful consideration, we regret to inform you that we are unable to proceed with your application at this time.</p>
<p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:15px;font-weight:400; margin-bottom: 12px;">This decision was not made lightly, and we appreciate the effort you put into your application. We encourage you to continue exploring opportunities that align with your goals and interests.</p>
<p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:15px;font-weight:400; margin-bottom: 12px;">We wish you all the best in your future endeavors.</p>
<p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:15px;font-weight:400; margin-top: 20px;">Best regards,<br>The Aurelia Club Team</p>
@endsection

