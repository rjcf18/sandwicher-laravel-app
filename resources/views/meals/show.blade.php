@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Meal Details</h2>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id:</strong>
                {{ $meal->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Registration Code:</strong>
                {{ $meal->registration_code }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                {{ $meal->status ? 'Open' : 'Closed' }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Eaten At:</strong>
                {{ $meal->eaten_at ?? '-' }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a class="btn btn-primary" href="{{ route('meals.index') }}"> Back</a>
        </div>
    </div>
</div>
@endsection
