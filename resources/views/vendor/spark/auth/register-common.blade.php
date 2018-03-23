<!-- Coupon -->
<div class="row" v-if="coupon">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="card-header bg-success">Discount</div>

            <div class="card-block">
                The coupon's @{{ discount }} discount will be applied to your subscription!
            </div>
        </div>
    </div>
</div>

<!-- Invalid Coupon -->
<div class="row" v-if="invalidCoupon">
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-danger">
            Whoops! This coupon code is invalid.
        </div>
    </div>
</div>

<!-- Invitation -->
<div class="row" v-if="invitation">
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-info">
            We found your invitation to the <strong>@{{ invitation.team.name }}</strong> {{ Spark::teamString() }}!
        </div>
    </div>
</div>

<!-- Invalid Invitation -->
<div class="row" v-if="invalidInvitation">
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-danger">
            Whoops! This invitation code is invalid.
        </div>
    </div>
</div>

<!-- Plan Selection -->
<div class="row" v-if="paidPlans.length > 0">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="card-header">
                <div class="pull-left" :class="{'btn-table-align': hasMonthlyAndYearlyPlans}">
                    Subscription
                </div>

                <!-- Interval Selector Button Group -->
                <div class="pull-right">
                    <div class="btn-group" v-if="hasMonthlyAndYearlyPlans" style="padding-top: 2px;">
                        <!-- Monthly Plans -->
                        <button type="button" class="btn btn-default"
                                @click="showMonthlyPlans"
                                :class="{'active': showingMonthlyPlans}">

                            Monthly
                        </button>

                        <!-- Yearly Plans -->
                        <button type="button" class="btn btn-default"
                                @click="showYearlyPlans"
                                :class="{'active': showingYearlyPlans}">

                            Yearly
                        </button>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>

            <div class="card-block spark-row-list">
                <!-- Plan Error Message - In General Will Never Be Shown -->
                <div class="alert alert-danger" v-if="registerForm.errors.has('plan')">
                    @{{ registerForm.errors.get('plan') }}
                </div>

                <!-- European VAT Notice -->
                @if (Spark::collectsEuropeanVat())
                    <p class="p-b-md">
                        All subscription plan prices are excluding applicable VAT.
                    </p>
                @endif

                <table class="table table-borderless m-b-none">
                    <thead></thead>
                    <tbody>
                        <tr v-for="plan in plansForActiveInterval">
                            <!-- Plan Name -->
                            <td>
                                <div class="btn-table-align" @click="showPlanDetails(plan)">
                                    <span style="cursor: pointer;">
                                        <strong>@{{ plan.name }}</strong>
                                    </span>
                                </div>
                            </td>

                            <!-- Plan Features Button -->
                            <td>
                                <button class="btn btn-default m-l-sm" @click="showPlanDetails(plan)">
                                    <i class="fa fa-btn fa-star-o"></i>Plan Features
                                </button>
                            </td>

                            <!-- Plan Price -->
                            <td>
                                <div class="btn-table-align">
                                    <span v-if="plan.price == 0">
                                        Free
                                    </span>

                                    <span v-else>
                                        @{{ plan.price | currency }} / @{{ plan.interval | capitalize }}
                                    </span>
                                </div>
                            </td>

                            <!-- Trial Days -->
                            <td>
                                <div class="btn-table-align" v-if="plan.trialDays">
                                    @{{ plan.trialDays}} Day Trial
                                </div>
                            </td>

                            <!-- Plan Select Button -->
                            <td class="text-right">
                                <button class="btn btn-primary btn-plan" v-if="isSelected(plan)" disabled>
                                    <i class="fa fa-btn fa-check"></i>Selected
                                </button>

                                <button class="btn btn-primary-outline btn-plan" @click="selectPlan(plan)" v-else>
                                    Select
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Basic Profile -->
<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="card-box">
        <div class="panel-heading">
            <h3 class="text-center"> Sign Up to <strong>PI.TEAM</strong> </h3>
        </div>
        <div class="p-20">
            <form class="form-horizontal m-t-20" role="form">
            @if (Spark::usesTeams() && Spark::onlyTeamPlans())
                <!-- Team Name -->
                <div class="form-group-custom" :class="{'has-error': registerForm.errors.has('team')}" v-if=" ! invitation">
                    <input type="text" name="team" v-model="registerForm.team" autofocus required="required"/>
                    <label class="control-label">{{ ucfirst(Spark::teamString()) }} Name</label><i class="bar"></i>
                    <span class="help-block" v-show="registerForm.errors.has('team')">
                        @{{ registerForm.errors.get('team') }}
                    </span>
                </div>

                @if (Spark::teamsIdentifiedByPath())
                    <!-- Team Slug (Only Shown When Using Paths For Teams) -->
                    <div class="form-group-custom" :class="{'has-error': registerForm.errors.has('team_slug')}" v-if=" ! invitation">
                        <input type="text" name="team_slug" v-model="registerForm.team_slug" autofocus required = "required"/>
                        <label class="control-label">{{ ucfirst(Spark::teamString()) }} Slug</label>
                        <p class="help-block" v-show=" ! registerForm.errors.has('team_slug')">
                            This slug is used to identify your {{ Spark::teamString() }} in URLs.
                        </p>

                        <span class="help-block" v-show="registerForm.errors.has('team_slug')">
                            @{{ registerForm.errors.get('team_slug') }}
                        </span>
                    </div>
                @endif
            @endif
            <!-- Name -->
            <div class="form-group-custom" :class="{'has-error': registerForm.errors.has('name')}">
                <input type="text" name="name" v-model="registerForm.name" required = "required"/>
                <label class="control-label">Name</label><i class="bar"></i>
                <span class="help-block" v-show="registerForm.errors.has('name')">
                    @{{ registerForm.errors.get('name') }}
                </span>
            </div>
            <!-- E-Mail Address -->
            <div class="form-group-custom" :class="{'has-error': registerForm.errors.has('email')}">
                <input type="email" name="email" v-model="registerForm.email" required = "required"/>
                <label class="control-label">E-Mail Address</label><i class="bar"></i>
                <span class="help-block" v-show="registerForm.errors.has('email')">
                    @{{ registerForm.errors.get('email') }}
                </span>
            </div>
            <!-- Password -->
            <div class="form-group-custom" :class="{'has-error': registerForm.errors.has('password')}">
                <input type="password" name="password" v-model="registerForm.password" required = "required"/>
                <label class="control-label">Password</label><i class="bar"></i>
                <span class="help-block" v-show="registerForm.errors.has('password')">
                    @{{ registerForm.errors.get('password') }}
                </span>
            </div>

            <!-- Password Confirmation -->
            <div class="form-group-custom" :class="{'has-error': registerForm.errors.has('password_confirmation')}">
                <input type="password" name="password_confirmation" v-model="registerForm.password_confirmation" required = "required"/>
                <label class="control-label">Confirm Password</label><i class="bar"></i>
                <span class="help-block" v-show="registerForm.errors.has('password_confirmation')">
                    @{{ registerForm.errors.get('password_confirmation') }}
                </span>
            </div>
            <!-- Terms And Conditions -->
            <div v-if=" ! selectedPlan || selectedPlan.price == 0">
                <div class="form-group" :class="{'has-error': registerForm.errors.has('terms')}">
                    <div class="col-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox" name="terms" v-model="registerForm.terms" checked="checked">
                            <label for="checkbox-signup">I accept <a href="/terms" target="_blank">Terms Of Service</a></label>
                            <span class="help-block" v-show="registerForm.errors.has('terms')">
                                @{{ registerForm.errors.get('terms') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-12">
                        <button class="btn btn-success btn-block text-uppercase waves-effect waves-light" @click.prevent="register" :disabled="registerForm.busy">
                            <span v-if="registerForm.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i> Registering
                            </span>

                            <span v-else>
                                <i class="fa fa-btn fa-check-circle"></i> Register
                            </span>
                        </button>
                    </div>
                </div>
            </div>

        </form>

        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center">
            <p class="text-white">
                Already have account?<a href="/login" class="text-white m-l-5"><b>Sign In</b></a>
            </p>
        </div>
    </div>

</div>
