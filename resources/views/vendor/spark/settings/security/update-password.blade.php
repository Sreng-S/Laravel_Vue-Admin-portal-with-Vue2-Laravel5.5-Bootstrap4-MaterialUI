<spark-update-password inline-template>
    <div class="card">
        <div class="card-header">Update Password</div>

        <div class="card-block">
            <!-- Success Message -->
            <div class="alert alert-info" v-if="form.successful">
                Your password has been updated!
            </div>

            <form class="form-horizontal" role="form">
                <!-- Current Password -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 m-t-5">
                        <div class="form-group-custom" :class="{'has-error': form.errors.has('current_password')}">
                            <input type="password" name="current_password" v-model="form.current_password" autofocus required="required"/>
                            <label class="control-label">Current Password</label><i class="bar"></i>
                            <span class="help-block" v-show="form.errors.has('current_password')">
                                @{{ form.errors.get('current_password') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- New Password -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 m-t-5">
                        <div class="form-group-custom" :class="{'has-error': form.errors.has('password')}">
                            <input type="password" name="password" v-model="form.password" required="required"/>
                            <label class="control-label">Password</label><i class="bar"></i>
                            <span class="help-block" v-show="form.errors.has('password')">
                                @{{ form.errors.get('password') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- New Password Confirmation -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 m-t-5">
                        <div class="form-group-custom" :class="{'has-error': form.errors.has('password_confirmation')}">
                            <input type="password" name="password_confirmation" v-model="form.password_confirmation" required="required"/>
                            <label class="control-label">Password Confirmation</label><i class="bar"></i>
                            <span class="help-block" v-show="form.errors.has('password_confirmation')">
                                @{{ form.errors.get('password_confirmation') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary waves-effect"
                                @click.prevent="update"
                                :disabled="form.busy">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-update-password>
