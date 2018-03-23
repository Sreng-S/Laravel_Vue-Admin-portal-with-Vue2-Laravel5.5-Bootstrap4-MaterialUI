@extends('spark::layouts.app')

@section('content')
<div class="container">
    <!-- Application Dashboard -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Terms Of Service</div>

                <div class="card-block terms-of-service">
                    {!! $terms !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
