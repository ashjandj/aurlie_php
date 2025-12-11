@extends('layouts.backend.app')
@section('title',__('labels.faq'))
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
                                    <li class="breadcrumb-item active">{{__('labels.faqs')}}</li>
                                </ul>
                            </nav>
                            <h3 class="nk-block-title page-title">{{__('labels.faqs')}}</h3>
                            <!-- breadcrumb @e -->
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="javascript:void(0);" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                @can('admin.faq.create')
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <button type="button" data-toggle="modal" data-target="#addFAQ"
                                                    class="btn btn-primary addEditFaq"
                                                    id="addFaqBtn">{{__('labels.add_faq')}}</button>
                                            </li>
                                        </ul>
                                    </div>
                                @endcan
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->

                <div class="nk-block nk-block-lg">
                    <div class="card card-preview {{getClassValue('cardBorder')}}">
                        <div class="card-inner ">
                            <div class="common-table">
                                <table class="datatable-init nowrap table" id="faq_table" aria-describedby="faq table">
                                    <thead>
                                        <tr>
                                            <th class="w_70 id">{{__('labels.sr_no')}}</th>
                                            <th class="question">{{__('labels.question')}}</th>
                                            <th class="answer">{{__('labels.answer')}}</th>
                                            <th class="status">{{__('labels.status')}}</th>
                                            @canany(['admin.faq.edit', 'admin.faq.destroy'])
                                                <th class="nosort nk-tb-col-tools actions">{{__('labels.action')}}</th>
                                            @endcanany
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="4">
                                                <div id="loaderTb"></div>
                                            </td>
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>

                                            @canany(['admin.faq.edit', 'admin.faq.destroy'])
                                                <td class="d-none"></td>
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

<!-- add faq modal @s-->
<div class="modal fade zoom" tabindex="-1" id="addFAQModal" data-bs-backdrop="static" data-bs-keyboard="false" >
</div>
<!-- add faq modal @e-->

<!-- edit faq modal @s-->
<x-empty-modal id="editFAQModal" title="{{__('labels.edit_faq')}}" bodyId="editFaqForm" />
<!-- edit faq modal @e-->

<!-- readMore modal @s-->
<x-read-more-modal id="read-more-modal" dataId="read-more-data" />
<!-- readMore modal @e-->

@endsection
@push('scripts')
{!! returnScriptWithNonce(asset_path('assets/js/backend/faq/index.js')) !!}
@endpush
