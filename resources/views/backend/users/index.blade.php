@extends('layouts.backend.app')
@section('title', __('labels.user_management'))
@section('content')
    <!-- content @s -->
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <nav>
                                        <ul class="breadcrumb breadcrumb-pipe">
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('admin.dashboard') }}">{{ __('labels.dashboard') }}</a>
                                            </li>
                                            <li class="breadcrumb-item active">{{ __('labels.user_list') }}</li>
                                        </ul>
                                    </nav>
                                    <h3 class="nk-block-title page-title">{{ __('labels.user_management') }}</h3>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                            data-target="pageMenu">
                                            <em class="icon ni ni-more-v"></em>
                                        </a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">
                                                <!-- filter start here -->
                                                <form id='resetFormFilter'>
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-trigger btn-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown">
                                                            <div class="dot dot-primary" id="filter_badge"
                                                                style="display:none;"></div>
                                                            <em class="icon ni ni-filter-alt"></em>
                                                        </a>
                                                        <div
                                                            class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                            <div class="dropdown-head">
                                                                <span class="sub-title dropdown-title">
                                                                    {{ trans('labels.filter') }}
                                                                </span>
                                                            </div>
                                                            <div class="dropdown-body dropdown-body-rg">
                                                                <div class="row gx-6 gy-3">

                                                                    {{-- Email --}}
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label
                                                                                class="overline-title overline-title-alt">
                                                                                {{ trans('labels.email') }}
                                                                            </label>
                                                                            <input type="text" name="email" id="userEmail" class="form-control" placeholder="{{__('labels.enter_user_email')}}">
                                                                        </div>
                                                                    </div>

                                                                    {{-- Status  --}}
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label class="overline-title overline-title-alt">{{__('labels.status')}}</label>
                                                                            <select class="form-select js-select2" id='searchStatus' data-placeholder="{{__('labels.select_status')}}">
                                                                                <option></option>
                                                                                <option value="active">{{__('labels.active')}}</option>
                                                                                <option value="inactive">{{__('labels.inactive')}}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="dropdown-foot between">
                                                                <a class="clickable cursor-pointer" id="resetFilter">
                                                                    {{ trans('labels.reset_filter') }}
                                                                </a>
                                                                <a class="btn btn-sm btn-primary" id="searchFilter">
                                                                    {{ trans('labels.filter') }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <li><a href="#" class="btn btn-white btn-outline-light exportCsv"><em class="icon ni ni-download-cloud"></em><span>{{__('labels.export')}}</span></a></li>
                                                @can('admin.users.create')
                                                    <li>
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#addUserModal" class="btn btn-primary addUserBtn"
                                                            id="addUserBtn">{{ __('labels.add_user') }}</button>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                        </div><!-- .nk-block-head -->
                    </div>
                    <div class="nk-block nk-block-lg">
                        <div class="card card-preview">
                            <div class="card-inner ">
                                <div class="common-table">
                                    <table class="datatable-init nowrap table" id="user-list-table">
                                        <thead>
                                            <tr>
                                                <th class="id">{{ __('labels.sr_no') }}</th>
                                                <th class="name">{{ __('labels.name') }}</th>
                                                <th class="login_type">{{ __('labels.login_type') }}</th>
                                                <th class="phone_number">{{ __('labels.phone_number') }}</th>
                                                <th class="created_at">{{ __('labels.created_at') }}</th>
                                                <th class="status">{{ __('labels.status') }}</th>
                                                @canany(['admin.users.edit', 'admin.users.destroy'])
                                                <th class="nosort nk-tb-col-tools actions">{{__('labels.action')}}</th>
                                                @endcanany
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class="">
                                                    <div id="loaderTb"></div>
                                                </td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                @canany(['admin.users.edit', 'admin.users.destroy'])
                                                <td class=""></td>
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

    <!-- add user modal @s-->
    <div class="modal fade zoom" tabindex="-1" id="addUserModal" data-bs-backdrop="static" data-bs-keyboard="false">
    </div>
    <!-- add user modal @e-->

    <!-- edit user modal @s-->
    <x-empty-modal id="editUserModal" title="{{__('labels.edit_user')}}" bodyId="editUserForm" />
    <!-- edit user modal @e-->
@endsection
@push('scripts')
    {!! returnScriptWithNonce(asset_path('assets/js/backend/users/index.js')) !!}
@endpush
