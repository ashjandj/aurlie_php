@extends('layouts.frontend.app')
@section('title', __('labels.home'))
@section('content')
    <!-- tech solution section  -->
    <div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-5">Search Result</h1>
        <div class="contact card">
            <div class="card-body p-2">
                <div class="common-table">
                    <table class="datatable-init nowrap table" id="faq_table" aria-describedby="faq table">
                        <thead>
                            <tr>
                                <th class="w_70 id">{{__('labels.sr_no')}}</th>
                                <th class="batchNo">Batch No</th>
                                <th class="faqId">FAQ ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($searchRecords->isNotEmpty())
                                @foreach ($searchRecords as $record)
                                    <tr>
                                        <td>{{ $record->id }}</td>
                                        <td>{{ $record->batchNo }}</td>
                                        <td>{{ $record->faqId }}</td>
                                    </tr>  
                                @endforeach
                            @else 
                                <tr>
                                    <td colspan="3">Please wait while we are fetching data.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {!! returnScriptWithNonce(asset_path('assets/js/frontend/search/index.js')) !!}
@endpush
