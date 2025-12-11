@extends('layouts.backend.app')
@section('title',trans('labels.subscription_price'))
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
                                    <li class="breadcrumb-item active">{{__('labels.subscription_price')}}</li>
                                </ul>
                            </nav>
                            <h3 class="nk-block-title page-title">{{__('labels.subscription_price')}}s</h3>
                            <!-- breadcrumb @e -->
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="javascript:void(0);" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <!-- filter start here -->
                                        <form id='resetFormFilter'>
                                            <div class="dropdown">
                                                <a href="javascript:void(0);" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                                    <div class="dot dot-primary" id="filter_badge" style="display:none;"></div>
                                                    <em class="icon ni ni-filter-alt"></em>
                                                </a>
                                                <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                    <div class="dropdown-head">
                                                        <span class="sub-title dropdown-title">
                                                            {{trans('labels.filter')}}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown-body dropdown-body-rg">
                                                        <div class="row gx-6 gy-3">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="overline-title overline-title-alt">
                                                                        {{trans('labels.interval')}}
                                                                    </label>
                                                                    <select class="form-select js-select2" id='searchInterval' data-placeholder="Select interval">
                                                                        <option value="">{{trans('labels.interval')}}</option>
                                                                        <option value="day">{{trans('labels.daily')}}</option>
                                                                        <option value="week">{{trans('labels.weekly')}}</option>
                                                                        <option value="month">{{trans('labels.monthly')}}</option>
                                                                        <option value="year">{{trans('labels.yearly')}}</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="overline-title overline-title-alt">
                                                                        {{trans('labels.status')}}
                                                                    </label>
                                                                    <select class="form-select js-select2" id='searchStatus' data-placeholder="{{trans('labels.select_status')}}">
                                                                        <option value="">{{trans('labels.select_status')}}</option>
                                                                        <option value="active">{{trans('labels.active')}}</option>
                                                                        <option value="inactive">{{trans('labels.inactive')}}</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="dropdown-foot between">
                                                        <a class="clickable cursor-pointer" id="resetFilter">
                                                            {{trans('labels.reset_filter')}}
                                                        </a>
                                                        <a class="btn btn-sm btn-primary" id="searchFilter">
                                                            {{trans('labels.filter')}}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        @can('admin.subscription-price.create')
                                            <li>
                                                <button type="button" data-toggle="modal" data-target="#add-subscription-price" class="btn btn-primary add-subscription-price" id="add-subscription-price-btn">{{__('labels.add_subscription_price')}}</button>
                                            </li>
                                        @endcan
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
                                <table class="datatable-init nowrap table" id="subscription-price-table">
                                    <thead>
                                        <tr>
                                            <th class="w_70 id">{{trans('labels.sr_no')}}</th>
                                            <th class="plan_name">{{trans('labels.plan_name')}}</th>
                                            <th class="mw_220 name">{{trans('labels.name')}}</th>
                                            <th class="mw_220 interval">{{trans('labels.interval')}}</th>
                                            <th class="amount">{{trans('labels.price')}}</th>
                                            <th class="description">{{trans('labels.description')}}</th>
                                            @canany(['admin.subscription-price.edit', 'admin.subscription-price.changeStatus'])
                                                <th class="status">{{trans('labels.status')}}</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="display-none"></th>
                                            <th class="display-none"></th>
                                            <th class="display-none"></th>
                                            <td>
                                                <div id="loaderTb"></div>
                                            </td>
                                            <th class="display-none"></th>
                                            <th class="display-none"></th>
                                            @canany(['admin.subscription-price.edit', 'admin.subscription-price.changeStatus'])
                                                <th class="display-none"></th>
                                            @endcanany
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

<!-- add and edit subscription_price modal @s-->
<div class="modal fade zoom" tabindex="-1" id="add-subscription-price-modal" data-bs-backdrop="static" data-bs-keyboard="false">
</div>
<!-- add and edit subscription_price modal @e-->

<!-- readMore modal @s-->
<x-read-more-modal id="read-more-modal" dataId="read-more-data" />
<!-- readMore modal @e-->

@endsection
@push('scripts')
{!! returnScriptWithNonce(asset_path('assets/js/backend/subscription-price/index.js')) !!}
@endpush