@extends('layouts.frontend.app')
@section('title', __('labels.faq'))
@section('content')
    <!-- tech solution section  -->
    <div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">{{ __('labels.faqs') }}</h1>
        <div class="content card">
            @foreach ($faq as $data)
                <div class="mt-4">
                    <div class="question-container">
                        <a class="question " data-bs-toggle="collapse" href="#collapse{{ $data->id }}" role="button"
                            aria-expanded="{{ $loop->index == 0 ? 'true' : 'false' }}" aria-controls="collapseExample">
                            {{ $data->question }}
                        </a>
                    </div>
                    <div class="collapse answer-div {{ $loop->index == 0 ? 'show' : '' }}" id="collapse{{ $data->id }}">
                        <div class="card card-body">
                            {!! $data->answer !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('scripts')
    {!! returnScriptWithNonce(asset_path('assets/js/frontend/faq/index.js')) !!}
@endpush
