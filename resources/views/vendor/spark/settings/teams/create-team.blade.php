<spark-create-team inline-template>
    <div class="card">
        <div class="card-header">Create {{ucfirst(Spark::teamString())}}</div>

        <div class="card-block">
            <form class="form-horizontal" role="form" v-if="canCreateMoreTeams">
                <!-- Name -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 m-t-5">
                        <div class="form-group-custom" :class="{'has-error': form.errors.has('name')}">
                            <input type="text" id="create-team-name" name="name" v-model="form.name" required="required"/>
                            <label class="control-label">{{ ucfirst(Spark::teamString()) }} Name</label><i class="bar"></i>
                            <span class="help-block" v-if="hasTeamLimit">
                                You currently have @{{ remainingTeams }} {{ str_plural(Spark::teamString()) }} remaining.
                            </span>

                            <span class="help-block" v-show="form.errors.has('name')">
                                @{{ form.errors.get('name') }}
                            </span>
                        </div>
                    </div>
                </div>

                @if (Spark::teamsIdentifiedByPath())
                <!-- Slug (Only Shown When Using Paths For Teams) -->
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 m-t-5">
                            <div class="form-group-custom" :class="{'has-error': form.errors.has('slug')}">
                                <input type="text" id="create-team-slug" name="slug" v-model="form.slug" required="required"/>
                                <label class="control-label">{{ ucfirst(Spark::teamString()) }} Slug</label><i class="bar"></i>
                                <p class="help-block" v-show=" ! form.errors.has('slug')">
                                    This slug is used to identify your team in URLs.
                                </p>

                                <span class="help-block" v-show="form.errors.has('slug')">
                                    @{{ form.errors.get('slug') }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Create Button -->
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary waves-effect"
                                @click.prevent="create"
                                :disabled="form.busy">
                            Create
                        </button>
                    </div>
                </div>
            </form>

            <div v-else>
                <span class="text-danger">
                    Your current plan doesn't allow you to create more teams, please <a href="{{ url('/settings#/subscription') }}">upgrade your subscription</a>.
                </span>
            </div>
        </div>
    </div>
</spark-create-team>
