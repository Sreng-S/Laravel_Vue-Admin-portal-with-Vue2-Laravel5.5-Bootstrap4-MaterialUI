<spark-enable-two-factor-auth :user="user" inline-template>
    <div class="card">
        <div class="card-header">Two-Factor Authentication</div>

        <div class="card-block">
            <!-- Information Message -->
            <div class="alert alert-info">
                In order to use two-factor authentication, you <strong>must</strong> install the
                <strong><a href="https://authy.com" target="_blank">Authy</a></strong> application
                on your smartphone. Authy is available for iOS and Android.
            </div>

            <form class="form-horizontal" role="form">
                <!-- Country Code -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 m-t-5">
                        <div class="form-group-custom" :class="{'has-error': form.errors.has('country_code')}">
                            <input type="number" name="country_code" v-model="form.country_code" required="required"/>
                            <label class="control-label">Country Code</label><i class="bar"></i>
                            <span class="help-block" v-show="form.errors.has('country_code')">
                                @{{ form.errors.get('country_code') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Phone Number -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 m-t-5">
                        <div class="form-group-custom" :class="{'has-error': form.errors.has('phone')}">
                            <input type="tel" name="phone" v-model="form.phone" required="required"/>
                            <label class="control-label">Phone Number</label><i class="bar"></i>
                            <span class="help-block" v-show="form.errors.has('phone')">
                                @{{ form.errors.get('phone') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Enable Button -->
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary waves-effect"
                                @click.prevent="enable"
                                :disabled="form.busy">
                            <span v-if="form.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Enabling
                            </span>
                            <span v-else>
                                Enable
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-enable-two-factor-auth>
