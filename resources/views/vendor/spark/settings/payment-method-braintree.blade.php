<spark-payment-method-braintree :user="user" :team="team" :billable-type="billableType" inline-template>
    <div>
        <!-- Current Discount -->
        <div class="card" v-if="currentDiscount">
            <div class="card-header bg-success">Current Discount</div>

            <div class="card-block">
                You currently receive a discount of @{{ formattedDiscount(currentDiscount) }}
                for @{{ formattedDiscountDuration(currentDiscount) }}.
            </div>
        </div>

        <!-- Update Card -->
        @include('spark::settings.payment-method.update-payment-method-braintree')

        <div>
            <div v-if="billable.current_billing_plan">
                <!-- Redeem Coupon -->
                @include('spark::settings.payment-method.redeem-coupon')
            </div>
        </div>
    </div>
</spark-payment-method-braintree>
