@if (Auth::user()->onTrial())
    <!-- Trial Reminder -->
    <li class="dropdown-header">Trial</li>

    <li class="pl-2">
        <a href="/settings#/subscription">
            <i class="fa fa-fw fa-btn fa-shopping-bag"></i>Subscribe
        </a>
    </li>

    <li class="divider"></li>
@endif

@if (Spark::usesTeams() && Auth::user()->currentTeamOnTrial())
    <!-- Team Trial Reminder -->
    <li class="dropdown-header">{{ ucfirst(Spark::teamString()) }} Trial</li>

    <li class="pl-2">
        <a href="/settings/{{ str_plural(Spark::teamString()) }}/{{ Auth::user()->currentTeam()->id }}#/subscription">
            <i class="fa fa-fw fa-btn fa-shopping-bag"></i>Subscribe
        </a>
    </li>

    <li class="divider"></li>
@endif
