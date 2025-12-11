@extends('layouts.backend.app')
@section('title', 'Match & Recommend')
@section('content')
<!-- content @s -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Match & Recommend</h3>
                            <p class="text-soft">Select a user and find compatible matches to recommend</p>
                        </div><!-- .nk-block-head-content -->
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-3">
                        <!-- User Selection & Filters -->
                        <div class="col-12 col-lg-4">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="nk-block">
                                        <div class="nk-block-head">
                                            <h5 class="title">Select User</h5>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">User</label>
                                            <select name="user_id" id="userSelect" class="form-select">
                                                <option value="">Select a user...</option>
                                                @foreach($allUsers as $u)
                                                    <option value="{{ $u->id }}" {{ $selectedUserId == $u->id ? 'selected' : '' }}>
                                                        {{ $u->name }} ({{ $u->email }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if($selectedUser)
                                    <div class="nk-divider divider md"></div>
                                    <div class="nk-block">
                                        <div class="nk-block-head">
                                            <h6 class="title">Filters</h6>
                                        </div>
                                        <form id="filterForm">
                                            <div class="form-group">
                                                <label class="form-label">City</label>
                                                <input type="text" name="city" class="form-control" placeholder="Filter by city" value="{{ request('city') }}">
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Min Age</label>
                                                        <input type="number" name="min_age" class="form-control" placeholder="Min" value="{{ request('min_age') }}">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Max Age</label>
                                                        <input type="number" name="max_age" class="form-control" placeholder="Max" value="{{ request('max_age') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Membership Type</label>
                                                <select name="membership" class="form-select">
                                                    <option value="">All</option>
                                                    <option value="basic" {{ request('membership') == 'basic' ? 'selected' : '' }}>Basic</option>
                                                    <option value="premium" {{ request('membership') == 'premium' ? 'selected' : '' }}>Premium</option>
                                                    <option value="vip" {{ request('membership') == 'vip' ? 'selected' : '' }}>VIP</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Hoping to Find</label>
                                                <select name="hoping_to_find" class="form-select">
                                                    <option value="">All</option>
                                                    <option value="friendship" {{ request('hoping_to_find') == 'friendship' ? 'selected' : '' }}>Friendship</option>
                                                    <option value="dating" {{ request('hoping_to_find') == 'dating' ? 'selected' : '' }}>Dating</option>
                                                    <option value="relationship" {{ request('hoping_to_find') == 'relationship' ? 'selected' : '' }}>Relationship</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <em class="icon ni ni-filter"></em>
                                                    <span>Apply Filters</span>
                                                </button>
                                                <a href="{{ route('admin.matching.index', ['user_id' => $selectedUserId]) }}" class="btn btn-outline-secondary">
                                                    <em class="icon ni ni-reload"></em>
                                                    <span>Reset</span>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Matched Users List -->
                        <div class="col-12 col-lg-8">
                            <div class="card">
                                <div class="card-inner">
                                    @if($selectedUser)
                                        <div class="nk-block">
                                            <div class="nk-block-head">
                                                <h5 class="title">Recommended Matches for {{ $selectedUser->name }}</h5>
                                                <p class="text-muted">Select 2-5 profiles to recommend</p>
                                            </div>
                                            <form id="recommendationForm">
                                                <input type="hidden" name="user_id" value="{{ $selectedUser->id }}">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th width="50">
                                                                    <input type="checkbox" id="selectAll" class="form-check-input">
                                                                </th>
                                                                <th>Name</th>
                                                                <th>Age</th>
                                                                <th>City</th>
                                                                <th>Membership</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($matchedUsers as $matchedUser)
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox" name="recommended_user_ids[]" value="{{ $matchedUser->id }}" class="form-check-input user-checkbox" data-max="5">
                                                                    </td>
                                                                    <td>
                                                                        <strong>{{ $matchedUser->name }}</strong>
                                                                    </td>
                                                                    <td>{{ $matchedUser->age ?? 'N/A' }}</td>
                                                                    <td>{{ $matchedUser->city_country ?? 'N/A' }}</td>
                                                                    <td>
                                                                        <span class="badge badge-soft">{{ ucfirst($matchedUser->membership ?? 'N/A') }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('admin.users.show', $matchedUser->id) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                                                            <em class="icon ni ni-eye"></em>
                                                                            <span>View</span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="6" class="text-center py-4">
                                                                        <p class="text-muted">No matches found. Try adjusting your filters.</p>
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @if($matchedUsers->count() > 0)
                                                <div class="nk-divider divider md"></div>
                                                <div class="nk-block">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <span id="selectedCount" class="text-muted">0 selected</span>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary" id="sendRecommendationsBtn" disabled>
                                                            <em class="icon ni ni-send"></em>
                                                            <span>Send Recommendations</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                @endif
                                            </form>
                                        </div>
                                    @else
                                        <div class="nk-block">
                                            <div class="text-center py-5">
                                                <em class="icon ni ni-users" style="font-size: 48px; color: #ddd;"></em>
                                                <p class="text-muted mt-3">Please select a user to find matches</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
@endsection

@push('scripts')
{!! returnScriptWithNonce(asset_path('assets/js/backend/matching/index.js')) !!}
@endpush

