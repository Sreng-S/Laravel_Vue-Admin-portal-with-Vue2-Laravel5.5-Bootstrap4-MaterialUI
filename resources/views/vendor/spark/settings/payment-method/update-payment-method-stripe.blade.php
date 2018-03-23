<spark-update-payment-method-stripe :user="user" :team="team" :billable-type="billableType" inline-template>
    <div class="card">
        <!-- Update Payment Method Heading -->
        <div class="card-header">
            <div class="pull-left">
                Update Payment Method
            </div>

            <div class="pull-right">
                <span v-if="billable.card_last_four">
                    <i :class="['fa', 'fa-btn', cardIcon]"></i>
                    ************@{{ billable.card_last_four }}
                </span>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="card-block">
            <!-- Card Update Success Message -->
            <div class="alert alert-info" v-if="form.successful">
                Your card has been updated.
            </div>

            <!-- Generic 500 Level Error Message / Stripe Threw Exception -->
            <div class="alert alert-danger" v-if="form.errors.has('form')">
                We had trouble updating your card. It's possible your card provider is preventing
                us from charging the card. Please contact your card provider or customer support.
            </div>

            <form class="form-horizontal" role="form">
                <!-- Billing Address Fields -->
                @if (Spark::collectsBillingAddress())
                    <h2 class="alert alert-info"><i class="fa fa-btn fa-map-marker"></i> Billing Address</h2>

                    @include('spark::settings.payment-method.update-payment-method-address')

                    <h2 class="alert alert-info"><i class="fa fa-btn fa-credit-card"></i> Credit Card</h2>
                @endif

                <!-- Cardholder's Name -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 m-t-5">
                        <div class="form-group-custom">
                            <input type="text" name="name" v-model="cardForm.name" required="required"/>
                            <label class="control-label">Cardholder's Name</label><i class="bar"></i>
                        </div>
                    </div>
                </div>

                <!-- Card Number -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 m-t-5">
                        <div class="form-group-custom" :class="{'has-error': cardForm.errors.has('number')}">
                            <input type="text" name="number" data-stripe="number" v-model="cardForm.number" required="required"/>
                            <label class="control-label">Card Number</label><i class="bar"></i>
                            <span class="help-block" v-show="cardForm.errors.has('number')">
                                    @{{ cardForm.errors.get('number') }}
                                </span>
                        </div>
                    </div>
                </div>

                <!-- Security Code -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 m-t-5">
                        <div class="form-group-custom" :class="{'has-error': cardForm.errors.has('number')}">
                            <input type="text" name="cvc" data-stripe="cvc" v-model="cardForm.cvc" required="required"/>
                            <label class="control-label">Security Code</label><i class="bar"></i>
                        </div>
                    </div>
                </div>

                <!-- Expiration Information -->
                <div class="form-group-custom">
                    <div class="row">
                        <div class="col-md-3 text-right"></div>
                        <div class="col-md-6">
                            <div class="row">
                                <!-- Month -->
                                <div class="col-sm-6">
                                    <input type="text" name="month"
                                           placeholder="MM" maxlength="2" data-stripe="exp-month" v-model="cardForm.month">
                                    <label class="control-label" style="padding-left:17px;">Expiration</label><i class="bar"></i>
                                </div>
                                <!-- Year -->
                                <div class="col-sm-6">
                                    <input type="text" name="year"
                                           placeholder="YYYY" maxlength="4" data-stripe="exp-year" v-model="cardForm.year" required="required"/>
                                    <label class="control-label"></label><i class="bar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Zip Code -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 m-t-5">
                        <div class="form-group-custom" v-if=" ! spark.collectsBillingAddress">
                            <input type="text" name="zip" v-model="form.zip" required="required"/>
                            <label class="control-label">ZIP / Postal Code</label><i class="bar"></i>
                        </div>
                    </div>
                </div>

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary waves-effect" @click.prevent="update" :disabled="form.busy">
                            <span v-if="form.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Updating
                            </span>

                            <span v-else>
                                Update
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-update-payment-method-stripe>
