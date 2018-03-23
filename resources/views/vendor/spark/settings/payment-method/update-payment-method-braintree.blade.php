<spark-update-payment-method-braintree :user="user" :team="team" :billable-type="billableType" inline-template>
    <div class="card">
        <!-- Update Payment Method Heading -->
        <div class="card-header">
            <div class="pull-left">
                Update Payment Method
            </div>

            <div class="pull-right">
                <!-- Paypal Indicator -->
                <span v-if="billable.paypal_email">
                    <i class="fa fa-btn fa-paypal"></i>
                    @{{ billable.paypal_email }}
                </span>

                <!-- Credit Card Indicator -->
                <span v-if="billable.card_last_four">
                    <i class="['fa', 'fa-btn', cardIcon]"></i>
                    ************@{{ billable.card_last_four }}
                </span>
            </div>

            <div class="clearfix"></div>
        </div>

        <div class="card-block">
            <!-- Payment Method Update Success Message -->
            <div class="alert alert-info" v-if="form.successful">
                Your payment method has been updated.
            </div>

            <!-- Generic 500 Level Error Message / Braintree Threw Exception -->
            <div class="alert alert-danger" v-if="form.errors.has('form')">
                We had trouble updating your payment method. It's possible your payment provider is preventing
                us from charging the payment method. Please contact your payment provider or customer support.
            </div>

            <form class="form-horizontal" role="form">
                <!-- Braintree Container -->
                <div id="braintree-payment-method-container" class="m-b-md"></div>

                <!-- Update Button -->
                <div class="form-group m-b-none p-b-none">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary waves-effect" :disabled="form.busy">
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
</spark-update-payment-method-braintree>
