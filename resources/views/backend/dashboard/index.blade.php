@extends('layouts.backend.app')
@section('title', __('labels.dashboard'))
@section('content')

    <div class="nk-content dashboard dashboardCardFont">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">{{ __('labels.dashboard') }}</h3>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card">
                                    <div class="nk-ecwg nk-ecwg6">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title">{{ __('labels.total_sub_admin_&_users') }}</h6>
                                                </div>
                                            </div>
                                            <div class="data">
                                                <div class="data-group">
                                                    <div class="amount">{{ $userCount->sum() }}</div>
                                                    <div class="nk-ecwg6-ck item">
                                                        <canvas class="ecommerce-line-chart-s3" id="todayOrders"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                    </div><!-- .nk-ecwg -->
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card">
                                    <div class="nk-ecwg nk-ecwg6">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title">{{ __('labels.total_sub_admin') }}</h6>
                                                </div>
                                            </div>
                                            <div class="data">
                                                <div class="data-group">
                                                    <div class="amount">{{ $userCount->get('admin', 0) }}</div>
                                                    <div class="nk-ecwg6-ck">
                                                        <canvas class="ecommerce-line-chart-s3" id="todayRevenue"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                    </div><!-- .nk-ecwg -->
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card">
                                    <div class="nk-ecwg nk-ecwg6">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title">{{ __('labels.total_users') }}</h6>
                                                </div>
                                            </div>
                                            <div class="data">
                                                <div class="data-group">
                                                    <div class="amount">{{ $userCount->get('user', 0) }}</div>
                                                    <div class="nk-ecwg6-ck">
                                                        <canvas class="ecommerce-line-chart-s3"
                                                            id="todayCustomers"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                    </div><!-- .nk-ecwg -->
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card">
                                    <div class="nk-ecwg nk-ecwg6">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title">{{ __('labels.total_subscribers') }}</h6>
                                                </div>
                                            </div>
                                            <div class="data">
                                                <div class="data-group">
                                                    <div class="amount">{{ $totalSubscriber }}</div>
                                                    <div class="nk-ecwg6-ck">
                                                        <canvas class="ecommerce-line-chart-s3" id="todayVisitors"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                    </div><!-- .nk-ecwg -->
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-xxl-7">
                                <div class="card card-full">
                                    <div class="nk-ecwg nk-ecwg8 h-100">
                                        <div class="card-inner">
                                            <div class="card-title-group mb-3">
                                                <div class="card-title">
                                                    <h6 class="title">{{ __('labels.user_registrations') }}</h6>
                                                </div>
                                            </div>
                                            <div class="row gx-2">
                                                <div class="col-md-3">
                                                    <div class="row gx-2 gy-0">
                                                        <div class="col-md-10">
                                                            <div class="form-group mb-0">
                                                                <select id="userRegistrationSelectBox" class="form-select"
                                                                data-placeholder="monthly">
                                                                    <option value="yearly">
                                                                        {{ __('labels.yearly') }}</option>
                                                                    <option value="monthly">
                                                                        {{ __('labels.monthly') }}</option>
                                                                    <option value="weekly">
                                                                        {{ __('labels.weekly') }}</option>
                                                                    <option value="custom">
                                                                        {{ __('labels.custom') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 d-none" id="graphLoader">
                                                            <div class="spinner-border" role="status">
                                                                <span class="visually-hidden">Loading...</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-9" id="dateRange" style="display:none;">
                                                    <div class="d-md-inline-flex">
                                                        <div class="dateRange d-sm-flex">
                                                            <div class="form-control-wrap mb-3 mb-sm-0">
                                                                <div class="form-icon form-icon-right">
                                                                    <label class="form-label mb-0 btn"
                                                                        for="start_date">
                                                                        <em class="icon ni ni-calendar"></em>
                                                                    </label>
                                                                </div>
                                                                <input type="text"
                                                                    class="form-control date-picker shadow-none"
                                                                    placeholder="From" data-date-format="yyyy-mm-dd"
                                                                    id="start_date" value="">
                                                            </div>
                                                            <div class="dateBetween align-self-center mx-1"></div>
                                                            <div class="form-control-wrap mb-3 mb-sm-0">
                                                                <div class="form-icon form-icon-right">
                                                                    <label class="form-label mb-0 btn"
                                                                        for="end_date">
                                                                        <em class="icon ni ni-calendar"></em>
                                                                    </label>
                                                                </div>
                                                                <input type="text"
                                                                    class="form-control date-picker shadow-none"
                                                                    placeholder="To" data-date-format="yyyy-mm-dd"
                                                                    id="end_date" value="">
                                                            </div>
                                                        </div>
                                                        <div class="btn_clumn ms-2 d-flex align-items-center">
                                                            <button type="button"
                                                                class="btn btn-primary d-inline-block me-2"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="" data-original-title="Search"
                                                                id="searchBtn"><em
                                                                    class="ni ni-search"></em></button>
                                                            <button type="reset"
                                                                class="btn btn-outline-light d-inline-block"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="" data-original-title="Reset"
                                                                id="resetBtn"><em
                                                                    class="ni ni-undo"></em></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nk-ecwg8-legends">
                                                <li>
                                                    <div class="title">
                                                        <span class="dot dot-lg sq" data-bg="#6576ff"></span>
                                                        <span>{{ __('labels.user_registrations') }}</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="nk-ecwg8-ck">
                                                <canvas class="ecommerce-line-chart-s4"
                                                    id="userRegistrationsChart"></canvas>
                                            </div>
                                            <div class="chart-label-group ps-5">
                                                <div class="chart-label" id="startLabel"></div>
                                                <div class="chart-label" id="endLabel"></div>
                                            </div>
                                        </div><!-- .card-inner -->
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-xxl-3 col-md-6">
                                <div class="card card-full overflow-hidden">
                                    <div class="nk-ecwg nk-ecwg7 h-100">
                                        <div class="card-inner flex-grow-1">
                                            <div class="card-title-group mb-4">
                                                <div class="card-title">
                                                    <h6 class="title">{{ __('labels.profile_statistics') }}</h6>
                                                </div>
                                            </div>
                                            <div class="nk-ecwg7-ck">
                                                <canvas class="ecommerce-doughnut-s1" id="orderStatistics"></canvas>
                                            </div>
                                            <ul class="nk-ecwg7-legends">
                                                <li>
                                                    <div class="title">
                                                        <span class="dot dot-lg sq" data-bg="#816bff"></span>
                                                        <span>{{ __('labels.profile_complete') }}</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">
                                                        <span class="dot dot-lg sq" data-bg="#ff82b7"></span>
                                                        <span>{{ __('labels.profile_incomplete') }}</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!-- .card-inner -->
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-xxl-2 col-md-6">
                                <div class="card h-100">
                                    <div class="card-inner">
                                        <div class="card-title-group mb-2">
                                            <div class="card-title">
                                                <h6 class="title">{{ __('labels.data_statistics') }}</h6>
                                            </div>
                                        </div>
                                        <ul class="nk-store-statistics">
                                            <li class="item">
                                                <div class="info">
                                                    <div class="title">{{ __('labels.total_transactions') }}</div>
                                                    <div class="count">
                                                        {{ number_format($totalTransactions) }}
                                                    </div>
                                                </div>
                                                <em class="icon bg-pink-dim ni ni-invest"></em>
                                            </li>
                                            <li class="item">
                                                <div class="info">
                                                    <div class="title">{{ __('labels.total_files') }}</div>
                                                    <div class="count">
                                                        {{ number_format($totalFiles) }}
                                                    </div>
                                                </div>
                                                <em class="icon bg-purple-dim ni ni-file-docs"></em>
                                            </li>
                                        </ul>
                                    </div><!-- .card-inner -->
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-xxl-12">
                                {{-- user latest 5 user here --}}
                                <div class="card ">
                                    <div class="card-inner-group">
                                        <div class="card-inner">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title"><span
                                                            class="me-2">{{ __('labels.recent_users') }}</span>
                                                    </h6>
                                                </div>
                                                <div class="card-tools">
                                                    <a href="{{ route('admin.users.index') }}"
                                                        class="link">{{ __('labels.view_all') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-inner">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="w_70 id">{{ __('labels.id') }}</th>
                                                            <th>{{ __('labels.name') }}</th>
                                                            <th>{{ __('labels.phone_number') }}</th>
                                                            <th>{{ __('labels.status') }}</th>
                                                            <th>{{ __('labels.date') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($latestUsers->isNotEmpty())
                                                            @foreach ($latestUsers as $key => $item)
                                                                <tr>
                                                                    <td> {{ $loop->index + 1 }} </td>
                                                                    <td>
                                                                        <div class="user-card">
                                                                            <div class="user-avatar bg-warning">
                                                                                <img src="{{ getProfileImageUrl($item->id) }}"
                                                                                    alt="user-img">
                                                                            </div>
                                                                            <div class="user-name">
                                                                                <span
                                                                                    class="tb-lead">{{ $item->name }}</span>
                                                                                <span
                                                                                    class="sub-text">{{ $item->email }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td> {{ $item->phone_number ? $item->phone_code . ' ' . $item->phone_number : '-' }}
                                                                    </td>
                                                                    <td>{{ ucfirst($item->status) }}</td>
                                                                    <td>{{ getConvertedDate($item->created_at) }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td class="text-center" colspan='5'>
                                                                    {{ __('message.no_record_found') }}</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .card -->

                            </div><!-- .col -->
                        </div>
                    </div>
                    <!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
@push('scripts')
    <script nonce="{{ csp_nonce('script') }}">
        let allUserPerDayArr = '{!!$allUserPerDayArr!!}';
        let subAdminPerDayArr = '{!!$subAdminPerDayArr!!}';
        let userPerDayArr = '{!!$userPerDayArr!!}';
        let subscriptionsPerDayArr = '{!!$subscriptionsPerDayArr!!}';
    </script>
    {!! returnScriptWithNonce('https://www.gstatic.com/charts/loader.js') !!}
    {!! returnScriptWithNonce(asset_path('assets/js/backend/dashboard/custom-charts.js')) !!}
@endpush
