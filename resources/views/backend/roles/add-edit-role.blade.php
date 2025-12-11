@extends('layouts.backend.app')
@section('title', __('labels.role_management'))
@section('content')
    <!-- content @s
        -->
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
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                        </div>
                        <div class="nk-block nk-block-lg">
                            <div class="card card-preview">
                                <div class="card-inner ">
                                    <form id="roleAddEditForm"
                                        action="{{ !empty($role) ? route('admin.roles.update', $role->id) : route('admin.roles.store') }}"
                                        method="POST">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="{{ !empty($role) ? 'PUT' : 'POST' }}">
                                        <input type="hidden" name="id" value="{{ !empty($role) ? $role->id : '' }}" />

                                        <div class="form-group">
                                            <label class="form-label">{{ __('labels.role_name') }} <span
                                                    class="text-danger"><small>*</small></span> </label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter name" value="{{ !empty($role) ? $role->name : '' }}">
                                            </div>
                                        </div>

                                        @foreach ($modulePermissions as $module => $permissions)
                                            <div class="form-group">
                                                <label class="form-label">{{ __("labels.$module") }}</label>

                                                <div class="row">
                                                    @foreach ($permissions as $permission)
                                                        @if ($permission->name != 'admin.roles.destroy')
                                                            <div class="col-md-3">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input {{ $permission->name }}"
                                                                        type="checkbox" name="permissions[]"
                                                                        id="permission-{{ $permission->id }}"
                                                                        value="{{ $permission->name }}"
                                                                        @checked(!empty($rolePermissions) && in_array($permission->id, $rolePermissions))>

                                                                    <label class="form-check-label"
                                                                        for="permission-{{ $permission->id }}">
                                                                        {{ __("labels.$permission->alias") }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="form-group text-end">
                                            <button type="button" class="btn btn-primary me-1"
                                                id="roleSubmitBtn">{{ !empty($role) ? __('labels.update') : __('labels.add') }}</button>
                                            <a  href="{{route('admin.roles.index')}}" class="btn btn-light"
                                                id="roleCancelBtn">{{ __('labels.cancel') }}</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (!empty($role))
            {!! JsValidator::formRequest(
                'App\Http\Requests\Backend\UpdateRoleRequest',
                '#roleAddEditForm',
            )->ignore("input:hidden:not(input:hidden.required), [contenteditable='true']") !!}
        @else
            {!! JsValidator::formRequest(
                'App\Http\Requests\Backend\StoreRoleRequest',
                '#roleAddEditForm',
            )->ignore("input:hidden:not(input:hidden.required), [contenteditable='true']") !!}
        @endif
    @endsection
    @push('scripts')
        {!! returnScriptWithNonce(asset_path('assets/js/backend/roles/add-edit-role.js')) !!}
    @endpush

