<li class="dropdown notification-dropdown">
    <a class="dropdown-toggle nk-quick-nav-icon notify" data-bs-toggle="dropdown">
        <div id="bellIcon" class="icon-status {{count($notification) > 0 ? 'icon-status-info': 'icon-status-off'}}">
            <em class="icon ni ni-bell"></em>
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
        <div class="dropdown-head">
            <span class="sub-title nk-dropdown-title">Notifications</span>
            <a href="{{route('admin.notifications.readAll')}}">{{count($notification) > 0 ? 'Mark All as Read': ''}}</a>
        </div>
        <div class="dropdown-body">
            <div class="nk-notification" id="notificationsList">
                @forelse($notification as $notifications)
                    <a href="{{notificationRoute($notifications->data['type'], $notifications->data['id'], $notifications->id)}}">
                        <div class="nk-notification-item dropdown-inner">
                            <div class="nk-notification-icon">
                                <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                            </div>
                            <div class="nk-notification-content">
                                <div class="nk-notification-text">{{$notifications->data['message']}}
                                </div>
                                <div class="nk-notification-time">{{$notifications->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="alert alert-danger alert-icon m-2">
                        <em class="icon ni ni-cross-circle"></em> <strong>No Notification Found</strong>!
                    </div>
                @endforelse
            </div><!-- .nk-notification -->
        </div><!-- .nk-dropdown-body -->
        <div class="dropdown-foot center">
            <a href="{{route('admin.notifications.index')}}">
                {{__('labels.view_all')}}
            </a>
        </div>
    </div>
</li>
