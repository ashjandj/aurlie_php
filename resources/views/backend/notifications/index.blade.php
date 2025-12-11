@extends('layouts.backend.app')
@section('title', __('labels.notification'))
@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <nav>
                                <ul class="breadcrumb breadcrumb-arrow">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.dashboard')}}">{{__('labels.dashboard')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('labels.notification')}}</li>
                                </ul>
                            </nav>
                            <h3 class="nk-block-title page-title">{{__('labels.notification')}}</h3>
                        </div>
                    </div>
                </div>
                <div class="nk-block ">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init nowrap table" id="notification-table">
                                <thead>
                                    <tr>
                                        <th class="nosort nk-tb-col-tools w_70 id">{{__('labels.serial_no')}}</th>
                                        <th class="message">{{__('labels.notification')}}</th>
                                        <th class="datetime">{{__('labels.date_time')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="9">
                                            <div id="loaderTb"></div>
                                        </td>
                                        <td class="d-none"></td>
                                        <td class="d-none"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- readMore modal @s-->
<x-read-more-modal id="read-more-modal" dataId="notificationReadMoreData" />
<!-- readMore modal @e-->
<!-- content @e -->
@endsection
@push('scripts')
{!! returnScriptWithNonce(asset_path('assets/js/backend/notifications/index.js')) !!}
@endpush
