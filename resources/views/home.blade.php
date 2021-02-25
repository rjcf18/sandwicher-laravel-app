@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Meals History') }}</div>

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
                <div class="card-header">{{ __('Meals Consumers') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($consumers) > 0)
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
                                @foreach ($consumers as $consumer)
                                    <tr>
                                        <th scope="row">{{ $consumer->id }}</th>
                                        <td>{{ $consumer->name }}</td>
                                        <td>{{ $consumer->email }}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    @else
                        {{ __('There are no consumers at the moment') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
