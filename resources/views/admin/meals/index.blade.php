@extends('layouts.app')

@section('content')

<div class="container">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <h1>Meals</h1>

    @if (count($meals) > 0)
        <div class="table-responsive">

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Registration Code</th>
                    <th scope="col">Unique Link</th>
                    <th scope="col">Status</th>
                    <th scope="col">Eaten At</th>
                    <td colspan="2">Actions</td>
                </tr>
                </thead>
                <tbody>
                    @foreach ($meals as $meal)
                        <tr>
                            <th scope="row">{{ $meal->id }}</th>
                            <td>{{ $meal->registration_code }}</td>
                            <td><a href="{{ route('meals.registration.dashboard', $meal->registration_code)}}">Unique Link</a></td>
                            <td>{{ $meal->status ? 'Open' : 'Closed' }}</td>
                            <td>{{ $meal->eaten_at ?? '-' }}</td>
                            <td>
                                <a class="btn btn-small btn-success" href="{{ URL::to('admin/meals/' . $meal->id) }}">Details</a>
                            </td>
                            <td>
                                <form action="{{ route('meals.destroy', $meal->id)}}" method="POST">
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
        <h5>{{ __('There are no meals yet') }}</h5>
    @endif
</div>
@endsection
