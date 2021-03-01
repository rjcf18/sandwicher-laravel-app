@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Meals List') }}</div>

                <div class="card-body">

                    @if (count($meals) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($meals as $meal)
                                    <tr>
                                        <th scope="row">{{ $meal->id }}</th>
                                        <td>{{ $meal->status ? 'Open' : 'Closed' }}</td>
                                        <td>{{ $meal->created_at }}</td>
                                        <td>{{ $meal->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    @else
                        {{ __('There are no meals at the moment') }}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($users) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    @else
                        {{ __('There are no user at the moment') }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <br/>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Orders List') }}</div>

                <div class="card-body">

                    @if (count($orders) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Meal Id</th>
                                    <th scope="col">Meal Status</th>
                                    <th scope="col">User Email</th>
                                    <th scope="col">Placed At</th>
                                    <th scope="col">Updated At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $order->id }}</th>
                                        <td>{{ $order->meal->id }}</td>
                                        <td>{{ $order->meal->status ? 'Open' : 'Closed' }}</td>
                                        <td>{{ $order->user->email }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    @else
                        {{ __('There are no meals at the moment') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
