
@extends('layouts.frontend.app')
@section('title', __('labels.home'))
@section('content')
<!-- tech solution section  -->
<div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-5">Search Data</h1>
    <div class="contact card">
        <div class="card-body p-2">
            <form>
                <div class="row">
                    <div class="col-md-12" id="dateRange">
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
        </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    {!! returnScriptWithNonce(asset_path('assets/js/frontend/search/index.js')) !!}
@endpush
