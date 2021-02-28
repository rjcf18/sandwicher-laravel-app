@extends('layouts.app')

@section('content')

@include('meals.registration.register')

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
                <div class="card-header">{{ __('Meals Registration Dashboard') }}</div>

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
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-small btn-success"
               data-toggle="modal"
               data-target="#mealOrderRegisterModal">{{ __('Register Order') }}
            </a>
        </div>
    </div>
</div>
@endsection
