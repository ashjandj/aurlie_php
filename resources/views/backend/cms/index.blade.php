@extends('layouts.backend.app')
@php
    $pageTitle = $cms->page_title;
@endphp
@section('title', $pageTitle)
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <!-- breadcrumb @s -->
                            <nav>
                                <ul class="breadcrumb breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('labels.dashboard')}}</a></li>
                                    <li class="breadcrumb-item active">{{$pageTitle}}</li>
                                </ul>
                            </nav>
                            <!-- breadcrumb @e -->
                            <h3 class="nk-block-title page-title">{{$pageTitle}}</h3>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div>
                <div class="card">
                    <div class="card-inner">
                        <div class="edit-cms__wrapper">
                            <form action="{{ route('admin.cms.edit', customEncrypt($cms->id)) }}" method="post" id="editCmsForm">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label">{{__('labels.cms_title')}}</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" name="page_title" class="form-control" value="{{$pageTitle}}" placeholder="{{__('labels.enter_title')}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label">{{__('labels.meta_title')}}</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" name="meta_title" class="form-control" placeholder="{{__('labels.enter_meta_title')}}" value="{{$cms->meta_title}}">
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label">{{__('labels.meta_keyword')}}</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" name="meta_keywords" class="form-control" placeholder="{{__('labels.enter_meta_keyword')}}" value="{{$cms->meta_keywords}}">
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label">{{__('labels.meta_desc')}}</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <textarea name="meta_description" id="meta_description" class="form-control" placeholder="{{__('labels.enter_meta_description')}}">{{$cms->meta_description}}</textarea>
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label">{{__('labels.cms_desc')}}</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <textarea name="page_content" class="form-control description" placeholder="{{__('labels.enter_description')}}" aria-describedby="description-error">{{$cms->page_content}}</textarea>
                                            <span id="description-error" class="help-block error-help-block"></span>
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <button type="button" id="submitCmsBtn" class="btn btn-primary width-120 ripple-effect">{{__('labels.update')}}</button>
                                    </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Backend\CmsRequest','#editCmsForm')->ignore("input:hidden:not(input:hidden.required), [contenteditable='true']") !!}
{!! returnScriptWithNonce(asset_path('assets/js/backend/cms/index.js')) !!}
@endpush