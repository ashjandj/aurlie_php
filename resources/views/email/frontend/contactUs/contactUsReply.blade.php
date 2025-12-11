@extends('layouts.email.app')
@section('title', __('labels.contact_us_reply_mail'))
@section('subject', __('labels.contact_us_reply_mail'))
@section('content')
<p>Hi {{ $contactUsData['name']}},</p>
<p> {{$contactUsData['replyMessage']}}</p>
<p>Thank you,</p>
<p>{{ getAppName() }}</p>
@endsection