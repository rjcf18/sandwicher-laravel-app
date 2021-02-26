@extends('layouts.app')

@section('content')
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
        <div class="col-md-7">
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
                                        <td>{{ $order->bread_type_id }}</td>
                                        <td>{{ $order->bread_size_id }}</td>
                                        <td>{{ $order->taste_id }}</td>
                                        <td>{{ $order->extra_id }}</td>
                                        <td>{{ $order->vegetable_id }}</td>
                                        <td>{{ $order->sauce_id }}</td>
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
{{--        <div class="col-md-5">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Meals Consumers') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    @if (count($consumers) > 0)--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="table table-striped">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th scope="col">#</th>--}}
{{--                                    <th scope="col">Name</th>--}}
{{--                                    <th scope="col">Email</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach ($consumers as $consumer)--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row">{{ $consumer->id }}</th>--}}
{{--                                        <td>{{ $consumer->name }}</td>--}}
{{--                                        <td>{{ $consumer->email }}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}

{{--                            </table>--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        {{ __('There are no consumers at the moment') }}--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
@endsection
