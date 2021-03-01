@extends('layouts.app')

@section('content')

<div class="container py-4">
    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <h1>App Consumer Users</h1>

    @if (count($users) > 0)
        <div class="table-responsive">

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col" colspan="2">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-small btn-success" href="{{ route('users.show', $user->id) }}">Details</a>
                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id)}}" method="POST">
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
        <h5>{{ __('There are no users at the moment') }}</h5>

    @endif
</div>
@endsection
