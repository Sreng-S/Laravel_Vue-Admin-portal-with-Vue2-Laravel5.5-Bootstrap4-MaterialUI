<!-- NavBar For Authenticated Users -->
<spark-navbar
    :user="user"
    :teams="teams"
    :current-team="currentTeam"
    :has-unread-notifications="hasUnreadNotifications"
    :has-unread-announcements="hasUnreadAnnouncements"
    inline-template>
    <div class="topbar">
        <div class="topbar-left">
            <div class="text-center">
                <a href="/" class="logo"><i class="icon-magnet icon-c-logo"></i><span>PI<i class="md md-album"></i>TEAM</span></a>
            </div>
        </div>
        <nav class="navbar-custom" v-if="user">
            <ul class="list-inline float-right mb-0">
                <li class="list-inline-item dropdown notification-list">
                    <a @click="showNotifications" class="has-activity-indicator">
                        <div class="navbar-icon">
                            <i class="activity-indicator" v-if="hasUnreadNotifications || hasUnreadAnnouncements"></i>
                            <i class="dripicons-bell noti-icon"></i>
                            <span class="badge badge-pink noti-icon-badge">4</span>
                            {{--<i class="icon-bell"></i>--}}
                            {{--<span class="bubble"></span>--}}
                        </div>
                    </a>
                </li>
                <li class="list-inline-item notification-list hidden-xs-down">
                    <a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">
                        <i class="dripicons-expand noti-icon"></i>
                    </a>
                </li>
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link profile-dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        <img src="/assets/images/users/avatar-0.jpg" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu profile-dropdown " aria-labelledby="Preview">
                        <ul class="pl-1" role="menu">
                            <!-- Impersonation -->
                            @if (session('spark:impersonator'))
                                <li class="dropdown-header">Impersonation</li>
                                <!-- Stop Impersonating -->
                                <li class="pl-2">
                                    <a href="/spark/kiosk/users/stop-impersonating">
                                        <i class="fa fa-fw fa-btn fa-user-secret"></i>Back To My Account
                                    </a>
                                </li>
                                <li class="divider"></li>
                            @endif
                            <!-- Developer -->
                            @if (Spark::developer(Auth::user()->email))
                                @include('spark::nav.developer')
                            @endif
                            <!-- Subscription Reminders -->
                            @include('spark::nav.subscriptions')
                            <!-- Settings -->
                            <li class="dropdown-header">Settings</li>
                            <!-- Your Settings -->
                            <li class="pl-2">
                                <a href="/settings">
                                    <i class="fa fa-fw fa-btn fa-cog"></i>Your Settings
                                </a>
                            </li>
                            <li class="divider"></li>
                            @if (Spark::usesTeams() && (Spark::createsAdditionalTeams() || Spark::showsTeamSwitcher()))
                                <!-- Team Settings -->
                                @include('spark::nav.teams')
                            @endif
                            @if (Spark::hasSupportAddress())
                                <!-- Support -->
                                @include('spark::nav.support')
                            @endif
                            <!-- Logout -->
                            <li class="pl-2">
                                <a href="/logout">
                                    <i class="fa fa-fw fa-btn fa-sign-out"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-light waves-effect">
                        <i class="dripicons-menu"></i>
                    </button>
                </li>
            </ul>
        </nav>
    </div>
</spark-navbar>
