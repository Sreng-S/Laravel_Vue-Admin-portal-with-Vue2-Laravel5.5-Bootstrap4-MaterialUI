<spark-update-team-name :user="user" :team="team" inline-template>
    <div class="card">
        <div class="card-header">Update {{ ucfirst(Spark::teamString()) }} Name</div>

        <div class="card-block">
            <!-- Success Message -->
            <div class="alert alert-info" v-if="form.successful">
                Your {{ Spark::teamString() }} name has been updated!
            </div>

            <form class="form-horizontal" role="form">
                <!-- Name -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 m-t-5">
                        <div class="form-group-custom" :class="{'has-error': form.errors.has('name')}">
                            <input type="text" name="name" v-model="form.name" required="required"/>
                            <label class="control-label">Name</label><i class="bar"></i>
                        </div>
                        <span class="help-block" v-show="form.errors.has('name')">
                            @{{ form.errors.get('name') }}
                        </span>
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
</spark-update-team-name>
