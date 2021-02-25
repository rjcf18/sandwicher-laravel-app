@extends('layouts.app')

@section('content')

<div class="container">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <h1>Meal Consumers</h1>

    @if (count($consumers) > 0)
        <div class="table-responsive">

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <td colspan="2">Actions</td>
                </tr>
                </thead>
                <tbody>
                    @foreach ($consumers as $consumer)
                        <tr>
                            <th scope="row">{{ $consumer->id }}</th>
                            <td>{{ $consumer->name }}</td>
                            <td>{{ $consumer->email }}</td>
                            <td>
                                <a class="btn btn-small btn-success" href="{{ URL::to('consumers/' . $consumer->id) }}">Details</a>
                            </td>
                            <td>
                                <form action="{{ route('consumers.destroy', $consumer->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-small btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h5>{{ __('There are no consumers at the moment') }}</h5>

    @endif
</div>
@endsection
