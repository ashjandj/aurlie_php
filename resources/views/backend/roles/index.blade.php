@extends('layouts.backend.app')
@section('title', __('labels.role_management'))
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
                                            <li class="breadcrumb-item active">{{ __('labels.roles') }}</li>
                                        </ul>
                                    </nav>
                                    <h3 class="nk-block-title page-title">{{ __('labels.role_management') }}</h3>
                                </div><!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                            data-target="pageMenu">
                                            <em class="icon ni ni-more-v"></em>
                                        </a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">
                                                @can('admin.roles.create')
                                                    <li>
                                                        {{-- <button type="button" data-toggle="modal" data-target="#addEditRoleModal"
                                                            class="btn btn-primary addEditRole"
                                                            id="addEditRoleBtn">{{ __('labels.add_role') }}</button> --}}
                                                        <a href="{{route('admin.roles.create')}}"
                                                        class="btn btn-primary addEditRole"
                                                        id="addEditRoleBtn">{{ __('labels.add_role') }}</a>
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
                                    <table class="datatable-init nowrap table" id="role-list-table">
                                        <thead>
                                            <tr>
                                                <th class="w_70 id">{{ __('labels.sr_no') }}</th>
                                                <th class="name">{{ __('labels.name') }}</th>
                                                <th class="created_by">{{ __('labels.created_by') }}</th>
                                                <th class="updated_by">{{ __('labels.updated_by') }}</th>
                                                {{-- <th class="status">{{ __('labels.status') }}</th> --}}

                                                @canany(['admin.roles.edit', 'admin.roles.destroy'])
                                                    <th class="nosort nk-tb-col-tools actions">{{ __('labels.action') }}</th>
                                                @endcanany
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class="">
                                                    <div id="loaderTb"></div>
                                                </td>
                                                {{-- <td class=""></td> --}}
                                                <td class=""></td>
                                                @canany(['admin.roles.edit', 'admin.roles.destroy'])
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

    <!-- add role modal @s-->
    <div class="modal fade zoom" tabindex="-1" id="addEditRoleModal" data-bs-backdrop="static" data-bs-keyboard="false">
    </div>
    <!-- add role modal @e-->

@endsection
@push('scripts')
    {!! returnScriptWithNonce(asset_path('assets/js/backend/roles/index.js')) !!}
@endpush
