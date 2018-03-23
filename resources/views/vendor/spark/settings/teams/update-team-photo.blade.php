<spark-update-team-photo :user="user" :team="team" inline-template>
    <div>
        <div class="card">
            <div class="card-header">{{ ucfirst(Spark::teamString()) }} Photo</div>

            <div class="card-block">
                <div class="alert alert-danger" v-if="form.errors.has('photo')">
                    @{{ form.errors.get('photo') }}
                </div>

                <form class="form-horizontal" role="form">
                    <!-- Photo Preview-->
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <span role="img" class="team-photo-preview"
                                :style="previewStyle">
                            </span>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <label type="button" class="btn btn-primary btn-upload waves-effect" :disabled="form.busy">
                                <span>Select New Photo</span>

                                <input ref="photo" type="file" class="form-control" name="photo" @change="update">
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</spark-update-team-photo>
