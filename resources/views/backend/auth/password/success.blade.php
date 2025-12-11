@extends('layouts.backend.app')
@section('title',__('labels.reset_password_email_sent'))
@section('content')

<body class="authPage nk-body npc-default pg-auth bg-gradient">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="{{ route('admin.login') }}" class="logo-link">
                                <x-logo logoClass="logo-img-lg"></x-logo>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head pb-0">
                                    <div class="nk-block-head-content text-center">
                                        <h4 class="nk-block-title">{{__('labels.thank_you_submitform')}}</h4>
                                        <div class="nk-block-des">
                                            <p class="mb-0">{{__('messages.pass_instructions_email')}}</p>
                                            <p>{{__('message.check_email')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    @endsection
