<spark-mailed-invitations :invitations="invitations" inline-template>
    <div>
        <div class="card" v-if="invitations.length > 0">
            <div class="card-header">Mailed Invitations</div>

            <div class="card-block">
                <table class="table table-borderless m-b-none">
                    <thead>
                        <th>E-Mail Address</th>
                        <th></th>
                    </thead>

                    <tbody>
                        <tr v-for="invitation in invitations">
                            <!-- E-Mail Address -->
                            <td>
                                <div class="btn-table-align">
                                    @{{ invitation.email }}
                                </div>
                            </td>

                            <!-- Delete Button -->
                            <td>
                                <button class="btn btn-danger-outline waves-effect" @click="cancel(invitation)">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</spark-mailed-invitations>
