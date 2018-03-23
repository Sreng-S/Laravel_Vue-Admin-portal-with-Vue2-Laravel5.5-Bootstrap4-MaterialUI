@extends('spark::layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header bg-warning text-white">Where's Your {{ ucfirst(Spark::teamString()) }}?</div>

                <div class="card-block">
                    It looks like you're not part of any {{ Spark::teamString() }}! You can create one in your
                    <a href="/settings#/{{ str_plural(Spark::teamString()) }}">settings</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
