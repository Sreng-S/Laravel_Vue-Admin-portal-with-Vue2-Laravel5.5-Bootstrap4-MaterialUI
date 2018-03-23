<spark-current-teams :user="user" :teams="teams" inline-template>
    <div>
        <div class="card">
            <div class="card-header">Current {{ ucfirst(str_plural(Spark::teamString())) }}</div>

            <div class="card-block">
                <table class="table table-borderless m-b-none">
                    <thead>
                        <th></th>
                        <th>Name</th>
                        <th>Owner</th>
                        <th></th>
                        <th></th>
                    </thead>

                    <tbody>
                        <tr v-for="team in teams">
                            <!-- Photo -->
                            <td>
                                <img :src="team.photo_url" class="spark-team-photo">
                            </td>

                            <!-- Team Name -->
                            <td>
                                <div class="btn-table-align">
                                    @{{ team.name }}
                                </div>
                            </td>

                            <!-- Owner Name -->
                            <td>
                                <div class="btn-table-align">
                                    <span v-if="user.id == team.owner.id">
                                        You
                                    </span>

                                    <span v-else>
                                        @{{ team.owner.name }}
                                    </span>
                                </div>
                            </td>

                            <!-- Edit Button -->
                            <td>
                                <a :href="'/settings/{{str_plural(Spark::teamString())}}/'+team.id">
                                    <button class="btn btn-primary waves-effect">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                </a>
                            </td>

                            <!-- Leave Button -->
                            <td>
                                <button class="btn btn-warning waves-effect" @click="approveLeavingTeam(team)"
                                    data-toggle="tooltip" title="Leave Team"
                                    v-if="user.id !== team.owner_id">
                                    <i class="fa fa-sign-out"></i>
                                </button>
                            </td>

                            @if (Spark::createsAdditionalTeams())
                                <!-- Delete Button -->
                                <td>
                                    <button class="btn btn-danger-outline waves-effect" @click="approveTeamDelete(team)" v-if="user.id === team.owner_id">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Leave Team Modal -->

        <div class="modal fade" id="modal-leave-team" tabindex="-1" role="dialog">
            <div class="modal-dialog" v-if="leavingTeam">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Leave {{ ucfirst(Spark::teamString()) }} (@{{ leavingTeam.name }})
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to leave this {{ Spark::teamString() }}?
                    </div>
                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">No, Go Back</button>

                        <button type="button" class="btn btn-warning waves-effect" @click="leaveTeam" :disabled="leaveTeamForm.busy">
                            Yes, Leave
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Delete Team Modal -->
        <div class="modal fade" id="modal-delete-team" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modal-delete-team" style="display: none;">
            {{--<div class="modal-dialog" v-if="deletingTeam">--}}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            {{--Delete {{ ucfirst(Spark::teamString()) }} (@{{ deletingTeam.name }})--}}
                            Delete Team
                        </h4>
			            <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true"><span >&times;</span></button>
                    </div>
                    <div class="modal-body">
                        {{--Are you sure you want to delete this {{ Spark::teamString() }}? If you choose to delete the {{ Spark::teamString() }}, all of the--}}
                        {{--{{ Spark::teamString() }}'s data will be permanently deleted.--}}
                        Are you sure you want to delete this team? If you choose to delete this team, all of the team's data will be permanently deleted.
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">No, Go Back</button>

                        <button type="button" class="btn btn-danger waves-effect waves-light" @click="deleteTeam" :disabled="deleteTeamForm.busy">
                            <span v-if="deleteTeamForm.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i>Deleting
                            </span>

                            <span v-else>
                                Yes, Delete
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            {{--<div class="modal-dialog">--}}
                {{--<div class="modal-content">--}}
                    {{--<div class="modal-header">--}}
                        {{--<h4 class="modal-title mt-0">Modal Heading</h4>--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body">--}}
                        {{--<h4>Text in a modal</h4>--}}
                        {{--<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>--}}
                        {{--<hr>--}}
                        {{--<h4>Overflowing text to show scroll behavior</h4>--}}
                        {{--<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>--}}
                        {{--<button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>--}}
                    {{--</div>--}}
                {{--</div><!-- /.modal-content -->--}}
            {{--</div>--}}
        </div>
    </div>
</spark-current-teams>
