@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header bg-info text-white">Dashboard</div>

                    <div class="card-block">
                        Your application's dashboard.
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
