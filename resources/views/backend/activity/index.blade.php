@extends('layouts.backend.app')
@section('title',__('labels.activity'))
@section('content')
<!-- content @s -->
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <nav>
                                <ul class="breadcrumb breadcrumb-pipe">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('admin.dashboard')}}">{{__('labels.dashboard')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('labels.activity')}}</li>
                                </ul>
                            </nav>
                            <h3 class="nk-block-title page-title">{{__('labels.activity')}}</h3>
                            <!-- breadcrumb @e -->
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                    data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li><a href="#" class="btn btn-white btn-outline-light exportCsv"><em class="icon ni ni-download-cloud"></em><span>{{__('labels.export')}}</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->

                <div class="nk-block nk-block-lg">
                    <div class="card card-preview {{getClassValue('cardBorder')}}">
                        <div class="card-inner ">
                            <div class="common-table">
                                <table class="datatable-init nowrap table" id="activity_table" aria-describedby="activity table">
                                    <thead>
                                        <tr>
                                            <th class="w_70 id">{{__('labels.sr_no')}}</th>
                                            <th class="log_name">{{__('labels.log_name')}}</th>
                                            <th class="event">{{__('labels.event')}}</th>
                                            <th class="causer">{{__('labels.causer')}}</th>
                                            <th class="description">{{__('labels.description')}}</th>
                                            <th class="date">{{__('labels.date')}}</th>
                                            @can('admin.activity.destroy')
                                            <th class="nosort nk-tb-col-tools actions">{{__('labels.action')}}</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="3">
                                                
                                            </td>
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>
                                            <td class="">
                                                <div id="loaderTb"></div>
                                            </td>
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>
                                            @can('admin.activity.destroy')
                                            <td class="d-none"></td>
                                            @endcan
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
</div>
<!-- content @e -->
<!-- readMore modal @s-->
<x-read-more-modal id="read-more-modal" dataId="read-more-activity" />
<!-- readMore modal @e-->
@endsection
@push('scripts')
{!! returnScriptWithNonce(asset_path('assets/js/backend/activity/index.js')) !!}
@endpush