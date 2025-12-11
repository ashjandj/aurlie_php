@extends('layouts.email.app')
@section('title', __('labels.forgot_password'))
@section('subject', __('labels.forgot_password'))
@section('content')
<strong style="font-family: 'Urbanist', sans-serif; font-weight:700; color:#000;font-size:18px;">{{__('labels.hi')}}, {{!empty($data['name']) ? $data['name'] : '' }}!</strong>
<p style="font-family: 'Urbanist', sans-serif; color:#707070; font-size:15px;font-weight:400; margin-bottom: 12px; margin-top: 12px;">{{__('labels.use_below_link')}}</p>
<a href="{{$data['reset_password_link']}}" style="font-family: 'Urbanist', sans-serif;  font-size:18px;font-weight:700; margin-bottom: 12px; margin-top: 12px;">{{__('labels.password_reset_link')}}</a>
<p style="font-family: 'Urbanist', sans-serif;color:#707070; font-size:15px;font-weight:400;">{{__('labels.link_expire_message')}}</p>
<p style="font-family: 'Urbanist', sans-serif;color:#707070; font-size:15px;font-weight:400;">{{__('labels.if_not_review_account')}}</p>
@endsection