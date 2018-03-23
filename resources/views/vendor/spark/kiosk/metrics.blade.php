<spark-kiosk-metrics :user="user" inline-template>
    <!-- The Landsman™ -->
    <div>
        <div class="row">
            <!-- Monthly Recurring Revenue -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-center">Monthly Recurring Revenue</div>

                    <div class="card-block text-center">
                        <div style="font-size: 24px;">
                            @{{ monthlyRecurringRevenue | currency }}
                        </div>

                        <!-- Compared To Last Month -->
                        <div v-if="monthlyChangeInMonthlyRecurringRevenue" style="font-size: 12px;">
                            @{{ monthlyChangeInMonthlyRecurringRevenue }}% From Last Month
                        </div>

                        <!-- Compared To Last Year -->
                        <div v-if="yearlyChangeInMonthlyRecurringRevenue" style="font-size: 12px;">
                            @{{ yearlyChangeInMonthlyRecurringRevenue }}% From Last Year
                        </div>
                    </div>
                </div>
            </div>

            <!-- Yearly Recurring Revenue -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-center">Yearly Recurring Revenue</div>

                    <div class="card-block text-center">
                        <div style="font-size: 24px;">
                            @{{ yearlyRecurringRevenue | currency }}
                        </div>

                        <!-- Compared To Last Month -->
                        <div v-if="monthlyChangeInYearlyRecurringRevenue" style="font-size: 12px;">
                            @{{ monthlyChangeInYearlyRecurringRevenue }}% From Last Month
                        </div>

                        <!-- Compared To Last Year -->
                        <div v-if="yearlyChangeInYearlyRecurringRevenue" style="font-size: 12px;">
                            @{{ yearlyChangeInYearlyRecurringRevenue }}% From Last Year
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Total Volume -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-center">Total Volume</div>

                    <div class="card-block text-center">
                        <span style="font-size: 24px;">
                            @{{ totalVolume | currency }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Total Trials -->
            <div class="col-md-6">
                <div class="card">
                    @if(Spark::teamTrialDays())
                        <div class="card-header bg-info text-center">Teams Currently Trialing</div>
                    @else
                        <div class="card-header bg-info text-center">Users Currently Trialing</div>
                    @endif

                    <div class="card-block text-center">
                        <span style="font-size: 24px;">
                            @{{ totalTrialUsers }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Recurring Revenue Chart -->
        <div class="row" v-show="indicators.length > 0">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Monthly Recurring Revenue</div>

                    <div class="card-block">
                        <canvas id="monthlyRecurringRevenueChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Yearly Recurring Revenue Chart -->
        <div class="row" v-show="indicators.length > 0">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Yearly Recurring Revenue</div>

                    <div class="card-block">
                        <canvas id="yearlyRecurringRevenueChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-show="indicators.length > 0">
            <!-- Daily Volume Chart -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Daily Volume</div>

                    <div class="card-block">
                        <canvas id="dailyVolumeChart" height="100"></canvas>
                    </div>
                </div>
            </div>

            <!-- Daily New Users Chart -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">New Users</div>

                    <div class="card-block">
                        <canvas id="newUsersChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscribers Per Plan -->
        <div class="row" v-if="plans.length > 0">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Subscribers</div>

                    <div class="card-block">
                        <table class="table table-borderless m-b-none">
                            <thead>
                                <th>Name</th>
                                <th>Subscribers</th>
                                <th>Trialing</th>
                            </thead>

                            <tbody>
                                <tr v-if="genericTrialUsers">
                                    <td>
                                        <div class="btn-table-align">
                                            On Generic Trial
                                        </div>
                                    </td>

                                    <td>
                                        <div class="btn-table-align">
                                            N/A
                                        </div>
                                    </td>

                                    <td>
                                        <div class="btn-table-align">
                                            @{{ genericTrialUsers }}
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="plan in plans">
                                    <!-- Plan Name -->
                                    <td>
                                        <div class="btn-table-align">
                                            @{{ plan.name }} (@{{ plan.interval | capitalize }})
                                        </div>
                                    </td>

                                    <!-- Subscriber Count -->
                                    <td>
                                        <div class="btn-table-align">
                                            @{{ plan.count }}
                                        </div>
                                    </td>

                                    <!-- Trialing Count -->
                                    <td>
                                        <div class="btn-table-align">
                                            @{{ plan.trialing }}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</spark-kiosk-metrics>
