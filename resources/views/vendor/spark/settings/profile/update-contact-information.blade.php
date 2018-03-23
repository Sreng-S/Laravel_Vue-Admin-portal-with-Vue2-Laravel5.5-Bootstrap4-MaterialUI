<spark-update-contact-information :user="user" inline-template>
    <div class="card">
        <div class="card-header">Contact Information</div>

        <div class="card-block">
            <!-- Success Message -->
            <div class="alert alert-info" v-if="form.successful">
                Your contact information has been updated!
            </div>

            <form class="form-horizontal" role="form">
                <!-- Name -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 m-t-5">
                        <div class="form-group-custom" :class="{'has-error': form.errors.has('name')}">
                            <input type="text" name="name" v-model="form.name" required="required"/>
                            <label class="control-label">Name</label><i class="bar"></i>
                            <span class="help-block" v-show="form.errors.has('name')">
                                @{{ form.errors.get('name') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- E-Mail Address -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 m-t-5">
                        <div class="form-group-custom" :class="{'has-error': form.errors.has('email')}">
                            <input type="text" name="email" v-model="form.email" required="required"/>
                            <label class="control-label">E-Mail Address</label><i class="bar"></i>
                            <span class="help-block" v-show="form.errors.has('email')">
                                @{{ form.errors.get('email') }}
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
</spark-update-contact-information>
