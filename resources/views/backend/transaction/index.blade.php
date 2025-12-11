@extends('layouts.backend.app')
@section('title',trans('labels.transaction_history'))
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
                                    <li class="breadcrumb-item active">{{__('labels.transaction_history')}}</li>
                                </ul>
                            </nav>
                            <h3 class="nk-block-title page-title">{{__('labels.transaction_history')}}</h3>
                            <!-- breadcrumb @e -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->

                <div class="nk-block nk-block-lg">
                    <div class="card card-preview {{getClassValue('cardBorder')}}">
                        <div class="card-inner ">
                            <div class="common-table">
                                <table class="datatable-init nowrap table" id="transaction_table" aria-describedby="transaction table">
                                    <thead>
                                        <tr>
                                            <th class="w_70 id">{{__('labels.sr_no')}}</th>
                                            <th class="name">{{__('labels.name')}}</th>
                                            <th class="plan_name">{{__('labels.plan_name')}}</th>
                                            <th class="interval">{{__('labels.interval')}}</th>
                                            <th class="amount">{{__('labels.amount')}}</th>
                                            <th class="status">{{__('labels.status')}}</th>
                                            <th class="date">{{__('labels.date')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="3">
                                                
                                            </td>
                                            <td class="d-none"></td>
                                            <td class="d-none">
                                            </td>
                                            <td class="">
                                                <div id="loaderTb"></div>
                                            </td>
                                            <td class="d-none"></td>
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
</div>
<!-- content @e -->
@endsection
@push('scripts')
{!! returnScriptWithNonce(asset_path('assets/js/backend/transaction/index.js')) !!}
@endpush