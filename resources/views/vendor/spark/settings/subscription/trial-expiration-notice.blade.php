<div class="card" v-if="subscriptionIsOnTrial">
    <div class="card-header bg-warning">
        <i class="fa fa-btn fa-clock-o"></i>Free Trial
    </div>

    <div class="card-block">
        You are currently within your free trial period. Your trial will expire on <strong>@{{ trialEndsAt }}</strong>.
    </div>
</div>
