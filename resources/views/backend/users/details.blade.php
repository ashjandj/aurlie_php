@extends('layouts.backend.app')
@section('title', __('labels.user_details'))
@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <nav>
                                <ul class="breadcrumb breadcrumb-pipe">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.dashboard') }}">{{ __('labels.dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                                <a href="{{ route('admin.users.index') }}">{{ __('labels.user_list') }}</a>
                                            </li>
                                    <li class="breadcrumb-item active">{{ __('labels.user_details') }}</li>
                                </ul>
                            </nav>
                            <h3 class="nk-block-title page-title">{{ __('labels.user_details') }}</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <a href="{{route('admin.users.index')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>{{ __('labels.back') }}</span></a>
                            <a href="html/user-list-regular.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                    <li class="nav-item">
                                        <a class="nav-link {{ $activeTab == 'personal' ? 'active' : ''}}" href="#personal" data-bs-toggle="tab"><em class="icon ni ni-user-circle"></em><span>{{ __('labels.personal') }}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $activeTab == 'internal-notes' ? 'active' : ''}}" href="#internal-notes" data-bs-toggle="tab"><em class="icon ni ni-file-text"></em><span>Internal Notes</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $activeTab == 'manage-status' ? 'active' : ''}}" href="#manage-status" data-bs-toggle="tab"><em class="icon ni ni-setting"></em><span>Manage Status</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $activeTab == 'payment-history' ? 'active' : ''}}" href="#payment-history" data-bs-toggle="tab"><em class="icon ni ni-wallet"></em><span>Payment History</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $activeTab == 'compass-data' ? 'active' : ''}}" href="#compass-data" data-bs-toggle="tab"><em class="icon ni ni-compass"></em><span>Compass Data</span></a>
                                    </li>
                                    @if(false)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $activeTab == 'transaction' ? 'active' : ''}}" href="#transaction" data-bs-toggle="tab"><em class="icon ni ni-repeat"></em><span>{{ __('labels.transactions') }}</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ $activeTab == 'media' ? 'active' : ''}}" href="#media" data-bs-toggle="tab"><em class="icon ni ni-file-text"></em><span>{{ __('labels.media') }}</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ $activeTab == 'notifications' ? 'active' : ''}}" href="#notifications" data-bs-toggle="tab"><em class="icon ni ni ni-bell"></em><span>{{ __('labels.notifications') }}</span></a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link {{ $activeTab == 'activities' ? 'active' : ''}}" href="#activities" data-bs-toggle="tab"><em class="icon ni ni-activity"></em><span>{{ __('labels.activities') }}</span></a>
                                    </li>
                                    <li class="nav-item nav-item-trigger d-xxl-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
                                    </li>
                                </ul><!-- .nav-tabs -->
                                <div class="tab-content">
                                    <div class="tab-pane {{ $activeTab == 'personal' ? 'active' : ''}}" id="personal">
                                        <div class="card-inner">
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">{{ __('labels.personal_information') }}</h5>
                                                </div><!-- .nk-block-head -->
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">{{ __('labels.full_name') }}</span>
                                                            <span class="profile-ud-value">{{$user->name ? ucfirst($user->name) : 'NA'}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">{{ __('labels.mobile_number') }}</span>
                                                            <span class="profile-ud-value">{{$user->phone_number ? $user->phone_code . ' ' . $user->phone_number : 'NA'}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">{{ __('labels.email') }}</span>
                                                            <span class="profile-ud-value">{{$user->email ?? 'NA'}}</span>
                                                        </div>
                                                    </div>
                                                </div><!-- .profile-ud-list -->
                                            </div><!-- .nk-block -->
                                            <div class="nk-block">
                                                <div class="nk-block-head nk-block-head-line">
                                                    <h6 class="title overline-title text-base">{{ __('labels.additional_information') }}</h6>
                                                </div><!-- .nk-block-head -->
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">{{ __('labels.joining_date') }}</span>
                                                            <span class="profile-ud-value"> {{getConvertedDate($user->created_at) ?? 'NA'}} </span>
                                                        </div>
                                                    </div>
                                                    @if(false)
                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">{{ __('labels.country') }}</span>
                                                                <span class="profile-ud-value">{{$user->country->name ?? 'NA'}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">{{ __('labels.state') }}</span>
                                                                <span class="profile-ud-value">{{$user->state->name ?? 'NA'}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">{{ __('labels.city') }}</span>
                                                                <span class="profile-ud-value">{{$user->city->name ?? 'NA'}}</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">{{ __('labels.singup_type') }}</span>
                                                            <span class="profile-ud-value">{{$user->login_type == null ? __('labels.normal') : __('labels.social')}}</span>
                                                        </div>
                                                    </div>
                                                    @if(false)
                                                        <div class="profile-ud-item">
                                                            <div class="profile-ud wider">
                                                                <span class="profile-ud-label">{{ __('labels.profile_completed') }}</span>
                                                                <span class="profile-ud-value">{{$user->is_profile_completed == true ? __('labels.yes') : __('labels.no') }}</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Age</span>
                                                            <span class="profile-ud-value">{{$user->age ?? 'NA'}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">City & Country</span>
                                                            <span class="profile-ud-value">{{$user->city_country ?? 'NA'}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Education</span>
                                                            <span class="profile-ud-value">{{ucfirst(str_replace('-', ' ', $user->education ?? 'NA'))}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Institute/University</span>
                                                            <span class="profile-ud-value">{{$user->institute ?? 'NA'}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Hoping to Find</span>
                                                            <span class="profile-ud-value">
                                                                @if($user->hoping_to_find)
                                                                    @php
                                                                        $hopingToFind = is_string($user->hoping_to_find) ? json_decode($user->hoping_to_find, true) : $user->hoping_to_find;
                                                                    @endphp
                                                                    @if(is_array($hopingToFind))
                                                                        {{ implode(', ', array_map(function($item) { return ucfirst(str_replace('-', ' ', $item)); }, $hopingToFind)) }}
                                                                    @else
                                                                        NA
                                                                    @endif
                                                                @else
                                                                    NA
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Marital Status</span>
                                                            <span class="profile-ud-value">{{ucfirst(str_replace('-', ' ', $user->marital_status ?? 'NA'))}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Languages</span>
                                                            <span class="profile-ud-value">
                                                                @if($user->languages)
                                                                    @php
                                                                        $languages = is_string($user->languages) ? json_decode($user->languages, true) : $user->languages;
                                                                    @endphp
                                                                    @if(is_array($languages))
                                                                        {{ implode(', ', array_map(function($item) { return ucfirst(str_replace('-', ' ', $item)); }, $languages)) }}
                                                                    @else
                                                                        NA
                                                                    @endif
                                                                @else
                                                                    NA
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    @if($user->language_other)
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Language Other</span>
                                                            <span class="profile-ud-value">{{$user->language_other}}</span>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Gender</span>
                                                            <span class="profile-ud-value">
                                                                @if($user->gender)
                                                                    {{ucfirst(str_replace('-', ' ', $user->gender))}}
                                                                    @if($user->gender_self_describe)
                                                                        ({{$user->gender_self_describe}})
                                                                    @endif
                                                                @else
                                                                    NA
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Open to Match</span>
                                                            <span class="profile-ud-value">
                                                                @if($user->open_to_match)
                                                                    @php
                                                                        $openToMatch = is_string($user->open_to_match) ? json_decode($user->open_to_match, true) : $user->open_to_match;
                                                                    @endphp
                                                                    @if(is_array($openToMatch))
                                                                        {{ implode(', ', array_map(function($item) { return ucfirst(str_replace('-', ' ', $item)); }, $openToMatch)) }}
                                                                    @else
                                                                        NA
                                                                    @endif
                                                                @else
                                                                    NA
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Pronouns</span>
                                                            <span class="profile-ud-value">
                                                                @if($user->pronouns)
                                                                    {{ucfirst(str_replace('-', ' ', $user->pronouns))}}
                                                                    @if($user->pronouns_other)
                                                                        ({{$user->pronouns_other}})
                                                                    @endif
                                                                @else
                                                                    NA
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Currently Working</span>
                                                            <span class="profile-ud-value">{{$user->currently_working ? 'Yes' : 'No'}}</span>
                                                        </div>
                                                    </div>
                                                    @if($user->currently_working)
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Work Type</span>
                                                            <span class="profile-ud-value">
                                                                @if($user->work_type)
                                                                    {{ucfirst(str_replace('-', ' ', $user->work_type))}}
                                                                    @if($user->work_type_other)
                                                                        ({{$user->work_type_other}})
                                                                    @endif
                                                                @else
                                                                    NA
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Organisation</span>
                                                            <span class="profile-ud-value">{{$user->organisation ?? 'NA'}}</span>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if($user->accessibility_needs)
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Accessibility Needs</span>
                                                            <span class="profile-ud-value">{{$user->accessibility_needs}}</span>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Membership</span>
                                                            <span class="profile-ud-value">{{ucfirst($user->membership ?? 'NA')}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Safety Acknowledgment</span>
                                                            <span class="profile-ud-value">{{$user->safety_acknowledgment ? 'Yes' : 'No'}}</span>
                                                        </div>
                                                    </div>
                                                </div><!-- .profile-ud-list -->
                                            </div><!-- .nk-block -->
                                            <div class="nk-divider divider md"></div>
                                        </div><!-- .card-inner -->
                                    </div>
                                    <div class="tab-pane {{ $activeTab == 'internal-notes' ? 'active' : ''}}" id="internal-notes">
                                        <div class="card-inner">
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Internal Notes</h5>
                                                </div><!-- .nk-block-head -->
                                                
                                                <!-- Add New Note Form -->
                                                <div class="card card-bordered mb-4">
                                                    <div class="card-inner">
                                                        <h6 class="title mb-3">Add New Note</h6>
                                                        <form id="addInternalNoteForm" action="{{ route('admin.users.store-internal-note', $user->id) }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label class="form-label">Note <span class="text-danger">*</span></label>
                                                                <textarea name="note" id="note" class="form-control" rows="5" placeholder="Enter internal note about this user..." required></textarea>
                                                                <div class="form-note">These notes are only visible to administrators.</div>
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <button type="submit" class="btn btn-primary" id="addInternalNoteBtn">
                                                                    <em class="icon ni ni-plus"></em>
                                                                    <span>Add Note</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <!-- Notes List -->
                                                <div class="nk-block">
                                                    <div class="nk-block-head">
                                                        <h6 class="title">Notes History</h6>
                                                    </div>
                                                    <div id="internalNotesList">
                                                        @forelse($internalNotes as $note)
                                                            <div class="card card-bordered mb-3 note-item" data-note-id="{{ $note->id }}">
                                                                <div class="card-inner">
                                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                                        <div>
                                                                            <div class="text-muted small">
                                                                                <em class="icon ni ni-user"></em>
                                                                                <span>{{ $note->creator ? $note->creator->name : 'System' }}</span>
                                                                                <span class="mx-2">•</span>
                                                                                <em class="icon ni ni-calendar"></em>
                                                                                <span>{{ getConvertedDate($note->created_at) }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <button type="button" class="btn btn-sm btn-outline-danger deleteNoteBtn" data-note-id="{{ $note->id }}">
                                                                            <em class="icon ni ni-trash"></em>
                                                                        </button>
                                                                    </div>
                                                                    <div class="note-content">
                                                                        <p class="mb-0">{{ nl2br(e($note->note)) }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <div class="alert alert-light">
                                                                <em class="icon ni ni-info"></em>
                                                                <span>No internal notes yet. Add your first note above.</span>
                                                            </div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div><!-- .nk-block -->
                                            <div class="nk-divider divider md"></div>
                                        </div><!-- .card-inner -->
                                    </div>
                                    <div class="tab-pane {{ $activeTab == 'manage-status' ? 'active' : ''}}" id="manage-status">
                                        <div class="card-inner">
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Manage User Status</h5>
                                                </div><!-- .nk-block-head -->
                                                <form id="updateStatusForm" action="{{ route('admin.users.update-status', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label class="form-label" for="application_status">Application Status <span class="text-danger">*</span></label>
                                                        <select name="application_status" id="application_status" class="form-select" required>
                                                            <option value="">Select Status</option>
                                                            <option value="applied" {{ $user->application_status == 'applied' ? 'selected' : '' }}>Applied</option>
                                                            <option value="shortlisted" {{ $user->application_status == 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                                                            <option value="interviewed" {{ $user->application_status == 'interviewed' ? 'selected' : '' }}>Interviewed</option>
                                                            <option value="accepted" {{ $user->application_status == 'accepted' ? 'selected' : '' }}>Approved</option>
                                                            <option value="rejected" {{ $user->application_status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                            <option value="paused" {{ $user->application_status == 'paused' ? 'selected' : '' }}>Paused</option>
                                                        </select>
                                                        <div class="form-note">When you select "Approved", an email will be sent to the user with membership details and payment link.</div>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <button type="submit" class="btn btn-primary" id="updateStatusBtn">
                                                            <em class="icon ni ni-save"></em>
                                                            <span>Update Status</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div><!-- .nk-block -->
                                        </div><!-- .card-inner -->
                                    </div>
                                    <div class="tab-pane {{ $activeTab == 'payment-history' ? 'active' : ''}}" id="payment-history">
                                        <div class="card-inner">
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Payment History</h5>
                                                </div><!-- .nk-block-head -->
                                                <div class="nk-block">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Amount</th>
                                                                    <th>Date</th>
                                                                    <th>Method</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse($transactions as $transaction)
                                                                    <tr>
                                                                        <td>{{ formatCurrency($transaction->amount) }}</td>
                                                                        <td>{{ getConvertedDate($transaction->created_at) }}</td>
                                                                        <td>Card</td>
                                                                        <td>
                                                                            <span class="badge badge-{{ $transaction->status == 'paid' ? 'success' : 'danger' }}">
                                                                                {{ ucfirst($transaction->status) }}
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="4" class="text-center">
                                                                            <p class="text-muted">No payment history found.</p>
                                                                        </td>
                                                                    </tr>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><!-- .nk-block -->
                                            </div><!-- .nk-block -->
                                        </div><!-- .card-inner -->
                                    </div>
                                    <div class="tab-pane {{ $activeTab == 'compass-data' ? 'active' : ''}}" id="compass-data">
                                        <div class="card-inner">
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Compass Data</h5>
                                                </div><!-- .nk-block-head -->
                                                <div class="nk-block">
                                                    <div class="text-center py-5">
                                                        <h4 class="text-muted">Coming Soon</h4>
                                                        <p class="text-muted">Compass data will be displayed here.</p>
                                                    </div>
                                                </div><!-- .nk-block -->
                                            </div><!-- .nk-block -->
                                        </div><!-- .card-inner -->
                                    </div>
                                    @if(false)
                                        <div class="tab-pane {{ $activeTab == 'transaction' ? 'active' : ''}}" id="transaction">
                                            <div class="card-inner">
                                                <div class="nk-block">
                                                    <div class="nk-block-head">
                                                        <h5 class="title">{{ __('labels.transactions') }}</h5>
                                                    </div><!-- .nk-block-head -->
                                                    <div class="common-table">
                                                        <table class="datatable-init nowrap table" id="transaction_table" aria-describedby="transaction table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="w_70 id">{{__('labels.sr_no')}}</th>
                                                                    <th class="plan_name">{{__('labels.plan_name')}}</th>
                                                                    <th class="interval">{{__('labels.interval')}}</th>
                                                                    <th class="amount">{{__('labels.amount')}}</th>
                                                                    <th class="status">{{__('labels.status')}}</th>
                                                                    <th class="date">{{__('labels.date')}}</th>
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
                                                                    <td class="d-none"></td>
                                                                    <td class="d-none"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><!-- .nk-block -->
                                                <div class="nk-divider divider md"></div>
                                            </div><!-- .card-inner -->
                                        </div>
                                        <div class="tab-pane {{ $activeTab == 'media' ? 'active' : ''}}" id="media">
                                            <div class="card-inner">
                                                <div class="nk-block">
                                                    <div class="nk-block-head">
                                                        <h5 class="title">{{ __('labels.user_media') }}</h5>
                                                    </div><!-- .nk-block-head -->
                                                    <div id="select-items">
                                                        <div id="image-card-container" class="modal-img-container mx-3 media-manager-child-card gap-4">
                                                            @forelse ($medias as $media)
                                                            <div class="image-card" id="image-card-{{$media->id}}">
                                                                <div class="border border-1 image-card-box-shadow rounded modal-img-des">
                                                                    <div class="d-flex image-cards-design justify-content-center m-2 align-items-center">
                                                                        <div>
                                                                            <a href="#"><img id="selectedFile-{{$media->id}}" class="fileSelected" data-id="{{$media->id}}" data-path-url="{{Storage::url($media->path)}}" data-path="{{$media->path}}" src="{{ pathinfo($media->path, PATHINFO_EXTENSION) == 'pdf' || pathinfo($media->path, PATHINFO_EXTENSION) == 'docx' ? asset('assets/images/backend/default-doc.jpg') :  $media->media_url}}" alt="alt"></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <p class="image-name m-0 font-weight-bold">{{$media->path ? nameConversion($media->path) : '' }}</p>

                                                                        @php
                                                                        $downloadRoute = getLoggedInUserDetail() && getLoggedInUserDetail()->user_type == 'admin'
                                                                        ? route('admin.media.download', customEncrypt($media->id))
                                                                        : route('media.download', customEncrypt($media->id));
                                                                        @endphp
                                                                        @if ((!isTypeUser() && auth()->user()->hasPermissionTo('admin.media.download')) || isTypeUser())
                                                                        <span class="downloadBtn {{ in_array(pathinfo($media->path, PATHINFO_EXTENSION), ['pdf', 'docx']) || Storage::disk('local')->exists($media->path) ? '' : 'd-none' }}">
                                                                            <a href="{{ $downloadRoute }}"><em class="icon ni ni-download"></em></a>
                                                                        </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @empty
                                                            <p>{{__('message.error.no_file_found')}}</p>
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block -->
                                            </div><!-- .card-inner -->
                                        </div>
                                        <div class="tab-pane {{ $activeTab == 'notifications' ? 'active' : ''}}" id="notifications">
                                            <div class="card-inner">
                                                <div class="nk-block">
                                                    <div class="nk-block-head">
                                                        <h5 class="title">{{ __('labels.notifications') }}</h5>
                                                    </div><!-- .nk-block-head -->
                                                    <div class="common-table">
                                                        <table class="datatable-init nowrap table" id="notification-table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="nosort nk-tb-col-tools w_70 id">{{__('labels.serial_no')}}</th>
                                                                    <th class="message">{{__('labels.notification')}}</th>
                                                                    <th class="datetime">{{__('labels.date_time')}}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="9">
                                                                        <div id="loaderTb"></div>
                                                                    </td>
                                                                    <td class="d-none"></td>
                                                                    <td class="d-none"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><!-- .nk-block -->
                                                <div class="nk-divider divider md"></div>
                                            </div><!-- .card-inner -->
                                        </div>
                                    @endif
                                    <div class="tab-pane {{ $activeTab == 'activities' ? 'active' : ''}}" id="activities">
                                        <div class="card-inner">
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">{{ __('labels.activities') }}</h5>
                                                </div><!-- .nk-block-head -->
                                                <div class="common-table">
                                                    <table class="datatable-init nowrap table" id="activity_table" aria-describedby="activity table">
                                                        <thead>
                                                            <tr>
                                                                <th class="w_70 id">{{__('labels.sr_no')}}</th>
                                                                <th class="log_name">{{__('labels.log_name')}}</th>
                                                                <th class="event">{{__('labels.event')}}</th>
                                                                <th class="causer">{{__('labels.causer')}}</th>
                                                                <th class="description">{{__('labels.description')}}</th>
                                                                <th class="date">{{__('labels.date')}}</th>
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
                                                                <td class="d-none"></td>
                                                                <td class="d-none"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- .nk-block -->
                                            <div class="nk-divider divider md"></div>
                                        </div><!-- .card-inner -->
                                    </div>
                                </div>
                            </div><!-- .card-content -->
                            <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl" data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true" data-toggle-body="true">
                                <div class="card-inner-group" data-simplebar>
                                    <div class="card-inner">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg bg-light">
                                                <img src="{{ getProfileImageUrl($user->id) }}" alt="user-img">
                                            </div>
                                            <div class="user-info">
                                                <div class="badge bg-outline-light rounded-pill ucap">
                                                    {{$user->user_type ? ucfirst($user->user_type) : 'NA'}}
                                                </div>
                                                <h5>{{$user->name ? ucfirst($user->name) : 'NA'}}</h5>
                                                <span class="sub-text">{{$user->email ?? 'NA'}}</span>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->
                                    <div class="card-inner card-inner-sm">
                                        <ul class="btn-toolbar justify-center gx-1">
                                            <li><a href="#" class="btn btn-trigger btn-icon"><em class="{{$user->login_security ? 'icon ni ni-shield-check text-success' : 'icon ni ni-shield-off text-danger'}}" title="{{$user->login_security ? __('labels.googleTwoFactor.password_protection_enabled') : __('labels.googleTwoFactor.password_protection_disabled')}}"></em></a></li>
                                        </ul>
                                    </div><!-- .card-inner -->
                                    <div class="card-inner">
                                        <h6 class="overline-title-alt mb-2">{{ __('labels.additional') }}</h6>
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <span class="sub-text">{{ __('labels.last_login') }}</span>
                                                <span>{{$user->userLoginActivity ? getConvertedDate($user->userLoginActivity['created_at']) : 'NA'}}</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="sub-text">{{ __('labels.status') }}</span>
                                                <span class="lead-text {{$user->status == 'active' ? 'text-success' : 'text-danger'}}">{{$user->status ? ucfirst($user->status) : 'NA'}}</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="sub-text">{{ __('labels.register_at') }}</span>
                                                <span>{{getConvertedDate($user->created_at) ?? 'NA'}}</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="sub-text">{{ __('labels.active_subscription') }}</span>
                                                <span>{{ $subscription ? $subscription['plan_name'] : 'NA'}}</span>
                                            </div>
                                            @if ($subscription)
                                            <div class="col-6">
                                                <span class="sub-text">{{ __('labels.subscription_expired_at') }}</span>
                                                <span>{{ getConvertedDate($subscription['current_period_end']) ?? 'NA'}}</span>
                                            </div>
                                                @if ($schedulePlan && $schedulePlan['status'] == 'not_started')
                                                <div class="col-6">
                                                    <span class="sub-text">{{ __('labels.upgraded_plan') }}</span>
                                                    <span>{{ $schedulePlan['data'][0]?->plan?->name ?? 'NA'}} - {{$schedulePlan['data'][0]?->name ?? 'NA'}}</span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="sub-text">{{ __('labels.upgraded_plan_start_at') }}</span>
                                                    <span>{{ getConvertedDate($schedulePlan->phases[0]?->start_date) ?? 'NA'}}</span>
                                                </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div><!-- .card-inner -->
                                </div><!-- .card-inner -->
                            </div><!-- .card-aside -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
<!-- readMore modal @s-->
<x-read-more-modal id="read-more-modal" dataId="read-more-activity" />
<!-- readMore modal @e-->
@endsection
@push('scripts')
<script nonce="{{csp_nonce()}}">
    let userId = "{{$user->id}}";
    let customerId = "{{$user->stripe_customer_id}}";
</script>
{!! returnScriptWithNonce(asset_path('assets/js/backend/users/details.js')) !!}
@endpush