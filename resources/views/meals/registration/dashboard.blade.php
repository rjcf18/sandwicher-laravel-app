@extends('layouts.app')

@section('content')

@include('meals.registration.register')
@include('meals.registration.edit')

<div class="container">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Current Meal Order') }}</div>
                <div class="card-body">

                    @if (isset($mealOrder))
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Bread Type</strong>
                                    {{ $mealOrder->breadType->name }}
                                </div>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Bread Size</strong>
                                    {{ $mealOrder->breadSize->name }}
                                </div>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Taste</strong>
                                    {{ $mealOrder->taste->name }}
                                </div>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Extra</strong>
                                    {{ $mealOrder->extra->name }}
                                </div>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Vegetable</strong>
                                    {{ $mealOrder->vegetable->name }}
                                </div>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Sauce</strong>
                                    {{ $mealOrder->sauce->name }}
                                </div>
                            </div>

                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <strong>Oven Baked</strong>
                                    {{ $mealOrder->oven_baked ? 'Yes' : 'No' }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-small btn-success"
                                   data-toggle="modal"
                                   data-target="#mealOrderEditModal">{{ __('Edit Order') }}
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12">
                                {{ __('No order was placed yet for this meal.') }}
                            </div>
                        </div>

                        <br/>

                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-small btn-success"
                                   data-toggle="modal"
                                   data-target="#mealOrderRegisterModal">{{ __('Register Order') }}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <br/>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Meal Orders History') }}</div>

                <div class="card-body">

                    @if (count($orders) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Bread Type</th>
                                    <th scope="col">Bread Size</th>
                                    <th scope="col">Taste</th>
                                    <th scope="col">Extra</th>
                                    <th scope="col">Vegetable</th>
                                    <th scope="col">Sauce</th>
                                    <th scope="col">Oven Baked</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $order->id }}</th>
                                        <td>{{ $order->breadType->name }}</td>
                                        <td>{{ $order->breadSize->name }}</td>
                                        <td>{{ $order->taste->name }}</td>
                                        <td>{{ $order->extra->name }}</td>
                                        <td>{{ $order->vegetable->name }}</td>
                                        <td>{{ $order->sauce->name }}</td>
                                        <td>{{ $order->oven_baked ? 'Yes' : 'No' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>

                    @else
                        {{ __('There are no orders yet') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
