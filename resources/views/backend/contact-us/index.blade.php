@extends('layouts.backend.app')
@section('title',__('labels.contact_us'))
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
                                    <li class="breadcrumb-item active">{{__('labels.contact_us')}}</li>
                                </ul>
                            </nav>
                            <h3 class="nk-block-title page-title">{{__('labels.contact_us')}}</h3>
                            <!-- breadcrumb @e -->
                        </div><!-- .nk-block-head-content -->

                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->

                <div class="nk-block nk-block-lg">
                    <div class="card card-preview {{getClassValue('cardBorder')}}">
                        <div class="card-inner ">
                            <div class="common-table">
                                <table class="datatable-init nowrap table" id="contact_us_table" aria-describedby="contactUs table">
                                    <thead>
                                        <tr>
                                            <th class="w_70 id">{{__('labels.sr_no')}}</th>
                                            <th class="name">{{__('labels.name')}}</th>
                                            <th class="message">{{__('labels.message')}}</th>
                                            <th class="date">{{__('labels.date')}}</th>
                                            <th class="status">{{__('labels.status')}}</th>
                                            @can('admin.contactUs.sendReplyMessage')
                                                <th class="reply">{{__('labels.reply')}}</th>
                                            @endcan
                                            @can('admin.contactUs.destroy')
                                                <th class="nosort nk-tb-col-tools actions">{{__('labels.action')}}</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>
                                            <td class="">
                                                <div id="loaderTb"></div>
                                            </td>
                                            <td class="d-none"></td>
                                            @can('admin.contactUs.sendReplyMessage')
                                                <td class="d-none"></td>
                                            @endcan
                                            @can('admin.contactUs.destroy')
                                                <td class="d-none"></td>
                                            @endcan
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
<!-- readMore modal @s-->
<x-read-more-modal id="read-more-modal" dataId="read-more-data" />
<!-- readMore modal @e-->

<!-- send Reply modal @s-->
<div class="modal fade" tabindex="-1" id="replyMessageModal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content bg-white">
            <a class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">{{__('labels.reply')}}</h5>
            </div>
            <form method="POST" action="{{ route('admin.contactUs.sendReplyMessage') }}" id="reply-message-form" onsubmit="return false;">
                <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id" value="" />
                    <label for="messagess">{{__('labels.message')}}</label>
                    <div class="form-control-wrap">
                        <textarea class="form-control control" name="message" id="message" cols="30" rows="5" placeholder="{{__('labels.enter_reply_message')}}"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="sendReplyBtn">{{__('labels.send')}}</button>
                    <button type="button" class="btn btn-light custom-close" id="cancelReplyBtn" data-dismiss="modal">{{__('labels.cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- sendReply modal @e-->
@endsection
@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Backend\SendReplyRequest','#reply-message-form') !!}
{!! returnScriptWithNonce(asset_path('assets/js/backend/contact-us/index.js')) !!}
@endpush